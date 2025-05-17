<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index(Request $rquest)
    {
        return Inertia::render('Dashboard', []);
    }
}
