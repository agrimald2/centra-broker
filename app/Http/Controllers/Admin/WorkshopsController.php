<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Workshop;
use Log;

class WorkshopsController extends Controller
{
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => '',
            'responsible_name' => '',
            'responsible_phone_number' => '',
        ]);
        $data = Workshop::create($validatedData);
        return response()->json($data);
    }
}
