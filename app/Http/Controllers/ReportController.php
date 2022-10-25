<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use App\Models\Medicine;
use App\Models\Pharma;
use App\Models\Pharmacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function report_pharmacy()
    {
        $pharmacy = Pharmacy::all();
        $index = 1;
        return view('reports.pharmacy', compact('pharmacy', 'index'));
    }

    public function report_clinic()
    {

        $clinic = Clinic::orderBy('id', 'desc')->get();
        $index = 1;
        return view('reports.clinic', compact('clinic', 'index'));
    }
}
