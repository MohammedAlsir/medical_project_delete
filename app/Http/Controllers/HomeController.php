<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use App\Models\Company;
use App\Models\Pharmacy;
use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $clinic = Clinic::all();
        $pharmacy = Pharmacy::all();
        $company = Company::all();
        return view('home', compact(
            "clinic",
            "pharmacy",
            "company"
        ));
    }
}