@extends('backend.admin-master')
@section('style')
    <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/summernote-bs4.css')}}">
@endsection
@section('site-title')
    {{__('Edit Reservation Post')}}
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
                        <h4 class="header-title">{{__('Edit Reservation Post')}}</h4>
                        <form action="{{route('admin.Reservation.update',$blog_reservation->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label for="language"><strong>{{__('Language')}}</strong></label>
                                        <select name="lang" id="language" class="form-control">
                                            @foreach(get_all_language() as $lang)
                                                <option @if($lang->slug == $blog_reservation->lang) selected @endif value="{{$lang->slug}}">{{$lang->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="Name">{{__('Name')}}</label>
                                        <input type="text" class="form-control"  id="title" name="Name" value="{{$blog_reservation->Name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="Email">{{__('Email')}}</label>
                                        <input type="email" class="form-control" id="title" name="email" value="{{$blog_reservation->email}}">
                                    </div>

                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="title">{{__('Date')}}</label>
                                        <input name="Date" id="excerpt" class="form-control max-height-150" type="datetime-local">{{$blog_reservation->Date}}
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">{{__('phone')}}</label>
                                        <input type="number" class="form-control" value="{{$blog_reservation->phone}}" name="phone" data-role="tagsinput">
                                    </div>

                                    <span class="txt9">
                                        People
                                    </span>

                                    <div class="wrap-inputpeople size12 bo2 bo-rad-10 m-t-3 m-b-23 btn">
                                        <!-- Select2 -->
                                        <select class="selection-1" name="people">
                                            <option value="1">1 person</option>
                                            <option value="2">2 people</option>
                                            <option value="3">3 people</option>
                                            <option value="4">4 people</option>
                                            <option value="5">5 people</option>
                                            <option value="6">6 people</option>
                                            <option value="7">7 people</option>
                                            <option value="8">8 people</option>
                                            <option value="9">9 people</option>
                                            <option value="10">10 people</option>
                                            <option value="11">11 people</option>
                                            <option value="12">12 people</option>
                                        </select>
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
