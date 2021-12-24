@extends('layouts.master')
@section('title') {{ 'Edit Sub-Category '}} @endsection
@section('content')
<section class="content">
      <div class="container-fluid">
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
                <h3 class="card-title">Edit Sub-Category</h3>
              </div>
              <form method="post" action="{{ route('subcategory.update',['subcategory'=>$value->id]) }}">
                  @csrf
                  @method('PUT')

                <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category</label>
                    <select name="cat_id" id=""  class="form-control" required>
                        <option value="">Select Category</option>
                        @foreach ($category as $cat)
                            <option value="{{$cat->id}}" {{ ($value->category_id==$cat->id) ? 'selected' : ''}} >{{$cat->name}}</option>
                        @endforeach
                    </select>
                    <span class="text-danger">@error('cat_id') {{ $message}}@enderror</span>
                  </div>
                  </div>
                <div class="col-md-6">
                 <div class="form-group">
                    <label for="exampleInputEmail1">Sub-ategory Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName1" name="name" value="{{ old('name') ? old('name') : $value->name }}"  placeholder="SubCategory Name">
                    <span class="text-danger">@error('name') {{ $message}}@enderror</span>
                  </div>
                </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                  <a href="{{ route('subcategory.create',['id'=>$value->category_id])}}" class="btn btn-danger ">Back</a>
                  <br>
                  @if(session('error'))
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>{{ session('error')}}
                </div>
               @endif
               </div>
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