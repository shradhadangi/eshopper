@extends('front.layouts.master')
@section('title'){{'Change Password'}}@endsection
@section('content')
<div class="title-block-outer">
            <img src="{{ asset('front/images/inner-banner.jpg') }}" alt="Banner-image" class="img-responsive">
              <div class="title-block-container">
                <div class="container">
                    <h2>Change Pasword</h2>
                </div>
            </div>
        </div>
        <div class="breadcrumb-panel">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="{{ route('site')}}" title="Home">Home</a></li>
                    <li class="active">Change Password</li>
                </ol>
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
                    <a href="{{ route('my-orders')}}" class="btn btn-sm btn-info pull-right">My Orders</a>
                    <div class="col-sm-9 register profile">
                        <form class="form-block" action="{{ route('update-password')}}" method="post">
                        @csrf
                            <div class="row">
                                 <div class="col-sm-6">
                                    <div class="form-group validation-error">
                                        <label class="form-label">Password</label>
                                        <input type="password" id="get_password" name="password" class="form-control" placeholder="Please enter your Password" value="" data-placeholder="Enter your Password">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group validation-error">
                                        <label class="form-label">Confirm Password</label>
                                        <input type="password" name="confirm_password" class="form-control" onkeyup="match_password(this.value)" placeholder="Please confirm your password" value="" data-placeholder="Enter your Password">
                                        <span id="p_show" style="color:red;display:none"><sup>*</sup>Password mismatch</span>
                                    </div>
                                </div>
                              </div>
                      </div>
                </div>
                <div class="bottom-group ">
                  <div class=" row">
                      <div class=" col-sm-9 text-right">
                        <div class="form-group clearfix submit-outer">
                            <button type="submit" id="update-password" disabled class="btn-secondary">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>
</div>
</section>
@endsection