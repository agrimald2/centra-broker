<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\InsuranceCompany;

class InsuranceCompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $insurance_companies = InsuranceCompany::withTrashed()->get();
        $breadcrumbs = [["name" => "Configuración", "href" => "/admin/insurance_companies"], ["name" => "Aseguradoras", "href" => "/admin/insurance_companies"]];
        return Inertia::render('Admin/InsuranceCompanies/Index', ['insurance_companies' => $insurance_companies, 'breadcrumbs' => $breadcrumbs]);
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
