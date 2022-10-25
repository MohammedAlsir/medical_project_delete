<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use App\Models\Company;
use App\Models\Contracted_companies;
use App\Traits\Oprations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    use  Oprations;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::orderBy('id', 'desc')->get();
        $index = 1;
        return view('company.index', compact('company', 'index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->create_date('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = new Company();
        $company->name = $request->name;
        $company->address = $request->address;
        $company->discount = $request->discount;
        $company->type = $request->type;
        $company->phone = $request->phone;
        $company->save();

        toast('تم الاضافة بنجاح', 'success');
        return redirect()->route('company.index');
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
        return $this->edit_data(Company::class, $id, 'company.edit');
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
        $company =  Company::find($id);
        $company->name = $request->name;
        $company->address = $request->address;
        $company->discount = $request->discount;
        $company->type = $request->type;
        $company->phone = $request->phone;
        $company->save();

        toast('تم التعديل بنجاح', 'success');
        return redirect()->route('company.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company =  Company::find($id);
        $company->delete();



        toast('تم الحذف بنجاح', 'success');
        return redirect()->route('company.index');
    }

    public function select()
    {
        $clinic = Clinic::where('user_id', Auth::user()->id)->first();

        $company = Company::all();
        $contracted =  Contracted_companies::where('clinic_id', $clinic->id);
        $index = 1;
        return  view('company.select', compact('company', 'index', 'contracted'));
    }

    public function select_post($id)
    {
        $clinic = Clinic::where('user_id', Auth::user()->id)->first();

        $contracted = new Contracted_companies();
        $contracted->company_id = $id;
        $contracted->clinic_id = $clinic->id;
        $contracted->save();
        toast('تم التعاقد مع الشركة', 'success');
        return redirect()->back();
    }

    public function select_delete_post($id /* company id*/)
    {
        $clinic = Clinic::where('user_id', Auth::user()->id)->first();

        $contracted = Contracted_companies::where('clinic_id', $clinic->id)->where('company_id', $id)->first();
        $contracted->delete();

        toast('تم الغاء التعاقد مع الشركة', 'success');
        return redirect()->back();
    }
}