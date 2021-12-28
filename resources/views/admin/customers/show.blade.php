@extends('layouts.master')
@section('title') {{ 'Customer Detail'}} @endsection
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
          <div class="col-md-9">
            <!-- general form elements -->
            <div class="card card-primary">

              <div class="card-header">
                <h3 class="card-title">Basic Detail</h3>
              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <form method="post" action="{{ route('basic-detail.update',['basic_detail'=>$basic_detail->id]) }}" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Site Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"  id="exampleInputName1" name="name" value="{{ old('name') ? old('name') : $basic_detail->site_name }}"  placeholder="Website Name">
                    <span class="text-danger">@error('name') {{ $message}}@enderror</span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Phone Number</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror"  id="exampleInputName1" name="phone" value="{{ old('phone') ? old('phone') : $basic_detail->phone }}"  placeholder="Phone Number">
                    <span class="text-danger">@error('name') {{ $message}}@enderror</span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror"  id="exampleInputName1" name="email" value="{{ old('email') ? old('email') : $basic_detail->email }}"  placeholder="Email ID">
                    <span class="text-danger">@error('email') {{ $message}}@enderror</span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Logo</label>
                     <input type="file" name="image" class="form-control">
                    <span class="text-danger">@error('logo') {{ $message}}@enderror</span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <textarea class="form-control @error('address') is-invalid @enderror"  id="exampleInputName1" name="address" placeholder="Address">{{ old('address') ? old('address') : $basic_detail->address }}</textarea>
                    <span class="text-danger">@error('address') {{ $message}}@enderror</span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Map</label>
                    <textarea class="form-control @error('address') is-invalid @enderror" id="exampleInputName1" name="map" placeholder="Map">{{ old('map') ? old('map') : $basic_detail->map }}</textarea>
                    <span class="text-danger">@error('map') {{ $message}}@enderror</span>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                  <a href="{{ route('basic-detail.index')}}" class="btn btn-danger ">Back</a>
                  <br>
            </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
          <!-- right column -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

@endsection