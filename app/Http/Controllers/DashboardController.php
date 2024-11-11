<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // pode definir o middleware direto na controller ao inves do middleware

    public function index()
    {
        return view('admin.dashboard');
    }
}
