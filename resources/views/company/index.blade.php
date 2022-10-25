@extends('layouts.app')
{{-- @section('title','كل الاقســـــام') --}}
@section('company_open','menu-open')
@section('company','active')
@section('company_index','active')



@section('content')
<!-- Main content -->
    <section class="content">
      <div class="">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title"> شركات التأمين</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>اسم الشركة </th>
                  <th> الموقع </th>
                  <th> الهاتف </th>
                  <th> نوع التأمين </th>
                  <th>التخفيض</th>
                  <th>العمليات</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($company as $item)
                        <tr>
                            <td>{{$index++}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->address}}</td>
                            <td>{{$item->phone}}</td>
                            <td>{{$item->type}}</td>
                            <td>{{$item->discount}}</td>
                            <td>
                                <div>
                                    <form  action="{{route('company.destroy',$item->id)}}" method="POST">
                                        {{ csrf_field()}}
                                        {{ method_field('delete') }}
                                        <a href="{{route('company.edit',$item->id)}}" class="btn btn-primary"> تعديل</a>
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
