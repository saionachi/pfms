<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show dashboard page
     * route: GET /
     * 
     * @return Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('dashboard.index');
    }
}
