<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\AssetsType;
use App\Models\AssetsTypesAttribute;

class AssetsTypesController extends Controller
{
    private const MAIN_CLASS = AssetsType::class;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assets_types = self::MAIN_CLASS::withTrashed()->get();
        $breadcrumbs = [["name" => "Configuración", "href" => "/admin/assets_types"], ["name" => "Tipos de Activos", "href" => "/admin/assets_types"]];
        return Inertia::render('Admin/AssetsTypes/Index', ['assets_types' => $assets_types, 'breadcrumbs' => $breadcrumbs]);
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

        $assets_types = self::MAIN_CLASS::create($validatedData);
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

        $assets_type = self::MAIN_CLASS::withTrashed()->findOrFail($id);
        $assets_type->update($validatedData);
        // Undelete
        $assets_type->deleted_at = null;
        $assets_type->save();
        return;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        self::MAIN_CLASS::findOrFail($id)->delete();
    }

    public function addAttributeToAsset($id){
        $assets_type = self::MAIN_CLASS::with('attributes')->find($id);
        $breadcrumbs = [["name" => "Configuración", "href" => "/admin/assets_types"], ["name" => "Tipos de Activos", "href" => "/admin/assets_types"], ["name" => "Agregar Atributos a ".$assets_type->name, ]];
        return Inertia::render('Admin/AssetsTypes/AssetsTypesAttributes/Index', ['assets_type' => $assets_type, 'breadcrumbs' => $breadcrumbs]);
    }
    
    public function storeAttributeToAsset(Request $request){

        $validatedData = $request->validate([
            'assets_type_id' => 'required',
            'name' => 'required|string|max:255',
            'input_type' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'example' => 'required|string|max:255',
        ]);
        
        $attributes = AssetsTypesAttribute::create($validatedData);
        
        return;
    }
}

