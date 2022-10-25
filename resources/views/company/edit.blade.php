@extends('layouts.app')
{{-- @section('title','بيانات القسم') --}}
@section('company_open','menu-open')
@section('company','active')
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
                    <form method="POST" action="{{route('company.update',$item->id)}}" class="form-horizontal">
                        @csrf
                        @method('put')
                        <div class="card-body">


                            <div class="form-group row">
                                <label class="col-sm-2 control-label">اسم الشركة </label>
                                <div class="col-sm-10">
                                    <input required type="text" value="{{$item->name}}" class="form-control" name="name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 control-label">  الموقع </label>
                                <div class="col-sm-10">
                                    <input required type="text" value="{{$item->address}}" class="form-control" name="address">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 control-label">الهاتف </label>
                                <div class="col-sm-10">
                                    <input required type="number" value="{{$item->phone}}" class="form-control" name="phone">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 control-label"> نوع التأمين </label>
                                <div class="col-sm-10">
                                    <select name="type" class="form-control">
                                        <option  {{$item->type == "افرد" ? 'selected':''}} value="افراد">افراد</option>
                                        <option  {{$item->type == "شركات" ? 'selected':''}} value="شركات">شركات</option>
                                    </select>
                                </div>
                            </div>

                             <div class="form-group row">
                                <label class="col-sm-2 control-label"> نسبة التخفيض  </label>
                                <div class="col-sm-10">
                                    <input required type="number" value="{{$item->discount}}" class="form-control" name="discount">
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


