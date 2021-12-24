@extends('layouts.master')
@section('title') {{ 'Testimonal List '}} @endsection
@section('content')
<style>
.pagination{
  margin-top: 20px;
}
</style>
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
              <div class="alert alert-success alert-dismissible" style="width:70%;">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  {{ session('success')}}
                </div>
          @endif
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
                <a href="{{ route('testimonial.create')}}" class="btn btn-sm btn-info" style="float: right;">
                <i class="fa fa-plus"></i> Add Testimonial</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                        <th>S. No.</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Image</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php $i=1;?>
                  @foreach ($values as $v)
                        <tr>
                            <td>{{ $i++;}}</td>
                            <td>{{$v->name}}</td>
                            <td>{{$v->designation}}</td>
                            <td><img src="{{ asset('images')}}/{{$v->image}}" width="70px" alt=""></td>
                            <td style="display:flex;">
                            <a style="margin: 2px;float:left;" href="{{ route('testimonial.edit',['testimonial'=>$v->id])}}" class="btn btn-sm btn-info"> <i class="fa fa-edit"></i> </a>
                            <form method="post" action="{{ route('testimonial.destroy',['testimonial'=>$v->id])}}">
                              @csrf
                              @method('DELETE')
                            <button style="margin: 2px; float:revert;" type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
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