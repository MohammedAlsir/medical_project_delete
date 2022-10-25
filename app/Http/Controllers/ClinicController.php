<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use App\Models\User;
use App\Traits\Oprations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClinicController extends Controller
{
    use  Oprations;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clinic = Clinic::orderBy('id', 'desc')->get();
        $index = 1;
        return view('clinic.index', compact('clinic', 'index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->create_date('clinic.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->level = '2';
        $user->save();


        $clinic = new Clinic();
        $clinic->name = $request->name;
        $clinic->address = $request->address;
        $clinic->user_id = $user->id;
        $clinic->save();

        toast('تم الاضافة بنجاح', 'success');
        return redirect()->route('clinic.index');
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
        return $this->edit_data(Clinic::class, $id, 'clinic.edit');
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
        $clinic =  Clinic::find($id);
        $clinic->name = $request->name;
        $clinic->address = $request->address;
        // $pharma->user_id = $user->id;

        $user =  User::find($clinic->user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password)
            $user->password = Hash::make($request->password);
        $user->save();
        $clinic->save();

        toast('تم التعديل بنجاح', 'success');
        return redirect()->route('clinic.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clinic =  Clinic::find($id);
        $clinic->delete();

        $user =  User::find($clinic->user_id);
        $user->delete();

        toast('تم الحذف بنجاح', 'success');
        return redirect()->route('clinic.index');
    }
}