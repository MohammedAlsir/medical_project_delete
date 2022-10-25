<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Clinic;
use App\Models\Doctor;
use App\Models\Medicine;
use App\Models\Order;
use App\Traits\ApiMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OprationController extends Controller
{
    use ApiMessage;

    public function get_clinic()
    {
        $clinic = Clinic::orderBy('id', 'DESC')->get();

        return $this->returnData('clinic', $clinic);
    }

    public function get_doctor_by_id($id)
    {
        $doctors = Doctor::where('clinic_id', $id)->orderBy('id', 'DESC')->get();


        return $this->returnData('doctors', $doctors);
    }
}
