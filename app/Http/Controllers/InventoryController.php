<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $project = Project::first();
        return view('master', compact('inventories', 'inventories'));
    }
}
