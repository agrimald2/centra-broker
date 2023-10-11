<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Asset;
use Carbon;
use Log;
use DB;

class AssetController extends Controller
{
    public function search(){
        $breadcrumbs = [["name" => "Siniestros", "href" => "/admin/incidents"], ["name" => "Registrar Siniestro", "href" => "/admin/incidents/create"]];
        return Inertia::render('Admin/Assets/Search', [
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    public function getAssetByAttributeValue(Request $request){
        $asset_type_attribute_id = $request->asset_type_attribute_id;
        $value = $request->value;
    
        $assets = AssetsAttributesData::where('assets_types_attributes_id', $asset_type_attribute_id)
            ->where('value', 'LIKE', '%' . $value . '%')
            ->get();
    
        return response()->json(['assets' => $assets]);
    }

    public function getAssets(Request $request){
        Log::debug($request);
        // Get the Assets with the relations
        $assets = Asset::with('insurancePolicyData.insurancePolicy')
        ->with('insurancePolicyData.customer')
        ->with('assetsAttributesData.assetsTypesAttribute');

        // filter by type
        if($request->has('type')){
            $assets = $assets->where('asset_type_id', $request->type);
        }

        // filter by start_date and end_date
        if($request->has('start_date') && $request->has('end_date')){
            $assets = $assets->whereHas('insurancePolicyData', function ($query) use ($request) {
                $query->whereBetween('start_date', [$request->start_date, $request->end_date]);
            });
        }

        // filter by customer
        if($request->has('customer')){
            $assets = $assets->whereHas('insurancePolicyData.customer', function ($query) use ($request) {
                $query->where('id', $request->customer);
            });
        }

        $assets = $assets->get();

        $formattedAssets = [];
        foreach ($assets as $asset) {
            $assetAttributes = [];
        
            foreach ($asset->assetsAttributesData as $attribute) {
                $assetAttributes[] = [
                    'name' => $attribute->assetsTypesAttribute->name,
                    'value' => $attribute->value
                ];
            }
        
            $formattedAssets[] = [
                'insurance_policy_number' => $asset->insurancePolicyData->insurancePolicy->number,
                'start_date' => $asset->insurancePolicyData->start_date,
                'end_date' => $asset->insurancePolicyData->end_date,
                'customer_name' => $asset->insurancePolicyData->customer->name,
                'customer_document' => $asset->insurancePolicyData->customer->document_number,
                'insuranced_people' => $asset->insuranced_people,
                'attributes' => $assetAttributes,
                'risk_rate' => $asset->insurancePolicyData->risk_rate,
                'insuranced_amount' => $asset->insured_amount,
                'comission' => $asset->insurancePolicyData->comission,
            ];
        }
       

        return response()->json($formattedAssets);
    }

    public function index() {
        $breadcrumbs = [["name" => "Configuración", "href" => "/admin/assets/index"]];
        return Inertia::render('Admin/Assets/Index', ['breadcrumbs' => $breadcrumbs]);

    }
}
