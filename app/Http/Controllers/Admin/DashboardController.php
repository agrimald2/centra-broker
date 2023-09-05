<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\AssetsType;
use App\Models\AssetsTypesAttribute;

class DashboardController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumbs = [["name" => "Dashboard", "href" => "/admin/dashboard"]];
        return Inertia::render('Admin/Dashboard/Index', ['breadcrumbs' => $breadcrumbs]);
    }
}

