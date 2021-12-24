@extends('layouts.master')
@section('title') {{ 'Category List '}} @endsection
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
          @if(session('error'))
                <div class="alert alert-danger alert-dismissible" style="margin:5px;width:50%;">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>{{ session('error')}}                </div>
               @endif
          @if(session('success'))
              <div class="alert alert-success alert-dismissible" style="width:70%;">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  {{ session('success')}}
                </div>
          @endif
           <!-- /.card -->
            <div class="card">

              <div class="card-header">

                <h3 class="card-title">DataTable with default features</h3>

                <a href="{{ route('category.create')}}" class="btn btn-sm btn-info" style="float: right;">
                <i class="fa fa-plus"></i> Add Category</a>
            </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S. No.</th>
                    <th>Name</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i=1;?>
                  @foreach ($category as $v)
                        <tr>
                            <td>{{ $i++;}}</td>
                            <td>{{$v->name}}</td>
                            <td style="display:flex;">
                            <a style="margin: 2px;float:left;" href="{{ route('subcategory.create',['id'=>$v->id])}}" class="btn btn-sm btn-primary">Subcategory</a>

                            <a style="margin: 2px;float:left;" href="{{ route('category.edit',['category'=>$v->id])}}" class="btn btn-sm btn-info"> <i class="fa fa-edit"></i> </a>
                            <form method="post" action="{{ route('category.destroy',['category'=>$v->id])}}">
                              @csrf
                              @method('DELETE')
                            <button style="margin: 2px; float:revert;" type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                  <tfoot>
                  <tr>
                    <th>S. No.</th>
                    <th>Name</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
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