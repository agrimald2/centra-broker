<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Customer;
use App\Models\DocumentType;
use App\Models\CustomerType;
use Illuminate\Support\Facades\Hash;

use Log;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $customers = Customer::with('documentType')->with('customerType')->withTrashed()->paginate(20);
        $document_types = DocumentType::all();    
        $customer_types = CustomerType::all();    
        $breadcrumbs = [["name" => "Clientes", "href" => "/admin/customers"]];
        return Inertia::render('Admin/Customers/Index', ['customers' => $customers, 'document_types' => $document_types,'customer_types' => $customer_types, 'breadcrumbs' => $breadcrumbs]);
    }

    public function customersFilter(Request $request)
    {
        $query = Customer::with('documentType')->with('customerType')->withTrashed();

        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('document_number', 'like', '%' . $request->search . '%');
        }
        /** @todo Customer and Doc type filter */

        $customers = $query->paginate(20);
        return response()->json($customers);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Log::debug($request);
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users',
            'document_number' => 'nullable|string',
            'document_type_id' => 'nullable|exists:document_types,id',
            'customer_type_id' => 'nullable|exists:document_types,id',
            'phone_number' => 'nullable|string',
        ]);

        $customer = Customer::create($validatedData);
        return response()->json($customer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users',
            'document_number' => 'nullable|string',
            'document_type_id' => 'nullable|exists:document_types,id',
            'customer_type_id' => 'nullable|exists:document_types,id',
            'phone_number' => 'nullable|string',
        ]);

        $customer = Customer::withTrashed()->findOrFail($id);
        $customer->update($validatedData);
        // Undelete
        $customer->deleted_at = null;
        $customer->save();
        return;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(auth()->id() != $id){
            Customer::findOrFail($id)->delete();
        }
    }
}
