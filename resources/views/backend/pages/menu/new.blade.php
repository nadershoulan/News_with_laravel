@extends('backend.admin-master')
@section('style')
    <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/summernote-bs4.css')}}">
@endsection
@section('site-title')
    {{__('New menu Post')}}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <!-- basic form start -->
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
                        <h4 class="header-title">{{__('Add New menu Post')}}</h4>
                        <form action="{{route('admin.menu.new')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label for="language"><strong>{{__('Language')}}</strong></label>
                                        <select name="lang" id="language" class="form-control">
                                            @foreach($all_language as $lang)
                                            <option value="{{$lang->slug}}">{{$lang->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">{{__('name')}}</label>
                                        <input type="text" class="form-control"  id="title" name="name" placeholder="{{__('name')}}">
                                    </div>
                                    <div class="form-group">
                                        <label>{{__('description')}}</label>
                                        <input type="hidden" name="description" >
                                        <div class="summernote"></div>
                                    </div>
                                </div>
                                <div class="col-lg-4">

                                    <div class="form-group">
                                        <label for="category">{{__('Category')}}</label>
                                        <select name="menu_category_id" class="form-control" id="category">
                                            <option value="">{{__("Select manu Category")}}</option>
                                            @foreach($all_category as $category)
                                            <option
                                                selected

                                                value="{{$category->id}}">{{$category->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">{{__('price')}}</label>
                                        <input type="number" class="form-control" name="price" >
                                    </div>

                                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Add New menu')}}</button>
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
            $(document).on('click','.category_edit_btn',function(){
                var el = $(this);
                var id = el.data('id');
                var name = el.data('name');
                var status = el.data('status');
                var modal = $('#category_edit_modal');
                modal.find('#category_id').val(id);
                modal.find('#edit_status option[value="'+status+'"]').attr('selected',true);
                modal.find('#edit_name').val(name);
            });
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
            if($('.summernote').length > 1){
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
