<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\GeneralSetting;
use App\Models\InsurancePolicy;
use App\Models\InsurancePolicyData;
use App\Models\Customer;
use App\Models\InsuranceCompany;
use App\Models\InsurancePolicyPeople;
use App\Models\AssetsType;
use App\Models\Asset;
use App\Models\AssetsAttributesData;
use Carbon;
use Log;


class InsurancePoliciesController extends Controller
{
    public function index()
    {
        $insurancePolicies = InsurancePolicy::with(['latestInsurancePolicyData', 'latestInsurancePolicyData.insuranceCompany', 'latestInsurancePolicyData.customer', 'latestInsurancePolicyData.customer.documentType', 'latestInsurancePolicyData.customer.customerType', 'latestInsurancePolicyData.insurancePolicyPeople', 'latestInsurancePolicyData.assets', 'latestInsurancePolicyData.assets.assetsAttributesData'])->get();
        foreach ($insurancePolicies as $insurancePolicy) {
            $latestInsurancePolicyData = $insurancePolicy->latestInsurancePolicyData;
            $insuranceCompany = $latestInsurancePolicyData->insuranceCompany;
            $customer = $latestInsurancePolicyData->customer;
            $contacts = $customer->documentType;
            $addresses = $customer->customerType;
            $totalComission = $latestInsurancePolicyData->totalComission();
            $insurancePolicy->totalComission = $totalComission; // Add total comission to the insurancePolicy array
            $latestInsurancePolicyData->totalComission = $totalComission; // Add total comission to the insurancePolicyData array
            $people = $latestInsurancePolicyData->insurancePolicyPeople;
            $assets = $latestInsurancePolicyData->assets;
            foreach ($assets as $asset) {
                $assetAttributesData = $asset->assetsAttributesData;
                $netPremium = $asset->netPremium();
                $netComercial = $asset->netComercial();
                $netTotal = $asset->netTotal();
            }
        }
        $breadcrumbs = [["name" => "Listado de Pólizas", "href" => "/admin/insurance_policies"]];
        return Inertia::render('Admin/InsurancePolicies/Index', ['breadcrumbs' => $breadcrumbs, 'insurancePolicies' => $insurancePolicies]);
    }

    public function insurancePoliciesFilter(){
        $insurancePolicies = InsurancePolicy::with(['latestInsurancePolicyData', 'latestInsurancePolicyData.insuranceCompany', 'latestInsurancePolicyData.customer', 'latestInsurancePolicyData.customer.documentType', 'latestInsurancePolicyData.customer.customerType', 'latestInsurancePolicyData.insurancePolicyPeople', 'latestInsurancePolicyData.assets', 'latestInsurancePolicyData.assets.assetsAttributesData'])->get();
        foreach ($insurancePolicies as $insurancePolicy) {
            $latestInsurancePolicyData = $insurancePolicy->latestInsurancePolicyData;
            $insuranceCompany = $latestInsurancePolicyData->insuranceCompany;
            $customer = $latestInsurancePolicyData->customer;
            $contacts = $customer->documentType;
            $addresses = $customer->customerType;
            $totalComission = $latestInsurancePolicyData->totalComission();
            $insurancePolicy->totalComission = $totalComission; // Add total comission to the insurancePolicy array
            $latestInsurancePolicyData->totalComission = $totalComission; // Add total comission to the insurancePolicyData array
            $people = $latestInsurancePolicyData->insurancePolicyPeople;
            $assets = $latestInsurancePolicyData->assets;
            foreach ($assets as $asset) {
                $assetAttributesData = $asset->assetsAttributesData;
                $netPremium = $asset->netPremium();
                $netComercial = $asset->netComercial();
                $netTotal = $asset->netTotal();
            }
        }
        return response()->json($insurancePolicies);
    }

    public function create()
    {
        $breadcrumbs = [["name" => "Pólizas de seguro", "href" => "/admin/insurance_policies"], ["name" => "Crear Póliza", "href" => "/admin/insurance_policies/create"]];
        $general_settings = GeneralSetting::first();
        return Inertia::render('Admin/InsurancePolicies/Create', [
            'breadcrumbs' => $breadcrumbs,
            'general_settings' => $general_settings
        ]);
    }

