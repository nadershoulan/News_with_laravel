@extends('frontend.include.blog_main')

@section('title')
    {{__('single post')}}
@endsection


@section('home')

    <section class="single-post-area">
        @foreach ($blog_find as $item)
        <!-- Single Post Title -->
        <div class="single-post-title bg-img background-overlay" style="background-image: url({{asset('img/bg-img/1.jpg')}});">
            <div class="container h-100">
                <div class="row h-100 align-items-end">
                    <div class="col-12">
                        <div class="single-post-title-content">
                            <!-- Post Tag -->
                            {{-- <div class="gazette-post-tag">

                                <a href="#">{{$item->name}}</a>
                            </div> --}}
                            <h2 class="font-pt">{{ Str::limit($item->title, 30, '...') }}</h2>
                            <p>{{ Str::limit($item->updated_at, 10, '')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="single-post-contents">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8">
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="single-post-text">
                            <p>
                               {!! Str::limit($item->content, 10, '')!!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </section>

    <section class="gazette-post-discussion-area section_padding_100 bg-gray">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <!-- Comment Area Start -->
                    <div class="comment_area section_padding_50 clearfix">
                        <div class="gazette-heading">
                            <h4 class="font-bold">Discussion</h4>
                        </div>

                        <ol>

                           @foreach ($blog_find as $item)
                            @foreach ($comment as $comm)
                            @if ($comm->blod_detail_id == $item->id && $comm->publish=="on")
                            <!-- Single Comment Area -->
                            <li class="single_comment_area">
                                <div class="comment-wrapper d-md-flex align-items-start">
                                    <!-- Comment Meta -->
                                    <div class="comment-author">
                                        <img src="{{ asset('assets/uploads/images/photo-gallery-thumb-06.jpg') }}" alt="">
                                    </div>
                                    <!-- Comment Content -->
                                    <div class="comment-content">
                                        <h5>{{$comm->name}}</h5>
                                        <span class="comment-date font-pt">{{$comm->created_at}} || {{$comm->website}} </span>
                                        <span>
                                            <p>{{$comm->comment}}</p>
                                        </span>
                                    </div>
                                </div>
                                <ol class="children">
                                    @foreach ($all_replay as $item)
                                    @if ($item->comment_id==$comm->id)


                                    <li class="single_comment_area">
                                        <div class="comment-wrapper d-md-flex align-items-start">
                                            <!-- Comment Meta -->
                                            <div class="comment-author">
                                                <img src="img/blog-img/25.jpg" alt="">
                                            </div>
                                            <!-- Comment Content -->
                                            <div class="comment-content">
                                                <h5>admin </h5>
                                                <span class="comment-date text-muted">December 18, 2017</span>
                                                <p> {{$item->replay_text}}</p>
                                                <a class="reply-btn" href="#">Replyed <i class="fa fa-reply" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                    @endif
                                    @endforeach
                                </ol>
                            </li>
                            @endif
                            @endforeach
                            @endforeach
                        </ol>
                    </div>
                    <!-- Leave A Comment -->
                    @if(session()->has('msg'))
                    <div class="alert alert-{{session('type')}} text-center">
                        {{session('msg')}}
                    </div>
                    @endif
                    <div class="leave-comment-area clearfix">
                        <div class="comment-form">
                            <div class="gazette-heading">
                                <h4 class="font-bold">leave a comment</h4>
                            </div>
                            <!-- Comment Form -->
                            @foreach ($blog_find as $item )
                            <form method="POST" action="/single-post/{{$item->id}}">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" id="contact-name" placeholder="Enter Your Full Name">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" id="contact-email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                                </div>
                                @endforeach
                                <button type="submit" name="website" class="btn leave-comment-btn">SUBMIT <i class="fa fa-angle-right ml-2"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @endsection
