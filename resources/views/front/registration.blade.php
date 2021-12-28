  <!-- Content Start-->
@extends('front.layouts.master')
@section('title'){{'Registration Form'}}@endsection
  @section('content')
  <div class="title-block-outer">
            <img src="{{ asset('front/images/inner-banner.jpg') }}" alt="Banner-image" class="img-responsive">
            <div class="title-block-container">
                <div class="container">
                    <h2>Register</h2>
                </div>
            </div>
        </div>
        <div class="breadcrumb-panel">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="{{ route('site')}}" title="Home">Home</a></li>
                    <li class="active">Register</li>
                </ol>
            </div>
        </div>
        <section class="content register">
            <div class="container">
                <h2>New Customers</h2>
                <p>
                    By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.
                </p>
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
                    <div class="col-sm-12">
                        <form class="form-block" action="{{ route('save-customer')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Username</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Please enter yor username" value="{{ old('username')}}" name="username">
                                        <span class="text-danger">@error('username') {{ $message}}@enderror</span>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group gender-list">
                                        <label class="form-label">Gender</label>
                                        <div class="filter-option">
                                            <div class="filter-option-inner">
                                                <ul>
                                                    <li class="custom-check">
                                                        <label> <input type="radio" class="icheck" name="gender"> Male</label>
                                                    </li>
                                                    <li class="custom-check">
                                                        <label> <input type="radio" class="icheck" name="gender"> Female</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <span class="text-danger">@error('gender') {{ $message}}@enderror</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-sm-6">
                                 <div class="form-group validation-error">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Please enter your Password" value="{{ old('password')}}"  data-placeholder="Enter your Password">
                                    <span class="text-danger">@error('password') {{ $message}}@enderror</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email')}}" placeholder="Please enter valid email">
                                    <span class="text-danger">@error('email') {{ $message}}@enderror</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">First Name</label>
                                    <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" placeholder="Please enter yor first name" value="{{ old('first_name')}}">
                                    <span class="text-danger">@error('first_name') {{ $message}}@enderror</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Mobile No.</label>
                                    <input type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile')}}" minlength="10" maxlength="10" placeholder="Please enter yor mobile no.">
                                    <span class="text-danger">@error('mobile') {{ $message}}@enderror</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name')}}" name="last_name" placeholder="Please enter yor last name">
                                    <span class="text-danger">@error('last_name') {{ $message}}@enderror</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Phone</label>
                                    <input type="text" name="phone" value="{{ old('phone')}}" class="form-control @error('last_name') is-invalid @enderror" placeholder="Please enter yor phone">
                                    <span class="text-danger">@error('phone') {{ $message}}@enderror</span>
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
                                          <label> <input type="checkbox" class="icheck">Select All</label>
                                      </li>
                                      <li class="custom-check">
                                          <label> <input type="checkbox" name="interest[]" value="Singing" class="icheck"> Singing</label>
                                      </li>
                                      <li class="custom-check">
                                          <label> <input type="checkbox" name="interest[]" value="Dancing" class="icheck">Dancing </label>
                                      </li>
                                      <li class="custom-check">
                                          <label> <input type="checkbox" name="interest[]" value="Drawing" class="icheck"> Drawing</label>
                                      </li>
                                      <li class="custom-check">
                                          <label> <input type="checkbox" name="interest[]" class="icheck">Other</label>
                                          <input type="text" name="interest[]"  class="form-control">
                                      </li>

                                  </ul>

                              </div>
                          </div>
                      </div>
                  </div>

              </div>



              <div class="bottom-group ">
                  <div class=" row">
                      <div class="term-condition col-sm-6">
                          <div  class="checkbox">
                              <label class="chklbl"><input type="checkbox" name="terms">&nbsp;&nbsp;I Agree with <a href="#">Terms &amp; Conditions.</a></label>
                          </div>
                      </div>

                      <div class=" reg-submit col-sm-6 text-right">

                        <div class="form-group clearfix submit-outer">
                            <button type="submit" class="btn-secondary">Submit</button>
                            <button type="button" class="btn-tertiary">Clear</button>
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