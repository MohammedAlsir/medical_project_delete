@extends('layouts.app')
{{-- @section('title','إضافة قسم جديد') --}}
@section('company_open','menu-open')
@section('company','active')
@section('company_create','active')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <!-- left column -->
            <div class="col-md-8">
                <!-- Horizontal Form -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">إضافة شركة تأمين جديدة</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{route('company.store')}}" class="form-horizontal">
                        @csrf
                        <div class="card-body">

                            <div class="form-group row">
                                <label class="col-sm-2 control-label">اسم الشركة </label>
                                <div class="col-sm-10">
                                    <input required type="text" class="form-control" name="name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 control-label">  الموقع </label>
                                <div class="col-sm-10">
                                    <input required type="text" class="form-control" name="address">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 control-label">الهاتف </label>
                                <div class="col-sm-10">
                                    <input required type="number" class="form-control" name="phone">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 control-label"> نوع التأمين </label>
                                <div class="col-sm-10">
                                    <select name="type" class="form-control">
                                        <option value="افراد">افراد</option>
                                        <option value="شركات">شركات</option>
                                    </select>
                                </div>
                            </div>

                             <div class="form-group row">
                                <label class="col-sm-2 control-label"> نسبة التخفيض  </label>
                                <div class="col-sm-10">
                                    <input required type="number" class="form-control" name="discount">
                                </div>
                            </div>


                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">اضافة</button>
                            </div>
                            <!-- /.card-footer -->
                    </form>
                </div>
                <!-- /.card -->

            </div>
            <!--/.col (left) -->

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

@endsection


