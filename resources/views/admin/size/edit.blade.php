  @extends('layouts.master')
@section('title') {{ 'Edit Size '}} @endsection
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
                <h3 class="card-title">Edit Size</h3>
              </div>
              <form method="post" action="{{ route('size.update',['size'=>$value->id]) }}" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="card-body row">
                   <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Size</label>
                     <input type="text" name="name" value="{{$value->size}}" class="form-control">
                     <span class="text-danger">@error('name') {{ $message}}@enderror</span>
                  </div>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                  <a href="{{ route('size.index')}}" class="btn btn-danger ">Back</a>
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