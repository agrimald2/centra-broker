<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Driver;

class DriversController extends Controller
{
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'document_type_id' => '',
            'document_number' => '',
        ]);

        $data = Driver::create($validatedData);
        return response()->json($data);
    }
}
