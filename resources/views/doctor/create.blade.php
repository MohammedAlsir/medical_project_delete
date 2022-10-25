@extends('layouts.app')
{{-- @section('title','إضافة قسم جديد') --}}
@section('doctor_open','menu-open')
@section('doctor','active')
@section('doctor_create','active')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <!-- left column -->
            <div class="col-md-8">
                <!-- Horizontal Form -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">إضافة  طبيب جديد</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{route('doctor.store')}}" class="form-horizontal">
                        @csrf
                        <div class="card-body">

                            <div class="form-group row">
                                <label class="col-sm-2 control-label">اسم الطبيب </label>
                                <div class="col-sm-10">
                                    <input required type="text" class="form-control" name="name">
                                </div>
                            </div>



                            <div class="form-group row">
                                <label class="col-sm-2 control-label"> التخصص  </label>
                                <div class="col-sm-10">
                                    <select name="section" class="form-control">
                                        <option value="باطنية">باطنية</option>
                                        <option value="عظام">عظام</option>
                                        <option value="عمومي">عمومي</option>
                                        <option value="جراحة">جراحة</option>
                                        <option value="اسنان">اسنان</option>
                                        <option value="انف و اذن">انف و اذن</option>
                                    </select>
                                </div>
                            </div>

                             <div class="form-group row">
                                <label class="col-sm-2 control-label"> سعر المقابلة   </label>
                                <div class="col-sm-10">
                                    <input required type="number" class="form-control" name="price">
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


