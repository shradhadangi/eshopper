@extends('layouts.master')
@section('title') {{ 'Add Color'}} @endsection
@section('content')
<section class="content">
      <div class="container-fluid">
          @if (count($errors) > 0)
            <div class="alert alert-danger alert-dismissible" style="width:50%;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Whoops!</strong> There were some problems with your input.
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
          @if(session('success'))
              <div class="alert alert-success alert-dismissible" style="width:50%;">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  {{ session('success')}}
                </div>
          @endif
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add New Color</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ route('color.store') }}" enctype="multipart/form-data">
                  @csrf
                <div class="card-body row">
                  <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Color</label>
                     <input type="text" name="name" class="form-control">
                     <span class="text-danger">@error('name') {{ $message}}@enderror</span>
                  </div>
                  </div>
                  <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Color Code</label>
                     <input type="text" name="color_code" class="form-control">
                     <span class="text-danger">@error('color_code') {{ $message}}@enderror</span>
                  </div>
                  </div>
                  <div class="col-md-4 mt-3">
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                  </div>
               </div>
                <!-- /.card-body -->

              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
          <!-- right column -->
        </div>
        <!-- /.row -->
        <div class="card">
                 <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>S. No.</th>
                      <th>Color</th>
                      <th>Color Code</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php $i=1;?>
                    <?php foreach ($values as $v){ ?>

                          <tr>
                              <td>{{ $i++;}}</td>
                              <td>{{$v->color}}</td>
                              <td>{{$v->color_code}}</td>
                              <td style="display: flex;">
                              <a style="margin: 2px;float:left;" href="{{ route('color.edit',['color'=>$v->id])}}" class="btn btn-sm btn-info"> <i class="fa fa-edit"></i> </a>
                              <form method="post" action="{{ route('color.destroy',['color'=>$v->id])}}">
                                @csrf
                                @method('DELETE')
                              <button style="margin: 2px; float:revert;" type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                              </form>
                              </td>
                          </tr>
                    <?php }?>
                      </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection