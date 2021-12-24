@extends('layouts.master')
@section('title') {{ 'Add Product Image'}} @endsection
@section('content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
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
        
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add New Product</h3>
              </div>
                <p>@foreach ($errors->all() as $error)
                        {{ $error }}<br/>
                    @endforeach</p>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ route('product-images.store') }}" enctype="multipart/form-data">
                  @csrf
                <div class="card-body row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product</label>
                     <input type="text" name="product" class="form-control" value="{{ ($product) ? $product->name : ''}}" readonly>
                  </div>
                  </div>
             
                  <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Image</label>
                     <input type="file" name="image" class="form-control">
                     <input type="hidden" name="product_id" class="form-control" value="{{ $product_id }}">
                     <span class="text-danger">@error('image') {{ $message}}@enderror</span>
                  </div>
                  </div>
             
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="{{ route('products.index')}}" class="btn btn-danger ">Back</a>
                  <br>
                  @if(session('error'))
                    <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h5><i class="icon fas fa-ban"></i> Error!</h5>{{ session('error')}}
                    </div>
               @endif
               </div>
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
                    <th>Product</th>
                      <th>Image</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php $i=1;?>
                    <?php foreach ($values as $v){ ?>

                          <tr>
                              <td>{{ $i++;}}</td>
                              <td>{{ ($product) ? $product->name : ''}}</td>
                              <td><img src="{{ asset('images')}}/{{$v->image}}" width="70px" alt=""></td>
                              <td style="display: flex;">
                              <a style="margin: 2px;float:left;" href="{{ route('product-images.edit',['product_image'=>$v->id])}}" class="btn btn-sm btn-info"> <i class="fa fa-edit"></i> </a>
                              <form method="post" action="{{ route('product-images.destroy',['product_image'=>$v->id])}}">
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