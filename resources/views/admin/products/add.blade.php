@extends('layouts.master')
@section('title') {{ 'Add Product '}} @endsection
@section('content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
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

            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add New Product</h3>
              </div>

              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
                  @csrf
                <div class="card-body row">
                    <div class="col-md-4">
                      <div class="form-group" >
                          <label for="exampleInputEmail1">Product Name</label>
                          <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName1" name="name" value="{{ old('name')}}"  placeholder="Product Name">
                          <span class="text-danger">@error('name') {{ $message}}@enderror</span>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Price</label>
                        <input type="number" min="0" class="form-control @error('price') is-invalid @enderror" name="price" id="exampleInputEmail1" value="{{ old('price')}}" placeholder="Enter Price">
                        <span class="text-danger">@error('price') {{ $message}}@enderror</span>
                     </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group" >
                          <label for="exampleInputEmail1">SKU</label>
                          <input type="text" class="form-control @error('sku_id') is-invalid @enderror" id="exampleInputName1" name="sku_id" value="{{ old('sku_id')}}"  placeholder="Product SKU">
                          <span class="text-danger">@error('sku_id') {{ $message}}@enderror</span>
                      </div>
                    </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Category</label>
                      <select name="category_id" id="category" class="form-control  @error('category_id') is-invalid @enderror" required>
                          <option value="">Select Category</option>
                          @foreach ($category as $cat)
                              <option value="{{$cat->id}}">{{$cat->name}}</option>
                          @endforeach
                      </select>
                      <span class="text-danger">@error('category_id') {{ $message}}@enderror</span>
                    </div>
                  </div>
                  <div class="col-md-4">
                  <div class="form-group" >
                    <label for="exampleInputEmail1">Sub-Category</label>
                    <select name="sub_cat_id" id="subcategory" class="form-control  @error('description') is-invalid @enderror" >
                        <option value="">Select Sub-Category</option>
                    </select>
                    <span class="text-danger">@error('sub_cat_id') {{ $message}}@enderror</span>
                  </div>
                  </div>
                  <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Image</label>
                     <input type="file" name="image" class="form-control">
                     <span class="text-danger">@error('image') {{ $message}}@enderror</span>
                  </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Short Description</label>
                        <textarea  class="form-control @error('short_description') is-invalid @enderror" name="short_description"  placeholder="Short Description here">{{ old('short_description')}}</textarea>
                        <span class="text-danger">@error('short_description') {{ $message}}@enderror</span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Delivery</label>
                        <textarea  class="form-control @error('delivery_detail') is-invalid @enderror" name="delivery_detail"  placeholder="Delivery detail here">{{ old('delivery_detail')}}</textarea>
                        <span class="text-danger">@error('delivery_detail') {{ $message}}@enderror</span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Shipping</label>
                        <textarea  class="form-control @error('shipping_detail') is-invalid @enderror" name="shipping_detail"  placeholder="Shipping detail here">{{ old('shipping_detail')}}</textarea>
                        <span class="text-danger">@error('shipping_detail') {{ $message}}@enderror</span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Size Guide</label>
                        <textarea  class="form-control @error('size_guide') is-invalid @enderror" name="size_guide"  placeholder="Size guide here">{{ old('size_guide')}}</textarea>
                        <span class="text-danger">@error('size_guide') {{ $message}}@enderror</span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>CMS</label>
                        <textarea  class="form-control @error('cms') is-invalid @enderror" name="cms"  placeholder="CMS here">{{ old('cms')}}</textarea>
                        <span class="text-danger">@error('cms') {{ $message}}@enderror</span>
                    </div>
                  </div>

                    <div class="col-md-6">
                    <div class="form-group">
                      <label>Size (S,M,XL)</label>
                      <select name="size[]" class="form-control" id="size" multiple>
                        <option value="">Select Size</option>
                        @foreach ($sizes as $size)
                         <option value="{{ $size->size}}">{{ $size->size}}</option>
                        @endforeach
                      </select>
                        <!-- <textarea  class="form-control @error('size') is-invalid @enderror" name="size"  placeholder="Enter Size with comma separated">{{ old('size')}}</textarea> -->
                        <span class="text-danger">@error('size') {{ $message}}@enderror</span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Colors</label>
                      <select name="colors[]" class="form-control" id="colors" multiple>
                        <option value="">Select Color</option>
                        @foreach ($colors as $color)
                         <option value="{{ $color->color}}">{{ $color->color}}</option>
                        @endforeach
                      </select>
                        <!-- <textarea  class="form-control @error('colors') is-invalid @enderror" name="colors"  placeholder="Enter Colour with comma separated">{{ old('colors')}}</textarea> -->
                        <span class="text-danger">@error('colors') {{ $message}}@enderror</span>
                    </div>
                  </div>
                       <div class="col-md-12">
                    <div class="form-group">
                      <label>Description</label>
                      <textarea id="summernote" class="form-control @error('description') is-invalid @enderror" name="description"   placeholder="Description here">{{ old('description')}}</textarea>
                      <span class="text-danger">@error('description') {{ $message}}@enderror</span>
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
      </div><!-- /.container-fluid -->
    </section>

@endsection