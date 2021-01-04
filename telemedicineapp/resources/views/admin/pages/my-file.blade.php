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
            <h1>File Uploads</h1>
          </div>
            @if(Auth::user()->roles == 'admin' || Auth::user()->roles == 'patient')
          <div class="col-sm-6">
            <!-- <form action="" method="post">
              {{ csrf_field() }} -->
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item">

                  <div class="form-group">
                    <input type="file" class="form-control-file" name="file_name">
                  </div>
              </li>&nbsp; -->
              <li><button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal">upload</button></li>
            </ol>
            <!-- </form> -->
          </div>
          @endif
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
                <th>Name</th>
                <th>Sender</th>
                <th>Download</th>
                <th>Delete</th>
              </tr>

            </thead>
            <tbody>
              @foreach($myfiles as $myfile)
              <tr>
                <!-- <td>{{ $myfile->image }}</td>   -->
                <td><img src="{{ asset($myfile->image) }}" alt="" width="50px" height="40px"></td>
                <td>{{ $myfile->email }}</td>
                <td><a href="{{ route('download',['id'=>$myfile->id]) }}" class="btn btn-primary"><i class="fa fa-download"></i></a></td>
                <td>
                  <form id="delete-form-{{$myfile->id}}" action="{{route('my-file.destroy',$myfile->id)}}" method="post" style="display:none;">
                                                @csrf
                                                {{method_field('DELETE')}}

                                            </form>
                                            <a href="" onclick="if(confirm('Are you sure, You want to delete this?'))
                                            {
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{$myfile->id}}').submit();
                                            }else{
                                                event.preventDefault();
                                                    }" class="btn btn-danger">
                  <i class="fa fa-trash"></i></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                @if(Auth::user()->roles =='admin' || Auth::user()->roles =='doctor')
                <div class="col-sm-6">
                   <div class="form-group row">
                    <h3 class="col-sm-3">Send File</h3>
                      <div class="col-sm-3">
                        <select class="form-control">
                           <option value="">Select</option>
                           @foreach($myfiles as $myfile)
                           <option value="{{$myfile->email}}, {{$myfile->file_name}}">{{$myfile->email}},{{$myfile->file_name}}</option>
                           @endforeach
                      </select>
                      </div>
                    </div>

              </div>
              <div class="col-sm-6">
                  <!-- <form action="" method="post">
                    {{ csrf_field() }} -->
                  <ol class="breadcrumb float-sm-right">
                    <!-- <li class="breadcrumb-item">

                        <div class="form-group">
                          <input type="file" class="form-control-file" name="file_name">
                        </div>
                    </li>&nbsp; -->
                    <li><button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal">upload</button></li>
                  </ol>
                  <!-- </form> -->
                </div>

                @endif
              </div>
            </div>
          </section>
        </div>
        <!-- /.card-body -->

        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

      <!-- Modal -->
<div class="modal fade" id="exampleModal"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <form action="" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
        <div class="form-group">
          <input type="text" class="form-control" name="name" placeholder="Name" value="{{Auth::user()->name}}" readonly>
        </div>
        <div class="form-group">
          <input type="email" class="form-control" name="email" placeholder="Email" value="{{Auth::user()->email}}" readonly>
        </div>
        <div class="form-group">
          <input type="file" class="form-control-file" name="image">
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
