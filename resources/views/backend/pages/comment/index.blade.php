@extends('backend.admin-master')
@section('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <style>
        .dataTables_wrapper .dataTables_paginate .paginate_button{
            padding: 0 !important;
        }
        div.dataTables_wrapper div.dataTables_length select {
            width: 60px;
            display: inline-block;
        }
    </style>
@endsection
@section('site-title')
    {{__('comment Page')}}
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
                        <h4 class="header-title">{{__('All comment Items')}}</h4>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            @php $a=0; @endphp
                            @foreach($all_blog as $key => $blog)
                                <li class="nav-item">
                                    <a class="nav-link @if($a == 0) active @endif"  data-toggle="tab" href="#slider_tab_{{$key}}" role="tab" aria-controls="home" aria-selected="true">{{get_language_by_slug($key)}}</a>
                                </li>
                                @php $a++; @endphp
                            @endforeach
                        </ul>
                        <div class="tab-content margin-top-40" id="myTabContent">
                            @php $b=0; @endphp
                            <div class="tab-pane fade @if($b == 0) show active @endif" id="slider_tab_{{$key}}" role="tabpanel" >
                                <table class="table table-default" id="all_blog_table">
                                        <thead>
                                            <th>{{__('ID')}}</th>
                                            <th>{{__('name')}}</th>
                                            <th>{{__('comment')}}</th>
                                            <th>{{__('email')}}</th>

                                            <th>{{__('blod detail title')}}</th>
                                            <th>{{__('created_at')}}</th>
                                            <th>{{__('pulish')}}</th>
                                        </thead>
                                        <tbody>
                                        @foreach($all_blog as $key => $blog)
                                        @foreach($blog as $data)
                                            <tr>
                                                <td>{{$data->id}}</td>
                                                <td>{{$data->name}}</td>
                                                <td>{{$data->comment}}</td>
                                                <td>{{$data->email}}</td>


                                                @foreach ($all_blog2 as $item)
                                                @if ($data->blod_detail_id==$item->id)
                                                <td>    {{Str::limit($item->title, 20, '...')}}    </td>
                                                @endif
                                                @endforeach
                                                <td>{{$data->created_at}}</td>
                                                <td>{{$data->publish}}</td>
                                                <td>
                                                    <a tabindex="0" class="btn btn-lg btn-danger btn-sm mb-3 mr-1"
                                                       role="button"
                                                       data-toggle="popover"
                                                       data-trigger="focus"
                                                       data-html="true"
                                                       title=""
                                                       data-content="
                                                       <h6>Are you sure to delete this blog post?</h6>
                                                       <form method='post' action='{{route('admin.comment.delete',$data->id)}}'>
                                                       <input type='hidden' name='_token' value='{{csrf_token()}}'>
                                                       <br>
                                                        <input type='submit' class='btn btn-danger btn-sm' value='Yes,Delete'>
                                                        </form>
                                                        ">
                                                        <i class="ti-trash"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#header_slider_item_edit_modal"
                                                        class="btn btn-lg btn-primary btn-sm mb-3 mr-1 header_slider_edit_btn"
                                                        data-id="{{$data->id}}"
                                                        data-name="{{$data->name}}"
                                                        data-publish="{{$data->publish}}"
                                                        >
                                                        <i class="ti-pencil"></i>
                                                    </a>
                                                </td>
                                                @endforeach
                                                @endforeach
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                @php $b++; @endphp
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="header_slider_item_edit_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Edit Comment Slider Item')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="{{route('admin.comment.update',$data->id)}}" id="header_slider_edit_modal_form" method="post"
                    enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="id" id="header_slider_id" value="">

                        <div class="form-group">
                            <label for="edit_title">{{__('name')}}</label>
                            <input type="text" class="form-control" id="edit_name" name="name"
                                placeholder="{{__('name')}}">
                        </div>
                        <div class="form-group">
                            <label for="edit_description">{{__('comment')}}</label>
                            <textarea class="form-control max-height-150" id="edit_description" name="comment"
                                placeholder="{{__('comment')}}" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="edit_btn_01_status">{{__(' NO/publish')}}</label>
                            <label class="switch">
                                <input type="checkbox" name="btn_01_status" id="edit_btn_01_status">
                                <span class="slider"></span>
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="edit_description">{{__('replay')}}</label>
                            <textarea class="form-control max-height-150" id="edit_description" name="replay_text" placeholder="{{__('replay')}}"
                                cols="30" rows="10"></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('Save Changes')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- Start datatable js -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $(document).on('click','.header_slider_edit_btn',function(){
            var el = $(this);
            var id = el.data('id');
            var action = el.data('action');
            var image = el.data('image');
            var form = $('#header_slider_edit_modal_form');
            form.attr('action',action);
            form.find('#header_slider_id').val(id);
            form.find('#edit_name').val(el.data('name'));
            form.find('#edit_publish').val(el.data('publish'));

            if(el.data('btn_01_status') != ''){
            $('#edit_btn_01_status').prop('checked',true);
            }
            if(el.data('btn_02_status') != ''){
            $('#edit_btn_02_status').prop('checked',true);
            }

            });
            $('#all_blog_table').DataTable( {
                "order": [[ 0, "desc" ]]
            } );

        } );
    </script>
@endsection
