@extends('layouts.master')
@section('title') {{ 'Order Detail'}} @endsection
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
                <h3 class="card-title">Order Detail</h3>
              </div>
              <!-- /.card-header -->

              <!-- form start -->
                <div class="card-body row">
                  <div class="col-md-3">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Customer Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"  id="exampleInputName1" name="name" value="{{ $order->first_name }} {{ $order->last_name }}"  readonly placeholder=" Name">
                        <span class="text-danger">@error('name') {{ $message}}@enderror</span>
                      </div>
                  </div>
                  <div class="col-md-3">

                  <div class="form-group">
                    <label for="exampleInputEmail1">Mobile Number</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror"  id="exampleInputName1" name="phone" value="{{  $order->mobile }} | {{ $order->phone}}"  readonly placeholder=" Number">
                    <span class="text-danger">@error('name') {{ $message}}@enderror</span>
                  </div>
                  </div>
                  <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror"  id="exampleInputName1" name="email" value="{{ old('email') ? old('email') : $order->email }}"  readonly placeholder="Email ID">
                    <span class="text-danger">@error('email') {{ $message}}@enderror</span>
                  </div>
                  </div>
                  <div class="col-md-3">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Gender</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror"  id="exampleInputName1" name="phone" value="{{ old('phone') ? old('phone') : $order->gender }}"  readonly placeholder="Phone Number">
                      </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                    <label for="exampleInputEmail1">Order Number</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"  id="exampleInputName1" name="name" value="{{  $order->order_number }}"  readonly placeholder=" Name">
                  </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                    <label for="exampleInputEmail1">Grand Total</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"  id="exampleInputName1" name="name" value="${{  $order->grand_total }}"  readonly placeholder=" Name">
                  </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"  id="exampleInputName1" name="name" value="{{  $order->address }} {{  $order->state }} {{  $order->country }} {{  $order->zipcode }}"  readonly placeholder=" Name">
                  </div>
                  </div>
                  </div>
                  <hr>
                  <form method="post" action="{{ route('order.update',['order'=>$order->ord_id]) }}" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      <div class="card-body row">
                      <div class="form-group col-md-4" >
                        <label for="exampleInputEmail1">Status</label>
                        <select name="status" required id="status" class="form-control @error('status') is-invalid @enderror">
                           <option value="Pending" <?= ($order->ord_status=='Pending') ? 'selected' : ''?>>Pending</option>
                           <option value="Delivered" <?= ($order->ord_status=='Delivered') ? 'selected' : ''?>>Delivered</option>
                           <option value="Undelivered" <?= ($order->ord_status=='Undelivered') ? 'selected' : ''?>>Undelivered</option>
                           <option value="Cancelled" <?= ($order->ord_status=='Cancelled') ? 'selected' : ''?>>Cancelled</option>
                        </select>
                        <span class="text-danger">@error('status') {{ $message}}@enderror</span>
                       </div>
                          <div class="form-group col-md-8">
                          <label for="exampleInputEmail1">Remark</label>
                          <input type="text" class="form-control @error('remark') is-invalid @enderror"   name="remark" value="{{  $order->remark }}"   placeholder=" Remark">
                        </div>
                      </div>
                      <div class="card-footer">
                      @if($order->ord_status != 'Delivered' && $order->ord_status !='Cancelled')
                        <button type="submit" class="btn btn-primary">Submit</button>
                      @endif
                        <a href="{{ route('order.index')}}" class="btn btn-danger ">Back</a>
                      </div>
                  </form>

                <!-- /.card-body -->
               </div>
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
                    <th>Product Name</th>
                    <th>Size</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Total</th>
                    <!-- <th>Action</th> -->
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i=1;?>
                        @foreach ($order_details as $val)
                        <tr>
                            <td>{{ $i++;}}</td>
                            <td>{{ $val->product_name }}</td>
                            <td>{{ $val->size }}</td>
                            <td>${{ $val->price }}</td>
                            <td>{{ $val->qty }}</td>
                            <td>${{ $val->total }}</td>
                            <!-- <td style="display: flex;">
                            <form method="post" action="{{ route('order.destroy',['order'=>$val->id])}}">
                              @csrf
                              @method('DELETE')
                               <button style="margin: 2px; float:revert;" type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                            </td> -->
                        </tr>
                    @endforeach
                    </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

          </div>
          <!--/.col (left) -->
          <!-- right column -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

@endsection