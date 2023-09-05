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
        $insurance_policies_data = InsurancePolicyData::where('insurance_policy_id', $id)->with(['insuranceCompany', 'customer', 'customer.documentType', 'customer.customerType', 'insurancePolicyPeople', 'assets', 'assets.assetsAttributesData'])->get();
        foreach ($insurance_policies_data as $policyData) {
            $policyData->totalComission = $policyData->totalComission();
        }
        $insurancePolicy = InsurancePolicy::with(['latestInsurancePolicyData', 'latestInsurancePolicyData.insurancePolicy','latestInsurancePolicyData.insuranceCompany', 'latestInsurancePolicyData.customer', 'latestInsurancePolicyData.customer.documentType', 'latestInsurancePolicyData.customer.customerType', 'latestInsurancePolicyData.insurancePolicyPeople', 'latestInsurancePolicyData.assets', 'latestInsurancePolicyData.assets.assetsAttributesData'])->find($id);
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
            $insurance_billing_contact = $people->where('type_id', 1)->first(); // Get the insurance billing contact where type is equal to 1
            $insuranced_people = $people->where('type_id', 2)->all(); // Get the array of people where type_id is equal to 2
            $assets = $latestInsurancePolicyData->assets;
            foreach ($assets as $asset) {
                $assetType = $asset->assetType;
                $attributes = $assetType->attributes;
            }
            
            foreach ($assets as $asset) {
                $assetAttributesData = $asset->assetsAttributesData;
                $netPremium = $asset->netPremium();
                $netComercial = $asset->netComercial();
                $netTotal = $asset->netTotal();
            }
            $breadcrumbs = [["name" => "Pólizas de seguro", "href" => "/admin/insurance_policies"], ["name" => "Póliza N° ".$insurancePolicy->number, "href" => "/admin/insurance_policies/show/".$insurancePolicy->id]];
            return Inertia::render('Admin/InsurancePolicies/Show', [
                'breadcrumbs' => $breadcrumbs,
                'insurancePolicy' => $insurancePolicy,
                'insurance_billing_contact' => $insurance_billing_contact,
                'insuranced_people' => $insuranced_people,
                'insurance_policies_data' => $insurance_policies_data
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

    public function addNewEndorse(Request $request)
    {
        $id = $request->id; 
        $policyData = $request->policyData;
        $insurancePeople = $request->insurancePeople;
        $assets = $request->assets;
        // Find the InsurancePolicy by id
        $insurancePolicy = InsurancePolicy::find($id);
        
        // Check if the InsurancePolicy exists
        if(!$insurancePolicy) {
            return response()->json(['message' => 'Insurance Policy not found'], 404);
        }
        
        // Create the InsurancePolicyData
        $insurancePolicyData = $this->createInsurancePolicyData($insurancePolicy, $policyData);
        
        // Create the InsurancePolicyPeople
        $this->createInsurancePolicyPeople($insurancePolicyData, $insurancePeople);
        
        // Create the Assets
        $this->createAssets($insurancePolicyData, $assets);
        
        // Return a response
        return response()->json(['message' => 'Policy data, insurance people and assets added successfully']);
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
