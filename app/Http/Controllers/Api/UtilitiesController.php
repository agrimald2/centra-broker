<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Customer;
use App\Models\DocumentType;
use App\Models\CustomerType;

use Log;

class UtilitiesController extends Controller
{
    /**
     * Getters
     */
    public function getCustomerTypes(){
        $customer_types = CustomerType::all();
        return response()->json($customer_types);
    }

    public function getDocumentTypes(){
        $document_types = DocumentType::all();
        return response()->json($document_types);
    }

    public function getCustomers(){
        $customer = Customer::all();
        return response()->json($document_types);
    }

    public function getUsers(){
        $users = User::all();
        return response()->json($users);
    }

}
