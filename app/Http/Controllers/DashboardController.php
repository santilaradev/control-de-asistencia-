<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard'); // Asegúrate de que la vista exista en resources/views/dashboard.blade.php
    }
}
