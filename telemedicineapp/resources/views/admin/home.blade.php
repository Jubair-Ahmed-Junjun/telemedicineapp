@extends('admin.master')
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
          			<th>Status</th>
          			<th>Cancel</th>
          			<th>Chat</th>
          			<th>Video</th>
          		</tr>

          	</thead>
          	<tbody>
          		<tr>
          			<td>Hello</td>
          			<td>Hello</td>
          			<td>Hello</td>
          			<td>Hello</td>
          			<td>Hello</td>
          			<td>Hello</td>
          			<td>Hello</td>
          		</tr>
          		<tr>
          			<td>Hello</td>
          			<td>Hello</td>
          			<td>Hello</td>
          			<td>Hello</td>
          			<td>Hello</td>
          			<td>Hello</td>
          			<td>Hello</td>
          		</tr>
          	</tbody>
          </table>
        </div>
      </div>
<!-- Modal -->
<div class="modal fade" id="exampleModal"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <form>
  <div class="form-group">   
    <input type="date" class="form-control">
  </div>
  <div class="form-group">
    <select name="apoinment" class="form-control">
    	<option value="">Chose Apoinment</option>
    	<option value="">Abul</option>
    	<option value="">Babul</option>
    	<option value="">Kabul</option>
    </select>
  </div>
    <div class="form-group">
    <input type="time" class="form-control">
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