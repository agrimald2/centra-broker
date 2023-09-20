<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
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
}
