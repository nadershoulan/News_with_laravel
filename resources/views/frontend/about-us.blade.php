@extends('frontend.include.blog_main')

@section('title')
        {{__('about us')}}
@endsection

@section('home')


    <!-- Breadcumb Area Start -->
    <div class="breadcumb-area section_padding_50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breacumb-content d-flex align-items-center justify-content-between">
                        <h3 class="font-pt mb-0">About Us</h3>
                        {{-- <p class="editorial-post-date text-dark mb-0">28 November 2017</p> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcumb Area End -->

    <section class="gazette-about-us-area section_padding_100_70">
        <div class="about-us-content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="font-pt mb-30">{{get_static_option('Story')}}</h3>
                    </div>
                    <div class="col-12 col-md-6">
                        <p> {{get_static_option('about_me')}} </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="team-area mt-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="font-pt mb-50">Our Team</h3>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="single-team-area">
                            <img src="{{asset('img/bg-img/t1.jpg')}}" alt="">
                            <div class="team-member-data">
                                <h4 class="font-pt">Jane Doe</h4>
                                <div class="team-member-designation-social-info d-flex align-items-cente justify-content-between">
                                    <h5 class="font-pt mb-0">Editor</h5>
                                    <div class="social-info">
                                        <a href="#"><i class="fa fa-pinterest"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="single-team-area">
                            <img src="{{asset('img/bg-img/t2.jpg')}}" alt="">
                            <div class="team-member-data">
                                <h4 class="font-pt">Jane Doe</h4>
                                <div class="team-member-designation-social-info d-flex align-items-cente justify-content-between">
                                    <h5 class="font-pt mb-0">Editor</h5>
                                    <div class="social-info">
                                        <a href="#"><i class="fa fa-pinterest"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="single-team-area">
                            <img src="img/bg-img/t3.jpg" alt="">
                            <div class="team-member-data">
                                <h4 class="font-pt">Jane Doe</h4>
                                <div class="team-member-designation-social-info d-flex align-items-cente justify-content-between">
                                    <h5 class="font-pt mb-0">Editor</h5>
                                    <div class="social-info">
                                        <a href="#"><i class="fa fa-pinterest"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="single-team-area">
                            <img src="img/bg-img/t4.jpg" alt="">
                            <div class="team-member-data">
                                <h4 class="font-pt">Jane Doe</h4>
                                <div class="team-member-designation-social-info d-flex align-items-cente justify-content-between">
                                    <h5 class="font-pt mb-0">Editor</h5>
                                    <div class="social-info">
                                        <a href="#"><i class="fa fa-pinterest"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </section>

    {{-- <section class="gazette-cta-area bg-img background-overlay section_padding_100" style="background-image: url(img/blog-img/cta.jpg);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <div class="cta-content text-center">
                        <h2 class="font-pt">Join Our Team</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis porttitor, elit vel pellentesque faucibus, massa ligula rutrum erat, id aliquam orci urna in ante.</p>
                        <a href="/contact" class="btn gazette-btn font-pt">Contact Us <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

@endsection
