@extends('layouts.app')
{{-- @section('title','بيانات القسم') --}}
@section('doctor_open','menu-open')
@section('doctor','active')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <!-- left column -->
            <div class="col-md-8">
                <!-- Horizontal Form -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title"> تعديل بيانات العيادة </h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{route('doctor.update',$item->id)}}" class="form-horizontal">
                        @csrf
                        @method('put')
                        <div class="card-body">

                             <div class="form-group row">
                                <label class="col-sm-2 control-label">اسم الطبيب </label>
                                <div class="col-sm-10">
                                    <input required type="text" value="{{$item->name}}"   class="form-control" name="name">
                                </div>
                            </div>



                            <div class="form-group row">
                                <label class="col-sm-2 control-label"> التخصص  </label>
                                <div class="col-sm-10">
                                    <select name="section" class="form-control">
                                        <option {{$item->section =='باطنية'? 'selected':''}} value="باطنية">باطنية</option>
                                        <option {{$item->section =='عظام'? 'selected':''}} value="عظام">عظام</option>
                                        <option {{$item->section =='عمومي'? 'selected':''}} value="عمومي">عمومي</option>
                                        <option {{$item->section =='جراحة'? 'selected':''}} value="جراحة">جراحة</option>
                                        <option {{$item->section =='اسنان'? 'selected':''}} value="اسنان">اسنان</option>
                                        <option {{$item->section =='انف و اذن'? 'selected':''}} value="انف و اذن">انف و اذن</option>
                                    </select>
                                </div>
                            </div>

                             <div class="form-group row">
                                <label class="col-sm-2 control-label"> سعر المقابلة   </label>
                                <div class="col-sm-10">
                                    <input required type="number" value="{{$item->price}}" class="form-control" name="price">
                                </div>
                            </div>



                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn  btn-info">تعديل</button>
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


