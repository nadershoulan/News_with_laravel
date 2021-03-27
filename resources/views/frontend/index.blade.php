@extends('frontend.include.blog_main')

@section('title')
     {{__('HOME')}}
@endsection
@section('home')


<!-- Welcome Blog Slide Area Start -->
    <section class="welcome-blog-post-slide owl-carousel">

        @foreach ($blog as $item )
            {{-- @if ($loop->first ) --}}
            @if ($loop->iteration<4)
            @foreach ( $all_blog_category as $b )
            {{-- @if ($loop->first ) --}}
            @if ($loop->iteration<4)
        <!-- Single Blog Post -->
        <div class="single-blog-post-slide bg-img background-overlay-5" style="background-image: url({{asset('img/bg-img/2.jpg')}});">
            <!-- Single Blog Post Content -->
            <div class="single-blog-post-content">
                <div class="tags">
                    <a href="{{route('about')}}">{{$b->name}}</a>
                </div>
                <h3><a href="{{route('about')}}" class="font-pt">{{ Str::limit($item->title, 20, '...') }}</a></h3>
                <div class="date">
                    <a href="{{route('about')}}">{{$item->updated_at}}</a>
                </div>
            </div>
        </div>
        @endif
        @endforeach
        @endif
        @endforeach
    </section>
    <!-- Welcome Blog Slide Area End -->

    <!-- Latest News Marquee Area Start -->
    <div class="latest-news-marquee-area">
        <div class="simple-marquee-container">
            <div class="marquee">
                <ul class="marquee-content-items">
                    @foreach ($all_breaking_news as $item )
                    {{-- @if ($loop->first ) --}}
                    @if ($loop->iteration<4)
                    <li>
                        <a href="#"><span class="latest-news-time">{{ Str::limit($item->updated_at, 10, '')}}</span>{{ Str::limit($item->title, 30, '...') }}</a>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <!-- Latest News Marquee Area End -->

    <!-- Main Content Area Start -->
    <section class="main-content-wrapper section_padding_100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-9">
                    <!-- Gazette Welcome Post -->
                    <div class="gazette-welcome-post">
                        @foreach ($blog as $item )
                        @if ($loop->first )
                        @foreach ( $all_blog_category as $b )
                        @if ($loop->first )
                        <!-- Post Tag -->
                        <div class="gazette-post-tag">
                            <a href="#">{{$b->name}}</a>
                        </div>
                        <h2 class="font-pt">{{ Str::limit($item->title, 30, '...') }}</h2>
                        <p class="gazette-post-date">{{ Str::limit($item->updated_at, 10, '')}}</p>
                        <!-- Post Thumbnail -->
                        <div class="blog-post-thumbnail my-5">
                            <img src="{{asset('img/blog-img/1.jpg')}}" alt="post-thumb">
                        </div>
                        <!-- Post Excerpt -->
                        <p>{!! Str::limit($item->content, 300, '...') !!} </p>
                        <!-- Reading More -->
                        <div class="post-continue-reading-share d-sm-flex align-items-center justify-content-between mt-30">
                            <div class="post-continue-btn">
                                <a href="#" class="font-pt">{{get_static_option('Continue')}} <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                            </div>
                            <div class="post-share-btn-group">
                                <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    @php
                    $counter = 0;
                    @endphp
                        @endif
                        @endforeach
                        @endif
                        @endforeach
                    <div class="gazette-todays-post section_padding_100_50">
                        @foreach ($blog as $item )
                        @if ($loop->first )
                        @foreach ( $all_blog_category as $b )
                        @if ($loop->first )
                        @foreach ( $all_comment as $comment )
                        @if ($loop->first )
                        {{-- @if ($comment->blod_detail_id > $comment->blod_detail_id+1 ) --}}
                        <div class="gazette-heading">
                            <h4>{{get_static_option('popular')}}</h4>
                        </div>
                        <!-- Single Today Post -->
                        <div class="gazette-single-todays-post d-md-flex align-items-start mb-50">
                            <div class="todays-post-thumb">
                                <img src="{{asset('img/blog-img/2.jpg')}}" alt="">
                            </div>
                            <div class="todays-post-content">
                                <!-- Post Tag -->
                                <div class="gazette-post-tag">
                                    <a href="#">{{$b->name}}</a>
                                </div>
                                <h3><a href="#" class="font-pt mb-2">{{ Str::limit($item->title, 30, '...') }}</a></h3>
                                <span class="gazette-post-date mb-2">{{ Str::limit($item->updated_at, 10, '')}}</span>
                                @foreach ( $all_comment as $comment )
                                @if ($comment->blod_detail_id == $item->id )
                               @php
                                $counter++;
                                @endphp
                                @endif
                                @endforeach
                                <a href="#" class="post-total-comments">{{$counter}} Comments</a>
                                <p>{!! Str::limit($item->content, 200, '...') !!}</p>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        @endif
                        @endforeach
                        @endif
                        @endforeach

                    </div>
                </div>

                <div class="col-12 col-lg-3 col-md-6">
                    <div class="sidebar-area">
                        <!-- Breaking News Widget -->
                        <div class="breaking-news-widget">
                            <div class="widget-title">
                                <h5>breaking news</h5>
                            </div>
                            @foreach ($blog as $item )
                            @if ($loop->first )
                            @foreach ( $all_blog_category as $b )
                            @if (  $b->name == "BREAKING NEWS"  )
                            <!-- Single Breaking News Widget -->
                            <div class="single-breaking-news-widget">
                                <img src="{{asset('img/blog-img/bn-1.jpg')}}" alt="">
                                <div class="breakingnews-title">
                                    <p>{{$b->name}}</p>
                                </div>
                                <div class="breaking-news-heading gradient-background-overlay">
                                    <h5 class="font-pt">{{ Str::limit($item->title, 30, '...') }}</h5>
                                </div>
                            </div>
                            @endif
                            @endforeach
                            @endif
                            @endforeach
                        </div>

                        <!-- Don't Miss Widget -->
                        {{-- <div class="donnot-miss-widget">
                            <div class="widget-title">
                                <h5>Don't miss</h5>
                            </div>
                            <!-- Single Don't Miss Post -->
                            <div class="single-dont-miss-post d-flex mb-30">
                                <div class="dont-miss-post-thumb">
                                    <img src="{{asset('img/blog-img/dm-1.jpg')}}" alt="">
                                </div>
                                <div class="dont-miss-post-content">
                                    <a href="#" class="font-pt">EU council reunites</a>
                                    <span>Nov 29, 2017</span>
                                </div>
                            </div>
                        </div> --}}
                        <!-- Advert Widget -->
                        <div class="advert-widget">
                            <div class="widget-title">
                                <h5>Advert</h5>
                            </div>
                            <div class="advert-thumb mb-30">
                                <a href="{{get_static_option('ads2_link')}}"><img src="{{asset('img/bg-img/add.png')}}" alt=""></a>
                            </div>
                        </div>

                        <!-- Subscribe Widget -->
                        <div class="subscribe-widget">
                            <div class="widget-title">
                                <h5>subscribe</h5>
                            </div>
                            @if(session()->has('msg'))
                            <div class="alert alert-{{session('type')}} text-center">
                                {{session('msg')}}
                            </div>
                            @endif
                            <div class="subscribe-form">
                                <form action="/" method="post">
                                    @csrf
                                    <input type="email" name="email_address" id="subs_email" placeholder="Your Email">
                                    <button type="submit">subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Content Area End -->

        <!-- Catagory Posts Area Start -->
        <div class="gazette-catagory-posts-area">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <!-- Single Catagory Post -->
                        @foreach ($blog as $item )
                        @if ($loop->first )
                        @foreach ( $all_blog_category as $b )
                        @if ( $b->name == "VIDEO" )
                        <!-- Single Breaking News Widget -->
                        <div class="gazette-single-catagory-post">
                            <div class="single-catagory-post-thumb mb-15">
                                <img src="{{asset('img/blog-img/12.jpg')}}" alt="">
                            </div>
                            <!-- Post Tag -->
                            <div class="gazette-post-tag">
                                <a href="#">{{$b->name}}</a>
                            </div>
                            <h5><a href="#" class="font-pt">{{ Str::limit($item->title, 30, '...') }}</a></h5>
                            <span>{{ Str::limit($item->updated_at, 10, '')}}</span>
                        </div>
                        @endif
                        @endforeach
                        @endif
                        @endforeach
                        <!-- Single Catagory Post -->
                        {{-- <div class="gazette-single-catagory-post">
                            <h5><a href="#" class="font-pt">Protest to be anounced in January</a></h5>
                            <span>Nov 29, 2017</span>
                        </div> --}}
                        <!-- Single Catagory Post -->
                        {{-- <div class="gazette-single-catagory-post">
                            <h5><a href="#" class="font-pt">10 Bills that the Congress in voting</a></h5>
                            <span>Nov 29, 2017</span>
                        </div> --}}
                        <!-- Single Catagory Post -->
                        {{-- <div class="gazette-single-catagory-post">
                            <h5><a href="#" class="font-pt">The narcissism of Donald Trump</a></h5>
                            <span>Nov 29, 2017</span>
                        </div> --}}
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <!-- Single Catagory Post -->
                                <div class="gazette-single-catagory-post">
                                    @foreach ($blog as $item )
                                    @if ($loop->first )
                                    @foreach ( $all_blog_category as $b )
                                    @if ( $b->name == "OTHERS" )
                                    <div class="single-catagory-post-thumb mb-15">
                                        <img src="{{asset('img/blog-img/14.jpg')}}" alt="">
                                    </div>
                                    <!-- Post Tag -->
                                    <div class="gazette-post-tag">
                                        <a href="#">{{$b->name}}</a>
                                    </div>
                                    <h5><a href="#" class="font-pt">{{ Str::limit($item->title, 30, '...') }}</a></h5>
                                    <span>{{ Str::limit($item->updated_at, 10, '')}}</span>
                                    @endif
                                    @endforeach
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <!-- Single Catagory Post -->
                                <div class="gazette-single-catagory-post">
                                    @foreach ($blog as $item )
                                    @if ($loop->first )
                                    @foreach ( $all_blog_category as $b )
                                    @if ( $b->name == "INTERVIEW" )
                                    <div class="single-catagory-post-thumb mb-15">
                                        <img src="{{asset('img/blog-img/15.jpg')}}" alt="">
                                    </div>
                                    <!-- Post Tag -->
                                    <div class="gazette-post-tag">
                                        <a href="#">{{$b->name}}</a>
                                    </div>
                                    <h5><a href="#" class="font-pt">{{ Str::limit($item->title, 30, '...') }}</a></h5>
                                    <span>{{ Str::limit($item->updated_at, 10, '')}}</span>
                                    @endif
                                    @endforeach
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <!-- Single Catagory Post -->
                                <div class="gazette-single-catagory-post">
                                    <div class="single-catagory-post-thumb mb-15">
                                    @foreach ($blog as $item )
                                    @if ($loop->first )
                                    @foreach ( $all_blog_category as $b )
                                    @if ( $b->name == "Politicos" )
                                        <img src="{{asset('img/blog-img/16.jpg')}}" alt="">
                                    </div>
                                    <!-- Post Tag -->
                                    <div class="gazette-post-tag">
                                        <a href="#">{{$b->name}}</a>
                                    </div>
                                    <h5><a href="#" class="font-pt">{{ Str::limit($item->title, 30, '...') }}</a></h5>
                                    <span>{{ Str::limit($item->updated_at, 10, '')}}</span>
                                    @endif
                                    @endforeach
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <!-- Single Catagory Post -->
                                <div class="gazette-single-catagory-post">
                                    <div class="single-catagory-post-thumb mb-15">
                                    @foreach ($blog as $item )
                                    @if ($loop->first )
                                    @foreach ( $all_blog_category as $b )
                                    @if ( $b->name == "Politicos" )
                                        <img src="{{asset('img/blog-img/17.jpg')}}" alt="">
                                    </div>
                                    <!-- Post Tag -->
                                    <div class="gazette-post-tag">
                                        <a href="#">{{$b->name}}</a>
                                    </div>
                                    <h5><a href="#" class="font-pt">{{ Str::limit($item->title, 30, '...') }}</a></h5>
                                    <span>{{ Str::limit($item->updated_at, 10, '')}}</span>
                                    @endif
                                    @endforeach
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <!-- Single Catagory Post -->
                        <div class="gazette-single-catagory-post">
                            <div class="single-catagory-post-thumb mb-15">
                                @foreach ($blog as $item )
                                @if ($loop->first )
                                @foreach ( $all_blog_category as $b )
                                @if ( $b->name == "Live" )
                                <img src="{{asset('img/blog-img/13.jpg')}}" alt="">
                            </div>
                            <!-- Post Tag -->
                            <div class="gazette-post-tag">
                                <a href="#">{{$b->name}}</a>
                            </div>
                            <h5><a href="#" class="font-pt">{{ Str::limit($item->title, 30, '...') }}</a></h5>
                            <span>{{ Str::limit($item->updated_at, 10, '')}}</span>
                            @endif
                            @endforeach
                            @endif
                            @endforeach
                        </div>
                        <!-- Single Catagory Post -->
                        {{-- <div class="gazette-single-catagory-post">
                            <h5><a href="#" class="font-pt">Blair can't save Britain from Brexit</a></h5>
                            <span>Nov 29, 2017</span>
                        </div>
                        <!-- Single Catagory Post -->
                        <div class="gazette-single-catagory-post">
                            <h5><a href="#" class="font-pt">Save the eniroment with this step</a></h5>
                            <span>Nov 29, 2017</span>
                        </div>
                        <!-- Single Catagory Post -->
                        <div class="gazette-single-catagory-post">
                            <h5><a href="#" class="font-pt">Protest to be anounced in January</a></h5>
                            <span>Nov 29, 2017</span>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Catagory Posts Area End -->

    <!-- Video Posts Area Start -->
    <section class="gazatte-video-post-area section_padding_100_70 bg-gray">
        <div class="container">
            <div class="row">
                @foreach ($all_youtube_link as $item )
                <!-- Single Video Post Start -->
                <div class="col-12 col-md-3">
                    <div class="single-video-post">
                        <div class="video-post-thumb">
                            <img src="{{asset('img/blog-img/4.jpg')}}" alt="">
                            <a href="{{$item->link}}" class="videobtn"><i class="fa fa-play" aria-hidden="true"></i></a>
                        </div>
                        <h5><a href="{{$item->link_to}}">{{ Str::limit($item->title, 40, '...') }}</a></h5>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Video Posts Area End -->

    <!-- Editorial Area Start -->
    <section class="gazatte-editorial-area section_padding_100 bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="editorial-post-slides owl-carousel">
                        @foreach ($blog as $item )
                        @if ($loop->first )
                        @foreach ( $all_blog_category as $b )
                        @if ( $b->name == "Editorial" || $b->name == "VIDEO" || $b->name == "OTHERS" )
                        <!-- Editorial Post Single Slide -->
                        <div class="editorial-post-single-slide">
                            <div class="row">
                                <div class="col-12 col-md-5">
                                    <div class="editorial-post-thumb">
                                        <img src="{{asset('img/blog-img/bitcoin.jpg')}}" alt="">
                                    </div>
                                </div>
                                <div class="col-12 col-md-7">
                                    <div class="editorial-post-content">
                                        <!-- Post Tag -->
                                        <div class="gazette-post-tag">
                                            <a href="#">{{$b->name}}</a>
                                        </div>
                                        <h2><a href="#" class="font-pt mb-15">{{ Str::limit($item->title, 30, '...') }}</a></h2>
                                        <p class="editorial-post-date mb-15">{{ Str::limit($item->updated_at, 10, '')}}</p>
                                        <p>{{ Str::limit($item->content, 300, '...') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Editorial Area End -->
@endsection
