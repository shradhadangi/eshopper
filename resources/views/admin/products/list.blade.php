@extends('layouts.master')
@section('title') {{ 'Products List '}} @endsection
@section('content')
<style>
.pagination{
  margin-top: 20px;
}
</style>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
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
           <!-- /.card -->
            <div class="card">

              <div class="card-header">

                <h3 class="card-title">DataTable with default features</h3>

                <a href="{{ route('products.create')}}" class="btn btn-sm btn-info" style="float: right;">
                <i class="fa fa-plus"></i>Add Product </a>
            </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example11" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S. No.</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Sub-Category</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i=1;?>
                  @foreach ($products as $v)
                        <tr>
                            <td>{{ $i++;}}</td>
                            <td>{{$v->name}}</td>
                            <td>{{$v->price}}</td>
                            <td>{{$v->cat_name}}</td>
                            <td>{{$v->sub_cat_name}}</td>
                            <td><img src="{{ asset('images')}}/{{$v->image}}" width="70px" alt=""></td>
                            <td style="display: flex;">
                            <a style="margin: 2px;float:left;" href="{{ route('products.edit',['product'=>$v->id])}}" class="btn btn-sm btn-info"> <i class="fa fa-edit"></i> </a>
                            <form method="post" action="{{ route('products.destroy',['product'=>$v->id])}}">
                              @csrf
                              @method('DELETE')
                            <button style="margin: 2px; float:revert;"  type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                            <a style="margin: 2px;float:left;" href="{{ route('product-images.create',['id'=>$v->id])}}" class="btn btn-sm btn-info"> Images </a>
                            <a style="margin: 2px;float:left;" href="{{ route('product-reviews',['id'=>$v->id])}}" class="btn btn-sm btn-success"> Reviews </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $products->links() !!}
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>

@endsection