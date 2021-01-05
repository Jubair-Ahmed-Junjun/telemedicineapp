@extends('admin.master')

@section('title')
    Home || Dashboard
@endsection

@section('main-content')
  	 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Appointments</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Create Appointment</button></li>
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
              <tr>
                <th>Doctor Name</th>
                <th>Date</th>
                <th>Time</th>
                <th>Description of the disease</th>
                <th>Cancel</th>
                <th>Chat</th>
                <th>Video</th>
              </tr>

            </thead>
            <tbody>
              @foreach($appointments as $appointment)
              <tr>
                <td>{{ $appointment->appointment }}</td>
                <td>{{ $appointment->date }}</td>
                <td>{{ $appointment->time }}</td>
                <td>{{$appointment->disease}}</td>
                <td>
                  <form id="delete-form-{{$appointment->id}}" action="{{route('appointment.destroy',$appointment->id)}}" method="post" style="display:none;">
                                                @csrf
                                                {{method_field('DELETE')}}

                                            </form>
                                            <a href="" onclick="if(confirm('Are you sure, You want to delete this?'))
                                            {
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{$appointment->id}}').submit();
                                            }else{
                                                event.preventDefault();
                                                    }" class="btn btn-danger">
                  <i class="fa fa-times"></i></a></td>
                <td><a href="{{ route('chatify') }}" class="btn btn-success"><i class="fa fa-comments"></i></a></td>
                <td><a href="" class="btn btn-danger"><i class="fa fa-video"></i></a></td>
                <td></td>
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
    <input type="date" class="form-control" name="date">
  </div>
  <div class="form-group">
    <select name="appointment" class="form-control">
      @foreach( $doctors as $doctor )
      <option value="{{$doctor->doctor_name}}({{$doctor->specialization}})">{{ $doctor->doctor_name }} || ({{$doctor->specialization}})</option>
      @endforeach

    </select>
  </div>
    <div class="form-group">
    <input type="time" class="form-control" name="time">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Description of the disease</label>
    <textarea class="form-control" name="disease" rows="3"></textarea>
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
