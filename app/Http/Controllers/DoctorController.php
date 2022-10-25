<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use App\Models\Doctor;
use App\Traits\Oprations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    use  Oprations;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clinic = Clinic::where('user_id', Auth::user()->id)->first();

        $doctor = Doctor::where('clinic_id', $clinic->id)->orderBy('id', 'desc')->get();
        $index = 1;
        return view('doctor.index', compact('doctor', 'index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->create_date('doctor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $clinic = Clinic::where('user_id', Auth::user()->id)->first();

        $doctor = new Doctor();
        $doctor->name = $request->name;
        $doctor->section = $request->section;
        $doctor->price = $request->price;
        $doctor->clinic_id = $clinic->id;

        $doctor->save();

        toast('تم الاضافة بنجاح', 'success');
        return redirect()->route('doctor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->edit_data(Doctor::class, $id, 'doctor.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $doctor =  Doctor::find($id);
        $doctor->name = $request->name;
        $doctor->section = $request->section;
        $doctor->price = $request->price;
        $doctor->save();

        toast('تم التعديل بنجاح', 'success');
        return redirect()->route('doctor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor =  Doctor::find($id);
        $doctor->delete();


        toast('تم الحذف بنجاح', 'success');
        return redirect()->route('doctor.index');
    }
}