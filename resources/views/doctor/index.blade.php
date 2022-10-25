@extends('layouts.app')
{{-- @section('title','كل الاقســـــام') --}}
@section('doctor_open','menu-open')
@section('doctor','active')
@section('doctor_index','active')



@section('content')
<!-- Main content -->
    <section class="content">
      <div class="">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title"> الاطباء </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>اسم الطبيب </th>
                  <th> التخصص </th>
                  <th>سعر المقابلة</th>
                  <th>العمليات</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($doctor as $item)
                        <tr>
                            <td>{{$index++}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->section}}</td>
                            <td>{{$item->price}}</td>

                            <td>
                                <div>
                                    <form  action="{{route('doctor.destroy',$item->id)}}" method="POST">
                                        {{ csrf_field()}}
                                        {{ method_field('delete') }}
                                        <a href="{{route('doctor.edit',$item->id)}}" class="btn btn-primary"> تعديل</a>
                                        <button type="submit" class="btn btn-danger"></i>&nbsp; حذف</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach



                </tbody>

              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection
