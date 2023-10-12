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
use App\Models\File;
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
            if($customer){
                $contacts = $customer->documentType;
                $addresses = $customer->customerType;
            }
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

    public function insurancePoliciesFilter(Request $request){
        $search = $request->search;
        $insurancePolicies = InsurancePolicy::with(['latestInsurancePolicyData', 'latestInsurancePolicyData.insuranceCompany', 'latestInsurancePolicyData.customer', 'latestInsurancePolicyData.customer.documentType', 'latestInsurancePolicyData.customer.customerType', 'latestInsurancePolicyData.insurancePolicyPeople', 'latestInsurancePolicyData.assets', 'latestInsurancePolicyData.assets.assetsAttributesData'])
            ->where(function ($query) use ($search) {
                $query->whereHas('latestInsurancePolicyData.customer', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%')
                          ->orWhere('document_number', 'like', '%' . $search . '%');
                })
                ->orWhere('number', 'like', '%' . $search . '%'); // Include results where search is equal to insurance_policy number
            })->get();
        foreach ($insurancePolicies as $insurancePolicy) {
            $latestInsurancePolicyData = $insurancePolicy->latestInsurancePolicyData;
            $insuranceCompany = $latestInsurancePolicyData->insuranceCompany;
            $customer = $latestInsurancePolicyData->customer;
            if($customer){
                $contacts = $customer->documentType;
                $addresses = $customer->customerType;
            }
            $totalComission = $latestInsurancePolicyData->totalComission();
            $netPremium = $latestInsurancePolicyData->netPremiumTotal();
            $insurancePolicy->totalComission = $totalComission; // Add total comission to the insurancePolicy array
            $insurancePolicy->netPremium = $netPremium; // Add total comission to the insurancePolicy array
            $latestInsurancePolicyData->totalComission = $totalComission; // Add total comission to the insurancePolicyData array
            $latestInsurancePolicyData->netPremium = $netPremium; // Add total comission to the insurancePolicyData array
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
            if($customer){
                $addresses = $customer->customerType;
                $contacts = $customer->documentType;
            }
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
                $incidents = $asset->incidents; // Added incidents relationship
            }
            
            foreach ($assets as $asset) {
                $assetAttributesData = $asset->assetsAttributesData;
                $netPremium = $asset->netPremium();
                $netComercial = $asset->netComercial();
                $netTotal = $asset->netTotal();
                $incidents = $asset->incidents; // Added incidents relationship
            }
            $files = $insurancePolicy->files; // Store the files from insurancePolicy in a variable $files
            $breadcrumbs = [["name" => "Pólizas de seguro", "href" => "/admin/insurance_policies"], ["name" => "Póliza N° ".$insurancePolicy->number, "href" => "/admin/insurance_policies/show/".$insurancePolicy->id]];

            return Inertia::render('Admin/InsurancePolicies/Show', [
                'breadcrumbs' => $breadcrumbs,
                'insurancePolicy' => $insurancePolicy,
                'insurance_billing_contact' => $insurance_billing_contact,
                'insuranced_people' => $insuranced_people,
                'insurance_policies_data' => $insurance_policies_data,
                'assets' => $assets,
                'files' => $files, // Add files to the returned data
            ]);
        } else {
            return response()->json(['message' => 'Insurance Policy not found'], 404);
        }
    }

    public function edit($id){
        $insurance_policies_data = InsurancePolicyData::where('insurance_policy_id', $id)->with(['insuranceCompany', 'customer', 'customer.documentType', 'customer.customerType', 'insurancePolicyPeople', 'assets', 'assets.assetsAttributesData'])->get();
        foreach ($insurance_policies_data as $policyData) {
            $policyData->totalComission = $policyData->totalComission();
        }
        $insurancePolicy = InsurancePolicy::with(['latestInsurancePolicyData', 'latestInsurancePolicyData.insurancePolicy','latestInsurancePolicyData.insuranceCompany', 'latestInsurancePolicyData.customer', 'latestInsurancePolicyData.customer.documentType', 'latestInsurancePolicyData.customer.customerType', 'latestInsurancePolicyData.insurancePolicyPeople', 'latestInsurancePolicyData.assets', 'latestInsurancePolicyData.assets.assetsAttributesData', 'latestInsurancePolicyData.assets.assetType'])->find($id);
        if($insurancePolicy){
            $latestInsurancePolicyData = $insurancePolicy->latestInsurancePolicyData;
            $insuranceCompany = $latestInsurancePolicyData->insuranceCompany;
            $customer = $latestInsurancePolicyData->customer;
            if($customer){
                $contacts = $customer->documentType;
                $addresses = $customer->customerType;
            }
            $totalComission = $latestInsurancePolicyData->totalComission();
            $insurancePolicy->totalComission = $totalComission; // Add total comission to the insurancePolicy array
            $latestInsurancePolicyData->totalComission = $totalComission; // Add total comission to the insurancePolicyData array
            $people = $latestInsurancePolicyData->insurancePolicyPeople;
            $insurance_billing_contact = $people->where('type_id', 1)->first(); // Get the insurance billing contact where type is equal to 1
            $insuranced_people = $people->where('type_id', 2)->all(); // Get the array of people where type_id is equal to 2
            $assets = $latestInsurancePolicyData->assets()->with('assetType')->get();
            foreach ($assets as $asset) {
                $assetType = $asset->assetType;
                $attributes = $assetType->attributes;
                $incidents = $asset->incidents; // Added incidents relationship
            }
            
            foreach ($assets as $asset) {
                $assetAttributesData = $asset->assetsAttributesData;
                $netPremium = $asset->netPremium();
                $netComercial = $asset->netComercial();
                $netTotal = $asset->netTotal();
                $incidents = $asset->incidents; // Added incidents relationship
            }
            $breadcrumbs = [["name" => "Pólizas de seguro", "href" => "/admin/insurance_policies"], ["name" => "Póliza N° ".$insurancePolicy->number, "href" => "/admin/insurance_policies/show/".$insurancePolicy->id]];
            $general_settings = GeneralSetting::first();

            return Inertia::render('Admin/InsurancePolicies/Edit', [
                'breadcrumbs' => $breadcrumbs,
                'insurancePolicy' => $insurancePolicy,
                'insurance_billing_contact' => $insurance_billing_contact,
                'insuranced_people' => $insuranced_people,
                'insurance_policies_data' => $insurance_policies_data,
                'assets' => $assets,
                'general_settings' => $general_settings
            ]);
        } else {
            return response()->json(['message' => 'Insurance Policy not found'], 404);
        }
    }

    public function store(Request $request)
    {
        // Get the input data
        $data = $request->all();
        // Get the files 
        $files = $request->file('files');
        $assets = $data['insurance_policy_data']['assets'];

        // Create the InsurancePolicy
        $insurancePolicy = $this->createInsurancePolicy($data);
        
        // Create the InsurancePolicyData
        $insurancePolicyData = $this->createInsurancePolicyData($insurancePolicy, $data['insurance_policy_data']);
        
        // Create the InsurancePolicyPeople
        if($data['insurance_policy_data']['insurance_policy_people']){
            $this->createInsurancePolicyPeople($insurancePolicyData, $data['insurance_policy_data']['insurance_policy_people']);
        }

        if($assets){
            foreach($assets as $key => $asset) {
                $assets[$key] = json_decode($asset, true);
            }
            Log::warning($assets);
            $this->createAssets($insurancePolicyData, $assets);
        }
        
        // Store the Files
        if($files){
            $this->storeFiles($insurancePolicyData, $files);
        }

        // Redirect to the route named insurance_policy.index
        return redirect()->route('insurance_policy.index');
    }

    public function storeFiles($insurancePolicyData, $files)
    {
        // Ensure $files is an array
        if (!is_array($files)) {
            $files = [$files];
        }
        // store in policy_id/policy_data_id - Use Name and Date
        foreach($files as $file) {
            $filename = $file->getClientOriginalName();
            // Add today's date to the filename
            $filename = date('Y-m-d') . '-' . $filename;
            $path = $file->storeAs('polizas/'.$insurancePolicyData->insurance_policy_id, $filename, 'public');
            // Store the file in the database
            File::create([
                'name' => $filename,
                'insurance_policy_id' => $insurancePolicyData->insurance_policy_id,
                'path' => '/polizas/'.$insurancePolicyData->insurance_policy_id.'/'.$filename
            ]);
        }

        return response()->json(['message' => 'Files uploaded successfully']);
    }

    public function update(Request $request, $id)
    {
        // Find the InsurancePolicy by id
        $insurancePolicy = InsurancePolicy::find($id);
        
        // Check if the InsurancePolicy exists
        if(!$insurancePolicy) {
            return response()->json(['message' => 'Insurance Policy not found'], 404);
        }
        
        // Get the input data
        $data = $request->all();
        
        // Update the InsurancePolicy
        $insurancePolicy->update($data);
        
        // Check if insurance_policy_data exists in the request
        if(isset($data['insurance_policy_data'])) {
            // Update the InsurancePolicyData
            $insurancePolicyData = $this->updateInsurancePolicyData($insurancePolicy, $data['insurance_policy_data']);
            
            // Check if insurance_policy_people exists in insurance_policy_data
            if(isset($data['insurance_policy_data']['insurance_policy_people'])) {
                // Update the InsurancePolicyPeople
                $this->createInsurancePolicyPeople($insurancePolicyData, $data['insurance_policy_data']['insurance_policy_people']);
            }
            
            // Check if assets exists in insurance_policy_data
            if(isset($data['insurance_policy_data']['assets'])) {
                // Update the Assets
                $this->createAssets($insurancePolicyData, $data['insurance_policy_data']['assets']);
            }
        }
        
        // Return a response
        return redirect()->route('insurance_policy.index');
    }

    private function updateInsurancePolicyData($insurancePolicy, $insurancePolicyData)
    {
        $policyData = InsurancePolicyData::where('insurance_policy_id', $insurancePolicy->id)->first();

        if($policyData) {
            $policyData->update([
                'customer_id' => $insurancePolicyData['customer_id'],
                'insurance_company_id' => $insurancePolicyData['insurance_company_id'],
                'start_date' => $insurancePolicyData['start_date'],
                'end_date' => $insurancePolicyData['end_date'],
                'comission_type_id' => $insurancePolicyData['comission_type_id'],
                'comission' => $insurancePolicyData['comission'],
                'number_of_installments' => $insurancePolicyData['number_of_installments'],
                'risk_rate' => $insurancePolicyData['risk_rate']
            ]);
        }

        return $policyData;
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
        Log::debug($insurancePolicyData);
        return InsurancePolicyData::create([
            'insurance_policy_id' => $insurancePolicy->id,
            'customer_id' => $insurancePolicyData['customer_id'] == 'null' ? null : $insurancePolicyData['customer_id'],
            'insurance_policies_status_id' => $insurancePolicyData['insurance_policies_status_id'] == 'null' ? null : $insurancePolicyData['insurance_policies_status_id'],
            'insurance_company_id' => $insurancePolicyData['insurance_company_id'] == 'null' ? null : $insurancePolicyData['insurance_company_id'],
            'start_date' => $insurancePolicyData['start_date'] == 'null' ? null : $insurancePolicyData['start_date'],
            'end_date' => $insurancePolicyData['end_date'] == 'null' ? null : $insurancePolicyData['end_date'],
            'comission_type_id' => $insurancePolicyData['comission_type_id'] == 'null' ? null : $insurancePolicyData['comission_type_id'],
            'comission' => $insurancePolicyData['comission'] == 'null' ? null : $insurancePolicyData['comission'],
            'number_of_installments' => $insurancePolicyData['number_of_installments'] == 'null' ? null : $insurancePolicyData['number_of_installments'],
            'risk_rate' => $insurancePolicyData['risk_rate'] == 'null' ? null : $insurancePolicyData['risk_rate']
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
            $asset = Asset::updateOrCreate(
                ['id' => $assetData['id'] ?? null],
                [
                    'insurance_policy_data_id' => $insurancePolicyData->id,
                    'asset_type_id' => $assetData['asset_type_id'],
                    'insured_amount' => $assetData['insured_amount'],
                    'vigency_date' => $assetData['vigency_date'],
                    'insuranced_people' => $assetData['insuranced_people']
                ]
            );
            if(isset($assetData['assets_attributes_data'])) {
                $this->createAssetsTypesAttribute($asset, $assetData['assets_attributes_data']);
            }
        }
    }
    
    private function createAssetsTypesAttribute($asset, $attributesData)
    {
         
        $newArrayData = [];
          
        foreach ($attributesData as $id => $value) {
            $newArrayData[] = [
                'id' => $id,
                'value' => $value,
            ];
        }
        
        if (!is_array($asset)) {
            $asset = json_decode($asset, true);
        }

        // Check if $attributesData is not null or empty
        if (!empty($newArrayData)) {
            foreach ($newArrayData as $attributeData) {
                AssetsAttributesData::updateOrCreate(
                    ['id' => $attributeData['id'] ?? null],
                    [
                        'asset_id' => $asset['id'],
                        'assets_types_attributes_id' => $attributeData['id'],
                        'value' => $attributeData['value']
                    ]
                );
            }
        }
    }
    
}
