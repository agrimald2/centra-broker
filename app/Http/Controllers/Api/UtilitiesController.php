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
use App\Models\InsurancePolicy;

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
        Log::debug('Total Comission: '.$latestInsurancePolicyData->totalComission());
        $insuranceCompany = $latestInsurancePolicyData->insuranceCompany;
        $customer = $latestInsurancePolicyData->customer;
        $people = $latestInsurancePolicyData->insurancePolicyPeople;
        $assets = $latestInsurancePolicyData->assets;
        foreach ($assets as $asset) {
            $assetAttributesData = $asset->assetsAttributesData;
            $netPremium = $asset->netPremium();
            $netComercial = $asset->netComercial();
            $netTotal = $asset->netTotal();
            Log::info('Net Premium: '.$netPremium);
            Log::info('Net Comercial: '.$netComercial);
            Log::info('Net Total: '.$netTotal);
        }
        return response()->json($insurancePolicy);
    }   

}
