@extends('layouts.master')
@section('title') {{ 'Enquiry List '}} @endsection
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
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
               </div>
               <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th>S. No.</th>
                          <th>Email</th>
                          <th>Date-Time</th>
                          <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i=1;?>
                        @foreach ($enquiries as $v)
                        <tr>
                            <td>{{ $i++;}}</td>
                            <td>{{ $v->email }}</td>
                            <td>{{ $v->created_at }}</td>
                            <td style="display: flex;">
                            <form method="post" action="{{ route('delete-newsletter',['id'=>$v->id])}}">
                              @csrf
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
</section>
@endsection