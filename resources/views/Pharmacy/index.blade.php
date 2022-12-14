@extends('layouts.app')
{{-- @section('title','كل الاقســـــام') --}}
@section('pharmacy_open','menu-open')
@section('pharmacy','active')
@section('pharmacy_index','active')



@section('content')
<!-- Main content -->
    <section class="content">
      <div class="">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title"> الصيدليات</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>اسم الصيدلية </th>
                  <th> الموقع </th>
                  <th>البريد الالكتروني</th>
                  <th>العمليات</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($pharmacy as $item)
                        <tr>
                            <td>{{$index++}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->address}}</td>
                            <td>{{$item->user->email}}</td>
                            <td>
                                <div>
                                    <form  action="{{route('pharmacy.destroy',$item->id)}}" method="POST">
                                        {{ csrf_field()}}
                                        {{ method_field('delete') }}
                                        <a href="{{route('pharmacy.edit',$item->id)}}" class="btn btn-primary"> تعديل</a>
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
