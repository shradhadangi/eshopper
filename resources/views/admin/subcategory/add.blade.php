@extends('layouts.master')
@section('title') {{ 'Add Sub-Category '}} @endsection
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
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add New Sub-Category</h3>
              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <form method="post" action="{{ route('subcategory.store') }}">
                  @csrf
                <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category</label>
                    <select name="cat_id" id=""  class="form-control" required>
                        <!-- <option value="">Select Category</option> -->
                        @foreach ($category as $cat)
                            <option value="{{$cat->id}}" {{ ($cat_id==$cat->id) ? 'selected' : ''}}>{{$cat->name}}</option>
                        @endforeach
                    </select>
                    <span class="text-danger">@error('cat_id') {{ $message}}@enderror</span>
                  </div>
                  </div>
                <div class="col-md-6">
                 <div class="form-group">
                    <label for="exampleInputEmail1">Sub-ategory Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName1" name="name" value="{{ old('name')}}"  placeholder="SubCategory Name">
                    <span class="text-danger">@error('name') {{ $message}}@enderror</span>
                  </div>
                </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="{{ route('category.index')}}" class="btn btn-danger ">Back</a>
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

           <!-- /.card -->
            <div class="card">
                <div class="card-header">

                  <h3 class="card-title">DataTable with default features</h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>S. No.</th>
                      <th>Category</th>
                      <th>Subcategory</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php $i=1;?>
                    <?php foreach ($subcategory as $v){ ?>

                          <tr>
                              <td>{{ $i++;}}</td>
                              <td>{{ ($category) ? $v->cat_name : ''}}</td>
                              <td>{{ $v->sub_cat_name }}</td>
                              <td style="display: flex;">
                              <a style="margin: 2px;float:left;" href="{{ route('subcategory.edit',['subcategory'=>$v->id])}}" class="btn btn-sm btn-info"> <i class="fa fa-edit"></i> </a>
                              <form method="post" action="{{ route('subcategory.destroy',['subcategory'=>$v->id])}}">
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
<!-- /.card -->
          </div>
          <!--/.col (left) -->
          <!-- right column -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

@endsection