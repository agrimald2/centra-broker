<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Incident;
use App\Models\IncidentHistory;
use App\Models\Asset;
use App\Models\AssetsAttributesData;
use Carbon;
use Log;
use DB;

class IncidentController extends Controller
{
    public function create($asset_id)
    {
        $asset = Asset::with(['assetType', 'insurancePolicyData.insuranceCompany', 'assetsAttributesData'])->find($asset_id);
        
        // Check if the asset already has an incident
        $incidents =  $asset->incidents()->get();
        // For the moment, the system will only allow 1 incident per asset @todo
        if ($asset->incidents()->exists()) {
            return redirect('/admin/incidents/show/'.$incidents[0]->id);
        }
        
        $asset->netPremium = $asset->netPremium();
        $asset->netTotal = $asset->netTotal();
        $asset->customer = $asset->customer();
        $asset->insurancePolicy = $asset->insurancePolicy();
        $breadcrumbs = [["name" => "Siniestros", "href" => "/admin/incidents"], ["name" => "Registrar Siniestro", "href" => "/admin/incidents/create"]];
        return Inertia::render('Admin/Incidents/Create', [
            'breadcrumbs' => $breadcrumbs,
            'asset' => $asset,
        ]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'asset_id' => 'required',
            'incident_number' => 'nullable|string',
            'case_number' => 'nullable|string',
            'incident_history' => 'nullable|array',
            'incident_history.incident_date' => 'nullable|date',
            'incident_history.driver' => 'nullable',
            'incident_history.place' => 'nullable|string',
            'incident_history.police_station' => 'nullable|string',
            'incident_history.summary' => 'nullable|string',
            'incident_history.have_police_conclusion' => 'nullable|boolean',
            'incident_history.police_conclusion' => 'nullable|string',
            'incident_history.workshop_id' => 'nullable',
            'incident_history.workshop_entrance_date' => 'nullable|date',
            'incident_history.budget_approval_date' => 'nullable|date',
            'incident_history.executive' => 'nullable',
            'incident_history.is_bank_endorsed' => 'nullable|boolean',
            'incident_history.bank_id' => 'nullable',
            'incident_history.deductible' => 'nullable',
        ]);

        try {
            DB::beginTransaction();

            $incident = Incident::create([
                'asset_id' => $validatedData['asset_id'],
                'incident_number' => $validatedData['incident_number'],
                'case_number' => $validatedData['case_number'],
            ]);

            $incidentHistory = IncidentHistory::create(array_merge(
                $validatedData['incident_history'],
                ['incident_id' => $incident->id]
            ));

            DB::commit();

            return response()->json(['incident' => $incident, 'incident_history' => $incidentHistory]);
        } catch (\Exception $e) {
            DB::rollback();

            Log::error('Error in IncidentController@store: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred while creating the incident.'], 500);
        }
    }

    public function index(){
        $breadcrumbs = [["name" => "Listado de Siniestros", "href" => "/admin/incidents"]];
        return Inertia::render('Admin/Incidents/Index', ['breadcrumbs' => $breadcrumbs]);
    }

    public function filter(Request $request){
        $incidents = Incident::with('lastIncidentHistory')
                            ->with('asset.assetType')
                            ->with('asset.insurancePolicyData.insurancePolicy')
                            ->with('asset.insurancePolicyData.insuranceCompany')
                            ->get();
        return response()->json(['incidents' => $incidents]);
    }

    public function show($id){
        $incident = Incident::with('lastIncidentHistory')
        ->with('asset.assetType')
        ->with('asset.insurancePolicyData.insurancePolicy')
        ->with('asset.insurancePolicyData.insuranceCompany')
        ->with('asset.assetsAttributesData')
        ->find($id);

        // Fetch the asset related to the incident
        $asset = $incident->asset;
        $asset->netPremium = $asset->netPremium();
        $asset->netTotal = $asset->netTotal();
        $asset->customer = $asset->customer();
        $asset->insurancePolicy = $asset->insurancePolicy();

        $breadcrumbs = [["name" => "Siniestros", "href" => "/admin/incidents"], ["name" => "Siniestro N° ".$incident->incident_number, "href" => "/admin/incident/show/".$incident->id]];
        return Inertia::render('Admin/Incidents/Show', [
            'breadcrumbs' => $breadcrumbs,
            'incident' => $incident,
            'asset' => $asset, // Send the asset related to the incident
        ]);
    }


    public function getAssetByAttributeValue(Request $request){
        $asset_type_attribute_id = $request->asset_type_attribute_id;
        $value = $request->value;
    
        $assets = AssetsAttributesData::where('assets_types_attributes_id', $asset_type_attribute_id)
            ->where('value', $value)
            ->get();
    
        return response()->json(['assets' => $assets]);
    }
}
