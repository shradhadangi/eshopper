@extends('front.layouts.master')
@section('title'){{'My Orders'}}@endsection
@section('content')
    <div class="title-block-outer hidden-print">
            <img src="{{ asset('front/images/inner-banner.jpg') }}" alt="Banner-image" class="img-responsive">
              <div class="title-block-container">
                <div class="container">
                    <h2>Orders List</h2>
                </div>
            </div>
        </div>
        <div class="breadcrumb-panel hidden-print">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="{{ route('site')}}" title="Home">Home</a></li>
                    <li class="active"> <a href="{{ route('profile')}}">Profile</a></li>
                    <li class="active">Order Detail {{  $order->order_number }}</li>
                </ol>
        <a href="{{ route('my-orders')}}" class ="btn btn-sm btn-info pull-right">My Orders</a>
            </div>
        </div>
        <section class="content">

            <div class="container">
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
                  <hr>
                  </div>
                  <form method="post">
                    @csrf
                  <div class="row">
                   <div class="col-sm-12 register profile">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>S. No. </th>
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
                                    <td>{{ $i++;}} <input type="checkbox" name="item[]" value="{{ $val->id }}"></td>
                                    <td><a target="_blank" href="{{ route('product-detail',['product_id'=>$val->product_id])}}">{{ $val->product_name }}</a></td>
                                    <td>{{ $val->size }}</td>
                                    <td>${{ $val->price }}</td>
                                    <td>{{ $val->qty }}</td>
                                    <td>${{ $val->total }}</td>
                                  </tr>
                                @endforeach
                        </tbody>
                    </table>
                    <a href="javascript:void(0)" class ="btn btn-sm btn-info hidden-print" onclick="print()">Print Order</a>
                    @if ($order->status=='Pending')
                      <button type="submit" formaction="{{ route('cancel-order')}}" class ="btn btn-sm btn-danger hidden-print" >Cancel Order</button>
                      <input type="hidden" name="order_id" value="{{ $order->id}}">
                    @endif

                  </div>
               </div>
               </form>
            </div>
        </section>
    @endsection