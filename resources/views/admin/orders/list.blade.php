@extends('layouts.master')
@section('title') {{ 'Order List '}} @endsection
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
               </div>
              <!-- /.card-header -->
               <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S. No.</th>
                    <th>Name</th>
                    <th>Order Number</th>
                    <th>Address</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i=1;?>
                        @foreach ($orders as $v)
                        <tr>
                            <td>{{ $i++;}}</td>
                            <td>{{$v->first_name}} {{$v->last_name}}</td>
                            <td>{{$v->order_number}}</td>
                            <td>{{$v->address}}</td>
                            <td>${{$v->grand_total}}</td>
                            <td><span class="badge badge-primary">{{$v->ord_status}}</span></td>
                            <td style="display: flex;">
                            <a href="{{ route('order.show',['order'=>$v->ord_id])}}" style="margin: 2px;float:left;" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                            <form method="post" action="{{ route('order.destroy',['order'=>$v->ord_id])}}">
                              @csrf
                              @method('DELETE')
                               <button style="margin: 2px; float:revert;" onclick="confirm('Are you sure?')" type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
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