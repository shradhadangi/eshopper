@extends('front.layouts.master')
@section('title'){{'Profile'}}@endsection
@section('content')
<div class="title-block-outer">
            <img src="{{ asset('front/images/inner-banner.jpg') }}" alt="Banner-image" class="img-responsive">
              <div class="title-block-container">
                <div class="container">
                    <h2>Update Profile</h2>
                </div>
            </div>
        </div>
        <div class="breadcrumb-panel">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="{{ route('site')}}" title="Home">Home</a></li>
                    <li class="active">Update Profile</li>
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
                    <a href="{{ route('change-password')}}" class ="btn btn-sm btn-info pull-right">Change Password</a>
                    <a href="{{ route('my-orders')}}" class ="btn btn-sm btn-info pull-right">My Orders</a>
                    <div class="col-sm-12 register profile">
                        <form class="form-block" action="{{ route('update-profile')}}" method="post">
                        @csrf
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="form-label">Username</label>
                                    <input type="text" name="username" class="form-control" value="{{ $customer->username}}" placeholder="Please enter your username"/>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email"  value="{{ $customer->email}}" placeholder="Please enter valid email">
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group gender-list">
                                        <label class="form-label">Gender</label>
                                        <div class="filter-option">
                                            <div class="filter-option-inner">
                                                <ul>
                                                    <li class="custom-check">
                                                        <label> <input type="radio" class="icheck" name="gender" value="Male" {{ ($customer->gender=='Male') ? 'checked' : ''}}  />Male</label>
                                                    </li>
                                                    <li class="custom-check">
                                                        <label><input type="radio" class="icheck" name="gender" value="Female" {{ ($customer->gender=='Female') ? 'checked' : ''}} />Female</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="row"> -->
                                <!-- <div class="col-sm-6">
                                    <div class="form-group validation-error">
                                        <label class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Please enter your Password" value="" data-placeholder="Enter your Password">
                                    </div>
                                </div> -->
                              <!-- </div> -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">First Name</label>
                                        <input type="text" name="first_name" class="form-control" value="{{ $customer->first_name}}" placeholder="Please enter your first name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Mobile No.</label>
                                        <input type="text" name="mobile" class="form-control" value="{{ $customer->mobile}}" placeholder="Please enter your mobile no.">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" name="last_name" class="form-control" value="{{ $customer->last_name}}" placeholder="Please enter your last name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Phone</label>
                                        <input type="text" name="phone" class="form-control" value="{{ $customer->phone}}" placeholder="Please enter your phone">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Interests</label>
                                        <div class="filter-option">
                                            <div class="filter-option-inner">
                                              <ul>
                                                <li class="custom-check">
                                                    <label><input type="checkbox"  class="icheck">Select All</label>
                                                </li>
                                                <li class="custom-check">
                                                    <label><input type="checkbox" name="interests[]" {{ ($customer->interests=='Singing') ? 'checked' : ''}}  class="icheck" value="Singing"> Singing</label>
                                                </li>
                                                <li class="custom-check">
                                                  <label><input type="checkbox" name="interests[]" {{ ($customer->interests=='Dancing') ? 'checked' : ''}} class="icheck" value="Dancing" />Dancing</label>
                                              </li>
                                              <li class="custom-check">
                                                  <label><input type="checkbox" name="interests[]" {{ ($customer->interests=='Drwaing') ? 'checked' : ''}} value="Drawing" class="icheck">Drawing</label>
                                              </li>
                                              <li class="custom-check">
                                                  <label><input type="checkbox" class="icheck">Other</label>
                                                  <input type="text" name="interests[]" class="form-control"/>
                                              </li>
                                          </ul>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
<!--
                      <div class="row">
                          <div class="col-sm-6">
                              <div class="shipping-address-block">
                                  <div class="form-group">
                                      <a href="#!" class="btn-tertiary" data-toggle="collapse" data-target=".shipping-form">Edit Shipping Address</a>
                                  </div>

                                  <div class="shipping-form collapse">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Street</label>
                                                <input type="text" class="form-control" placeholder="Please enter your Street" name="address" value="{{ $customer->last_name }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">City</label>
                                                <input type="text" class="form-control" placeholder="Please enter your City" value="{{ $customer->last_name}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Country</label>
                                                <select class="form-control">
                                                    <option value="India" {{ ($customer->last_name=='India') ? 'selected' : ''}}>India</option>
                                                    <option value="United States">United States</option>
                                                    <option value="Australia">Australia</option>
                                                    <option value="China">China</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">State</label>
                                                <input type="text" class="form-control" placeholder="Please enter your state" value="{{ $customer->last_name}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="billing-address-block">
                              <div class="form-group">
                                  <a href="#!" class="btn-tertiary" data-toggle="collapse" data-target=".billing-form">Edit Billing Address</a>
                                  <label class="billing-label"><input type="checkbox" class="icheck">Same as Billing Address</label>
                              </div>
                              <div class="billing-form collapse">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Street</label>
                                            <input type="text" class="form-control" placeholder="Please enter your Street">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">City</label>
                                            <input type="text" class="form-control" placeholder="Please enter your City">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Country</label>
                                            <select class="form-control">
                                                <option value="option1">option1</option>
                                                <option value="option2">option2</option>
                                                <option value="option3">option3</option>
                                                <option value="option4">option4</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">State</label>
                                            <select class="form-control">
                                                <option value="option1">option1</option>
                                                <option value="option2">option2</option>
                                                <option value="option3">option3</option>
                                                <option value="option4">option4</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>

                <div class="bottom-group ">
                  <div class=" row">

                      <div class=" col-sm-12 text-right">
                        <div class="form-group clearfix submit-outer">
                            <button type="submit" class="btn-secondary">Update</button>
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