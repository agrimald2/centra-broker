<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Executive;
use Log;

class ExecutivesController extends Controller
{
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => '',
            'email' => '',
        ]);
        $data = Executive::create($validatedData);
        return response()->json($data);
    }
}
