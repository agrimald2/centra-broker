<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\InsurancePoliciesStatus;

class InsurancePoliciesStatusesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $insurance_policies_statuses = InsurancePoliciesStatus::withTrashed()->get();
        $breadcrumbs = [["name" => "Configuración", "href" => "/admin/insurance_policies_statuses"], ["name" => "Estados de Póliza", "href" => "/admin/insurance_policies_statuses"]];
        return Inertia::render('Admin/InsurancePoliciesStatuses/Index', ['insurance_policies_statuses' => $insurance_policies_statuses, 'breadcrumbs' => $breadcrumbs]);
    }

    /**
     * 
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $insurance_company = InsuranceCompany::create($validatedData);
        return;
    }

    /**
     * Display the specified resource.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $insurance_company = InsuranceCompany::withTrashed()->findOrFail($id);
        $insurance_company->update($validatedData);
        // Undelete
        $insurance_company->deleted_at = null;
        $insurance_company->save();
        return;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        InsuranceCompany::findOrFail($id)->delete();
    }
}
