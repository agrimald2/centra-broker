<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Customer;
use App\Models\DocumentType;
use App\Models\CustomerType;
use App\Models\InsuranceCompany;
use App\Models\AssetsType;
use App\Models\AssetsTypesAttribute;
use App\Models\InsurancePolicy;
use App\Models\Driver;
use App\Models\Workshop;
use App\Models\Bank;
use App\Models\Executive;
use App\Models\AssetsAttributesData;

use Log;

class UtilitiesController extends Controller
{
    /**
     * Getters
     */
    public function getCustomerTypes(){
        $customer_types = CustomerType::all();
        return response()->json($customer_types);
    }

    public function getDocumentTypes(){
        $document_types = DocumentType::all();
        return response()->json($document_types);
    }

    public function getCustomers(){
        $customers = Customer::all();
        return response()->json($customers);
    }

    public function getAssetTypes(){
        $asset_types = AssetsType::with('attributes')->get();
        return response()->json($asset_types);
    }

    public function getInsuranceCompanies(){
        $insurance_companies = InsuranceCompany::all();
        return response()->json($insurance_companies);
    }

    public function getUsers(){
        $users = User::all();
        return response()->json($users);
    }

    public function getInsurancePolicyTest(){
        $insurancePolicy = InsurancePolicy::find(2);
        $latestInsurancePolicyData = $insurancePolicy->latestInsurancePolicyData; 
        $insuranceCompany = $latestInsurancePolicyData->insuranceCompany;
        $customer = $latestInsurancePolicyData->customer;
        $people = $latestInsurancePolicyData->insurancePolicyPeople;
        $assets = $latestInsurancePolicyData->assets;
        foreach ($assets as $asset) {
            $assetAttributesData = $asset->assetsAttributesData;
            $netPremium = $asset->netPremium();
            $netComercial = $asset->netComercial();
            $netTotal = $asset->netTotal();
        }
        return response()->json($insurancePolicy);
    }   

    public function getDrivers(){
        $drivers = Driver::all();
        return response()->json($drivers);
    }

    public function getWorkshops(){
        $workshops = Workshop::all();
        return response()->json($workshops);
    }

    public function getBanks(){
        $banks = Bank::all();
        return response()->json($banks);
    }

    public function getExecutives(){
        $executives = Executive::all();
        return response()->json($executives);
    }

    public function getAssetByAttributeValue(Request $request){
        $asset_type_attribute_id = $request->asset_type_attribute_id;
        $value = $request->value;
    
        $assets = AssetsAttributesData::with(['asset' => function($query) {
            $query->with('assetType', 'incidents', 'insurancePolicyData');
        }])
        ->where('assets_types_attributes_id', $asset_type_attribute_id)
        ->where('value', 'LIKE', '%' . $value . '%')
        ->get();

        return response()->json(['assets' => $assets]);
    }

    public function getAssetsTypesAttributes(Request $request){
        $asset_types_attributes = AssetsTypesAttribute::where('assets_type_id', $request->assets_type_id)->get(['id','name', 'input_type']);
        return response()->json($asset_types_attributes);
    }

}
