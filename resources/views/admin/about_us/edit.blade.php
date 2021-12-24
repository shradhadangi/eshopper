@extends('layouts.master')
@section('title') {{ 'Edit About-us Detail'}} @endsection
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
                <h3 class="card-title">About-us Detail</h3>
              </div>
              <form method="post" action="{{ route('about.update',['about'=>$about->id]) }}" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"  id="exampleInputName1" name="name" value="{{ old('name') ? old('name') : $about->title }}"  placeholder="Title">
                    <span class="text-danger">@error('name') {{ $message}}@enderror</span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Image</label>
                     <input type="file" name="image" class="form-control">
                    <span class="text-danger">@error('image') {{ $message}}@enderror</span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <textarea class="form-control @error('description') is-invalid @enderror"  id="summernote" name="description" placeholder="Description">{{ old('description') ? old('description') : $about->description }}</textarea>
                    <span class="text-danger">@error('description') {{ $message}}@enderror</span>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                  <a href="{{ route('about.index')}}" class="btn btn-danger ">Back</a>
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