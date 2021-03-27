
@extends('frontend.include.blog_main')

@section('title')
    {{__('Contect')}}
@endsection


@section('home')



    <!-- Breadcumb Area Start -->
    <div class="breadcumb-area section_padding_50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breacumb-content d-flex align-items-center justify-content-between">
                        <h3 class="font-pt mb-0">{{get_static_option('contact')}}</h3>
                        {{-- <p class="editorial-post-date text-dark mb-0">28 November 2017</p> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcumb Area End -->

    <section class="gazette-contact-area section_padding_100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="gazette-heading">
                        <h4 class="font-bold">{{get_static_option('address')}}</h4>
                    </div>
                    @if(session()->has('msg'))
                    <div class="alert alert-{{session('type')}} text-center">
                        {{session('msg')}}
                    </div>
                    @endif
                    <!-- Contact Form -->
                    <form action="/contact" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" id="contact-name" placeholder="Enter Your Full Name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" id="contact-email" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" id="message" cols="30" rows="10" placeholder="Message" required></textarea>
                        </div>
                        <button type="submit" class="btn contact-btn">SUBMIT <i class="fa fa-angle-right ml-2"></i></button>
                    </form>
                </div>
                <div class="col-12 col-md-4">
                    <div class="gazette-heading">
                        <h4 class="font-bold">{{get_static_option('address')}}</h4>
                    </div>
                    <div class="contact-address-info mb-50">
                        <p>{{get_static_option('City')}}</p>
                    </div>
                    <div class="gazette-heading">
                        <h4 class="font-bold">Phone</h4>
                    </div>
                    <div class="contact-address-info">
                        <p>{{get_static_option('phone')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="googleMap"></div>

   @endsection