    public function show($id){

        $insurancePolicy = InsurancePolicy::with(['latestInsurancePolicyData', 'latestInsurancePolicyData.insuranceCompany', 'latestInsurancePolicyData.customer', 'latestInsurancePolicyData.customer.documentType', 'latestInsurancePolicyData.customer.customerType', 'latestInsurancePolicyData.insurancePolicyPeople', 'latestInsurancePolicyData.assets', 'latestInsurancePolicyData.assets.assetsAttributesData'])->find($id);
        if($insurancePolicy){
            $latestInsurancePolicyData = $insurancePolicy->latestInsurancePolicyData;
            $insuranceCompany = $latestInsurancePolicyData->insuranceCompany;
            $customer = $latestInsurancePolicyData->customer;
            $contacts = $customer->documentType;
            $addresses = $customer->customerType;
            $totalComission = $latestInsurancePolicyData->totalComission();
            $insurancePolicy->totalComission = $totalComission; // Add total comission to the insurancePolicy array
            $latestInsurancePolicyData->totalComission = $totalComission; // Add total comission to the insurancePolicyData array
            $people = $latestInsurancePolicyData->insurancePolicyPeople;
            $assets = $latestInsurancePolicyData->assets;
            foreach ($assets as $asset) {
                $assetAttributesData = $asset->assetsAttributesData;
                $netPremium = $asset->netPremium();
                $netComercial = $asset->netComercial();
                $netTotal = $asset->netTotal();
            }
            $breadcrumbs = [["name" => "Pólizas de seguro", "href" => "/admin/insurance_policies"], ["name" => "Póliza N° ".$insurancePolicy->id, "href" => "/admin/insurance_policies/show/".$insurancePolicy->id]];
            return Inertia::render('Admin/InsurancePolicies/Show', [
                'breadcrumbs' => $breadcrumbs,
                'insurancePolicy' => $insurancePolicy
            ]);
        } else {
            return response()->json(['message' => 'Insurance Policy not found'], 404);
        }
    }

    public function store(Request $request)
    {
        // Get the input data
        $data = $request->all();
        
        // Create the InsurancePolicy
        $insurancePolicy = $this->createInsurancePolicy($data);
        
        // Create the InsurancePolicyData
        $insurancePolicyData = $this->createInsurancePolicyData($insurancePolicy, $data['insurance_policy_data']);
        
        // Create the InsurancePolicyPeople
        $this->createInsurancePolicyPeople($insurancePolicyData, $data['insurance_policy_data']['insurance_policy_people']);
        
        // Create the Assets
        $this->createAssets($insurancePolicyData, $data['insurance_policy_data']['assets']);
        
        // Return a response
        return response()->json(['message' => 'Insurance Policy created successfully']);
    }
    
    private function createInsurancePolicy($data)
    {
        return InsurancePolicy::create([
            'number' => $data['number']
        ]);
    }
    
    private function createInsurancePolicyData($insurancePolicy, $insurancePolicyData)
    {
        return InsurancePolicyData::create([
            'insurance_policy_id' => $insurancePolicy->id,
            'customer_id' => $insurancePolicyData['customer_id'],
            'insurance_policies_status_id' => $insurancePolicyData['insurance_policies_status_id'],
            'insurance_company_id' => $insurancePolicyData['insurance_company_id'],
            'start_date' => $insurancePolicyData['start_date'],
            'end_date' => $insurancePolicyData['end_date'],
            'comission_type_id' => $insurancePolicyData['comission_type_id'],
            'comission' => $insurancePolicyData['comission'],
            'number_of_installments' => $insurancePolicyData['number_of_installments'],
            'risk_rate' => $insurancePolicyData['risk_rate']
        ]);
    }
    
    private function createInsurancePolicyPeople($insurancePolicyData, $insurancePolicyPeople)
    {
        foreach ($insurancePolicyPeople as $personData) {
            InsurancePolicyPeople::create([
                'name' => $personData['name'],
                'document_type_id' => $personData['document_type_id'],
                'document_number' => $personData['document_number'],
                'type_id' => $personData['type_id'],
                'insurance_policy_data_id' => $insurancePolicyData->id
            ]);
        }
    }
    
    private function createAssets($insurancePolicyData, $assets)
    {
        foreach ($assets as $assetData) {
            Log::warning($assetData);
            $asset = Asset::create([
                'insurance_policy_data_id' => $insurancePolicyData->id,
                'asset_type_id' => $assetData['asset_type_id'],
                'insured_amount' => $assetData['insured_amount'],
                'vigency_date' => $assetData['vigency_date']
            ]);
            
            $this->createAssetsTypesAttribute($asset, $assetData['assets_attributes_data']);
        }
    }
    
    private function createAssetsTypesAttribute($asset, $attributesData)
    {
        foreach ($attributesData as $attributeId => $attributeValue) {
            AssetsAttributesData::create([
                'asset_id' => $asset->id,
                'assets_types_attributes_id' => $attributeId,
                'value' => $attributeValue
            ]);
        }
    }
    
}
