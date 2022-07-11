<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Show dashboard page
     * route: GET /
     * 
     * @return Illuminate\Contracts\View\View
     */
    public function showDashboard()
    {
        return view('dashboard.index');
    }
}
