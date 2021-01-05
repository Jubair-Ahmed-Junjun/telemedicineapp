@extends('admin.master')

@section('title')
    My Files || Dashboard
@endsection

@section('main-content')
  	 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Doctors</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Doctors</button></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-body">
          <table class="table table-striped table-hover">
            <thead>
              <tr class="bg-primary">
                <th>Doctor Name</th>
                <th>Email</th>
                <th>Specialization</th>
                <th>Action</th>
              </tr>

            </thead>
            <tbody>
              @foreach($doctors as $doctor)
              <tr>
                <td>{{ $doctor->doctor_name }}</td>
                <td>{{ $doctor->email }}</td>
                <td>{{ $doctor->specialization }}</td>
                <td>
                  <a href="" class="btn btn-success"><i class="fa fa-edit"></i></a>
                  <form id="delete-form-{{$doctor->id}}" action="{{route('doctors.destroy',$doctor->id)}}" method="post" style="display:none;">
                                                @csrf
                                                {{method_field('DELETE')}}

                                            </form>
                                            <a href="" onclick="if(confirm('Are you sure, You want to delete this?'))
                                            {
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{$doctor->id}}').submit();
                                            }else{
                                                event.preventDefault();
                                                    }" class="btn btn-danger">
                  <i class="fa fa-trash"></i></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
<!-- Modal -->
<div class="modal fade" id="exampleModal"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <form action="" method="POST">
          {{ csrf_field() }}
        <div class="form-group">
          <input type="text" class="form-control" name="doctor_name" placeholder="Doctor Name">
        </div>
        <div class="form-group">
          <input type="email" class="form-control" name="email" placeholder="Email">
        </div>
        <div class="form-group">
          <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="specialization" placeholder="Specialization">
        </div>
        <button type="submit" class="btn btn-primary float-sm-right">Save</button>
      </form>
      </div>
    </div>
  </div>
</div>
    </section>
    <!-- /.content -->
  </div>
@endsection
