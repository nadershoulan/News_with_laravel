@extends('backend.admin-master')
@section('style')
    <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/summernote-bs4.css')}}">
@endsection
@section('site-title')
    {{__('Edit upcomming_events Post')}}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                @include('backend/partials/message')
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__('Edit upcomming_events Post')}}</h4>
                        <form action="{{route('admin.upcomming_events.update',$blog_upcomming_events->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label for="language"><strong>{{__('Language')}}</strong></label>
                                        <select name="lang" id="language" class="form-control">
                                            @foreach(get_all_language() as $lang)
                                                <option @if($lang->slug == $blog_upcomming_events->lang) selected @endif value="{{$lang->slug}}">{{$lang->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="Name">{{__('Title')}}</label>
                                        <input type="text" class="form-control"  id="title" name="title" value="{{$blog_upcomming_events->title}}">
                                    </div>
                                    <div class="form-group">
                                       <label>{{__('description')}}</label>
                                        <input type="hidden" name="description" value="{{$blog_upcomming_events->description}}">
                                        <div class="summernote" data-content='{{$blog_upcomming_events->description}}'></div>
                                    </div>

                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="title">{{__('Date')}}</label>
                                        <input name="date" id="excerpt" class="form-control max-height-150" type="datetime-local">{{$blog_upcomming_events->Date}}
                                    </div>
                                    <div class="form-group">
                                        <label for="image">{{__('Image')}}</label>
                                        <input type="file" class="form-control" name="img" id="image">
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Reservation')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script src="{{asset('assets/backend/js/summernote-bs4.js')}}"></script>
    <script src="{{asset('assets/backend/js/bootstrap-tagsinput.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.summernote').summernote({
                height: 400,   //set editable area's height
                codemirror: { // codemirror options
                    theme: 'monokai'
                },
                callbacks: {
                    onChange: function(contents, $editable) {
                        $(this).prev('input').val(contents);
                    }
                }
            });
            if($('.summernote').length > 0){
                $('.summernote').each(function(index,value){
                    $(this).summernote('code', $(this).data('content'));
                });
            }

            $(document).on('change','#language',function(e){
                e.preventDefault();
                var selectedLang = $(this).val();
                $.ajax({
                    url: "{{route('admin.blog.lang.cat')}}",
                    type: "POST",
                    data: {
                        _token : "{{csrf_token()}}",
                        lang : selectedLang
                    },
                    success:function (data) {
                        $('#category').html('<option value="">Select Category</option>');
                        $.each(data,function(index,value){
                            $('#category').append('<option value="'+value.id+'">'+value.name+'</option>')
                        });
                    }
                });
            });

        });
    </script>
@endsection
