@extends('front.layouts.master')
@section('content')
<section class="inner-content">
            <div class="title-block-outer">
                <img src="{{ asset('front/images/inner-banner.jpg') }}" alt="Banner-image" class="img-responsive">
                <div class="title-block-container">
                    <div class="container">
                        <h2>Contact Us</h2>
                    </div>
                </div>
            </div>
            <div class="breadcrumb-panel">
                <div class="container">
                    <ol class="breadcrumb">
                        <li><a href="index.html" title="Home">Home</a></li>
                        <li class="active">Contact Us</li>
                    </ol>
                </div>
            </div>
            <div class="content">
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
                        <div class="col-sm-9 contact-us">
                            <form class="form-block" method="post" action="{{ route('save_enquiry')}}">
                            @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Name</label>
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name')}}" placeholder="Please enter your name">
                                            <span class="text-danger">@error('name') {{ $message}}@enderror</span>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" old="{{ old('email')}}" placeholder="Please enter valid email">
                                            <span class="text-danger">@error('email') {{ $message}}@enderror</span>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Subject</label>
                                            <input type="text" name="subject" value="{{ old('subject')}}" class="form-control @error('subject') is-invalid @enderror" placeholder="Please enter subject">
                                            <span class="text-danger">@error('subject') {{ $message}}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label class="form-label">Message</label>
                                        <textarea class="form-control @error('message') is-invalid @enderror" name="message" placeholder="Your message here">{{ old('message')}}</textarea>
                                        <span class="text-danger">@error('message') {{ $message}}@enderror</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 form-group clearfix submit-outer">
                                        <button type="submit" class="btn-secondary">Submit</button>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="map-block">
                                    <?= $basic_detail->map?>
                                        <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3671.6949739620013!2d72.49824531551405!3d23.034969284946744!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e8352e403437b%3A0xdc9d4dae36889fb9!2sTatvaSoft!5e0!3m2!1sen!2sin!4v1482481146791" style="border:0" allowfullscreen></iframe> -->
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="contact-details">
                                        <h4>Get in touch</h4>
                                        <address class="clearfix">
                                            <span>{{ $basic_detail->address}}</span>
                                        </address>
                                        <p><span>Phone: </span> <em>{{ $basic_detail->phone}}</em></p>
                                        <p><span>Email:</span> <a href="mailto:{{ $basic_detail->email}}" title="{{ $basic_detail->email}}"><em>{{ $basic_detail->email}}</em></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="promo-block">
                                <a href="product" title="Promotion"><img src="{{ asset('front/images/promo1.jpg') }}" class="img-responsive" alt="promo1.jpg') }}"></a>
                            </div>
                            <div class="promo-block">
                                <a href="product" title="Promotion"><img src="{{ asset('front/images/promo2.jpg') }}" class="img-responsive" alt="promo1.jpg') }}"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

@endsection