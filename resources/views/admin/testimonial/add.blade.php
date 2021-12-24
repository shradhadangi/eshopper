@extends('layouts.master')
@section('title') {{ 'Add Testimonial '}} @endsection
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
                <h3 class="card-title">Add New Testimonial</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ route('testimonial.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body row">
                   <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName1" name="name" value="{{ old('name')}}"  placeholder="Name">
                        <span class="text-danger">@error('name') {{ $message}}@enderror</span>
                      </div>
                   </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Designation</label>
                        <input type="text" class="form-control @error('designation') is-invalid @enderror" id="exampleInputName1" name="designation" value="{{ old('designation')}}"  placeholder="Designation">
                        <span class="text-danger">@error('designation') {{ $message}}@enderror</span>
                    </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Image</label>
                          <input type="file" name="image" class="form-control">
                          <span class="text-danger">@error('image') {{ $message}}@enderror</span>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Description</label>
                          <textarea class="form-control @error('description') is-invalid @enderror" id="exampleInputName1" name="description"  placeholder="Description">{{ old('description')}}</textarea>
                         <span class="text-danger">@error('description') {{ $message}}@enderror</span>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="{{ route('testimonial.index')}}" class="btn btn-danger ">Back</a>
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