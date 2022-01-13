@extends('front.layouts.master')
@section('title'){{'My Orders'}}@endsection
@section('content')
<div class="title-block-outer">
            <img src="{{ asset('front/images/inner-banner.jpg') }}" alt="Banner-image" class="img-responsive">
              <div class="title-block-container">
                <div class="container">
                    <h2>Orders List</h2>
                </div>
            </div>
        </div>
        <div class="breadcrumb-panel">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="{{ route('site')}}" title="Home">Home</a></li>
                    <li class="active"> <a href="{{ route('profile')}}">Profile</a></li>
                    <li class="active">My Orders</li>
                </ol>
            </div>
        </div>
        <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 register profile">
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
                        @foreach ($order_data as $v)
                        <tr>
                            <td>{{ $i++;}}</td>
                            <td>{{session()->get('USER_NAME')}}</td>
                            <td>{{$v->order_number}}</td>
                            <td>{{$v->address}}</td>
                            <td>${{$v->grand_total}}</td>
                            <td><span class="badge badge-primary">{{$v->status}}</span></td>
                            <td><a href="{{ route('order-detail',['id'=>$v->id]) }}" class="btn btn-sm btn-info">View</a></td>
                         </tr>
                    @endforeach
                    </tbody>
                </table>

    </div>

</div>
</div>
</section>
@endsection