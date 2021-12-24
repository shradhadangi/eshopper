@extends('layouts.master')
@section('title') {{ 'About-us Detail'}} @endsection
@section('content')
<section class="content">
      <div class="container-fluid">
              @if(session('error'))
                <div class="alert alert-danger alert-dismissible" style="margin:5px;width:50%;">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>{{ session('error')}}
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
                <h3 class="card-title">About-us Detail</h3>
              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <form method="post" action="#">
                  @csrf
                  @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" readonly id="exampleInputName1" name="name" value="{{ old('name') ? old('name') : $about->title }}"  placeholder="Title">
                    <span class="text-danger">@error('name') {{ $message}}@enderror</span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Image</label>
                     <img src="{{ asset('images')}}/{{$about->image}}" alt="" style="height:80px;width:80px;">
                   </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror"  id="summernote" name="description" placeholder="Description">{{ old('description') ? old('description') : $about->description }}</textarea>
                    <span class="text-danger">@error('address') {{ $message}}@enderror</span>
                  </div>
                </div>
                <!-- /.card-body -->
                 <div class="card-footer">
                    <a href="{{ route('about.edit',['about'=>$about->id]) }}" class="btn btn-primary">Edit</a>
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