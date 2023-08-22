<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use App\Models\DocumentType;
use Illuminate\Support\Facades\Hash;

use Log;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('documentType')->withTrashed()->paginate(15);
        $pagination = User::with('documentType')->withTrashed()->paginate(1);
        $document_types = DocumentType::all();    
        $breadcrumbs = [["name" => "Usuarios", "href" => "/admin/users"]];
        return Inertia::render('Admin/Users/Index', ['users' => $users, 'document_types' => $document_types, 'breadcrumbs' => $breadcrumbs]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'document_number' => 'nullable|string',
            'document_type_id' => 'nullable|exists:document_types,id',
            'phone_number' => 'nullable|string',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $user = User::create($validatedData);
        return;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'password' => 'sometimes|required|string|min:8',
            'document_number' => 'nullable|string',
            'document_type_id' => 'nullable|exists:document_types,id',
            'phone_number' => 'nullable|string',
        ]);

        if($request->filled('password')) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }

        $user = User::withTrashed()->findOrFail($id);
        $user->update($validatedData);
        // Undelete User
        $user->deleted_at = null;
        $user->save();
        return;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(auth()->id() != $id){
            User::findOrFail($id)->delete();
        }
    }
}
