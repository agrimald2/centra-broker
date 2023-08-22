<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\DocumentType;

class DocumentTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $document_types = DocumentType::withTrashed()->get();
        $breadcrumbs = [["name" => "Configuración", "href" => "/admin/document_types"], ["name" => "Tipos de Documentos", "href" => "/admin/document_types"]];
        return Inertia::render('Admin/DocumentTypes/Index', ['document_types' => $document_types, 'breadcrumbs' => $breadcrumbs]);
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

        $document_types = DocumentType::create($validatedData);
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

        $document_type = DocumentType::withTrashed()->findOrFail($id);
        $document_type->update($validatedData);
        // Undelete
        $document_type->deleted_at = null;
        $document_type->save();
        return;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DocumentType::findOrFail($id)->delete();
    }
}
