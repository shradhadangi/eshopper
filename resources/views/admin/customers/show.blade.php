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
                <h3 class="card-title">Customer Detail</h3>
              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <form method="post" action="{{ route('customer.update',['customer'=>$customer->id]) }}" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">First Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"  id="exampleInputName1" name="name" value="{{ old('name') ? old('name') : $customer->first_name }}"  readonly placeholder=" Name">
                    <span class="text-danger">@error('name') {{ $message}}@enderror</span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Last Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"  id="exampleInputName1" name="name" value="{{ old('name') ? old('name') : $customer->last_name }}"  readonly placeholder=" Name">
                    <span class="text-danger">@error('name') {{ $message}}@enderror</span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mobile Number</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror"  id="exampleInputName1" name="phone" value="{{ old('phone') ? old('phone') : $customer->mobile }}"  readonly placeholder=" Number">
                    <span class="text-danger">@error('name') {{ $message}}@enderror</span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Phone Number</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror"  id="exampleInputName1" name="phone" value="{{ old('phone') ? old('phone') : $customer->phone }}"  readonly placeholder="Phone Number">
                    <span class="text-danger">@error('name') {{ $message}}@enderror</span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror"  id="exampleInputName1" name="email" value="{{ old('email') ? old('email') : $customer->email }}"  readonly placeholder="Email ID">
                    <span class="text-danger">@error('email') {{ $message}}@enderror</span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Gender</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror"  id="exampleInputName1" name="phone" value="{{ old('phone') ? old('phone') : $customer->gender }}"  readonly placeholder="Phone Number">
                    <span class="text-danger">@error('name') {{ $message}}@enderror</span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Interest</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror"  id="exampleInputName1" name="phone" value="{{ old('phone') ? old('phone') : $customer->interests }}"  readonly placeholder="Phone Number">
                    <span class="text-danger">@error('name') {{ $message}}@enderror</span>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <!-- <button type="submit" class="btn btn-primary">Update</button> -->
                  <a href="{{ route('customer.index')}}" class="btn btn-danger ">Back</a>
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