@extends('frontend.include.blog_main')

@section('title')
     {{__('catagory')}}
@endsection

@section('home')


    <!-- Breadcumb Area Start -->
    <div class="breadcumb-area section_padding_50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breacumb-content d-flex align-items-center justify-content-between">
                        <!-- Post Tag -->
                        <div class="gazette-post-tag">
                            <a href="#">politics</a>
                        </div>
                        <p class="editorial-post-date text-dark mb-0">March 29, 2016</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcumb Area End -->

    <!-- Editorial Area Start -->
    <section class="gazatte-editorial-area section_padding_100 bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="editorial-post-slides owl-carousel">

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
                                            <a href="#">Editorial</a>
                                        </div>
                                        <h2><a href="#" class="font-pt mb-15">Move over, bitcoin. <br>Here comes litecoin</a></h2>
                                        <p class="editorial-post-date mb-15">March 29, 2016</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ultrices egestas nunc, quis venenatis orci tincidunt id. Fusce commodo blandit eleifend. Nullam viverra tincidunt dolor, at pulvinar dui. Nullam at risus ut ipsum viverra posuere. Aliquam quis convallis enim. Nunc pulvinar molestie sem id blandit. Nunc venenatis interdum mollis...</p>
                                    </div>
                                </div>
                            </div>
                        </div>

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
                                            <a href="#">Editorial</a>
                                        </div>
                                        <h2><a href="#" class="font-pt mb-15">Move over, bitcoin. <br>Here comes litecoin</a></h2>
                                        <p class="editorial-post-date mb-15">March 29, 2016</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ultrices egestas nunc, quis venenatis orci tincidunt id. Fusce commodo blandit eleifend. Nullam viverra tincidunt dolor, at pulvinar dui. Nullam at risus ut ipsum viverra posuere. Aliquam quis convallis enim. Nunc pulvinar molestie sem id blandit. Nunc venenatis interdum mollis...</p>
                                    </div>
                                </div>
                            </div>
                        </div>

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
                                            <a href="#">Editorial</a>
                                        </div>
                                        <h2><a href="#" class="font-pt mb-15">Move over, bitcoin. <br>Here comes litecoin</a></h2>
                                        <p class="editorial-post-date mb-15">March 29, 2016</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ultrices egestas nunc, quis venenatis orci tincidunt id. Fusce commodo blandit eleifend. Nullam viverra tincidunt dolor, at pulvinar dui. Nullam at risus ut ipsum viverra posuere. Aliquam quis convallis enim. Nunc pulvinar molestie sem id blandit. Nunc venenatis interdum mollis...</p>
                                    </div>
                                </div>
                            </div>
                        </div>

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
                                            <a href="#">Editorial</a>
                                        </div>
                                        <h2><a href="#" class="font-pt mb-15">Move over, bitcoin. <br>Here comes litecoin</a></h2>
                                        <p class="editorial-post-date mb-15">March 29, 2016</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ultrices egestas nunc, quis venenatis orci tincidunt id. Fusce commodo blandit eleifend. Nullam viverra tincidunt dolor, at pulvinar dui. Nullam at risus ut ipsum viverra posuere. Aliquam quis convallis enim. Nunc pulvinar molestie sem id blandit. Nunc venenatis interdum mollis...</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Editorial Area End -->

    <section class="catagory-welcome-post-area section_padding_100">
        <div class="container">
            <div class="row">
                @foreach ($blog as $item)
                @foreach ( $all_blog_category as $b )
                @if ($loop->iteration <3 && $b->name =="Politicos" )
                <div class="col-12 col-md-4">
                    <!-- Gazette Welcome Post -->
                    <div class="gazette-welcome-post">
                        <!-- Post Tag -->
                        <div class="gazette-post-tag">
                            <a href="#">{{$b->name}}</a>
                        </div>
                        <h2 class="font-pt">{{ Str::limit($item->title,30,'') }}</h2>
                        <p class="gazette-post-date">{{ Str::limit($item->updated_at,15,'') }}</p>
                        <!-- Post Thumbnail -->
                        <div class="blog-post-thumbnail my-5">
                            <img src="{{asset('img/blog-img/18.jpg')}}" alt="post-thumb">
                        </div>
                        <!-- Post Excerpt -->
                        <p>{!! Str::limit($item->content, 235,'....') !!}</p>
                        <!-- Reading More -->
                        <div class="post-continue-reading-share mt-30">
                            <div class="post-continue-btn">
            <a href="{{route('frontend.single-post',$item->id)}}" class="font-pt">{{get_static_option('Continue')}}  <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                @endforeach
                {{-- <div class="col-12 col-md-4">
                    <!-- Gazette Welcome Post -->
                    <div class="gazette-welcome-post">
                        <!-- Post Tag -->
                        <div class="gazette-post-tag">
                            <a href="#">Politices</a>
                        </div>
                        <h2 class="font-pt">Report: Hundreds of EPA employees leave</h2>
                        <p class="gazette-post-date">March 29, 2016</p>
                        <!-- Post Thumbnail -->
                        <div class="blog-post-thumbnail my-5">
                            <img src="{{asset('img/blog-img/19.jpg')}}" alt="post-thumb">
                        </div>
                        <!-- Post Excerpt -->
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ultrices egestas nunc, quis venenatis orci tincidunt id. Fusce commodo blandit eleifend.</p>
                        <!-- Reading More -->
                        <div class="post-continue-reading-share mt-30">
                            <div class="post-continue-btn">
                                <a href="#" class="font-pt">Continue Reading <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <!-- Gazette Welcome Post -->
                    <div class="gazette-welcome-post">
                        <!-- Post Tag -->
                        <div class="gazette-post-tag">
                            <a href="#">Politices</a>
                        </div>
                        <h2 class="font-pt">Judge throws out ethics case against Trump</h2>
                        <p class="gazette-post-date">March 29, 2016</p>
                        <!-- Post Thumbnail -->
                        <div class="blog-post-thumbnail my-5">
                            <img src="{{asset('img/blog-img/20.jpg')}}" alt="post-thumb">
                        </div>
                        <!-- Post Excerpt -->
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ultrices egestas nunc, quis venenatis orci tincidunt id. Fusce commodo blandit eleifend.</p>
                        <!-- Reading More -->
                        <div class="post-continue-reading-share mt-30">
                            <div class="post-continue-btn">
                                <a href="#" class="font-pt">Continue Reading <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div> --}}
                @foreach ($blog as $item)
                @foreach ( $all_blog_category as $b )
                @if ($loop->iteration <3 && $b->name =="Politicos" )
                <div class="col-12 col-md-6">
                    <!-- Gazette Welcome Post -->
                    <div class="gazette-welcome-post">
                        <!-- Post Tag -->
                        <div class="gazette-post-tag">
                            <a href="#">{{$b->name}}</a>
                        </div>
                        <h2 class="font-pt">{{ Str::limit($item->title,30,'') }}</h2>
                        <p class="gazette-post-date">{{ Str::limit($item->updated_at,15,'') }}</p>
                        <!-- Post Thumbnail -->
                        <div class="blog-post-thumbnail my-5">
                            <img src="{{('img/blog-img/21.jpg')}}" alt="post-thumb">
                        </div>
                        <!-- Post Excerpt -->
                        <p>{!! Str::limit($item->content, 235,'....') !!}</p>
                        <!-- Reading More -->
                        <div class="post-continue-reading-share mt-30">
                            <div class="post-continue-btn">
        <a href="{{route('frontend.single-post',$item->id)}}" class="font-pt">{{get_static_option('Continue')}}<i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
                @endforeach
                @endforeach
            </div>
{{$blog->links()}}
            {{-- <div class="row">
                <div class="col-12">
                    <div class="gazette-pagination-area">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next"><i class="fa fa-angle-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>

    @endsection
