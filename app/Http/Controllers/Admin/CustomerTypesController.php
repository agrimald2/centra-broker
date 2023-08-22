<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\CustomerType;

class CustomerTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer_types = CustomerType::withTrashed()->get();
        $breadcrumbs = [["name" => "Configuración", "href" => "/admin/customer_types"], ["name" => "Tipos de Clientes", "href" => "/admin/customer_types"]];
        return Inertia::render('Admin/CustomerTypes/Index', ['customer_types' => $customer_types, 'breadcrumbs' => $breadcrumbs]);
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

        $customer_types = CustomerType::create($validatedData);
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

        $customer_type = CustomerType::withTrashed()->findOrFail($id);
        $customer_type->update($validatedData);
        // Undelete User
        $customer_type->deleted_at = null;
        $customer_type->save();
        return;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        CustomerType::findOrFail($id)->delete();
    }
}
