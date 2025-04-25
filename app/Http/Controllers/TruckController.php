<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TruckController extends Controller
{
    public function index()
    {
        // Logic to retrieve and display all trucks
        return view('trucks.index');
    }
}
