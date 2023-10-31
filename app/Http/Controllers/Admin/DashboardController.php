<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\AssetsType;
use App\Models\AssetsTypesAttribute;
use App\Models\InsurancePolicy;
use App\Models\Incident;
use App\Models\Asset;
use App\Models\Customer;
use Log;

class DashboardController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumbs = [["name" => "Dashboard", "href" => "/admin/dashboard"]];
        return Inertia::render('Admin/Dashboard/Index', ['breadcrumbs' => $breadcrumbs]);
    }

    public function getStatistics(Request $request){
        Log::debug($request);
        $start_date = $request->start_date;
        $end_date = $request->end_date;
    
        $policies_total_number = InsurancePolicy::whereBetween('created_at', [$start_date, $end_date])->count();
        $policies_total_comission = InsurancePolicy::whereBetween('created_at', [$start_date, $end_date])
            ->get()
            ->sum(function ($policy) {
                return $policy->latestInsurancePolicyData->totalComission();
            });
        $policies_total_net_premium = InsurancePolicy::whereBetween('created_at', [$start_date, $end_date])
            ->get()
            ->sum(function ($policy) {
                return $policy->latestInsurancePolicyData->netPremiumTotal();
            });
        
        $policies_total_net = InsurancePolicy::whereBetween('created_at', [$start_date, $end_date])
            ->get()
            ->sum(function ($policy) {
                return $policy->latestInsurancePolicyData->netTotal();
            });

        $customers_total = Customer::whereBetween('created_at', [$start_date, $end_date])->count();
        
        $incidents_total = Incident::whereBetween('created_at', [$start_date, $end_date])->count();
        $assets_total = Asset::whereBetween('created_at', [$start_date, $end_date])->count();
    
        return response()->json([
            'policies_total_number' => $policies_total_number,
            'policies_total_comission' => $policies_total_comission,
            'policies_total_net_premium' => $policies_total_net_premium,
            'policies_total_net' => $policies_total_net,
            'customers_total' => $customers_total,
            'incidents_total' => $incidents_total,
            'assets_total' => $assets_total,
        ]);
    }
}

