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
    {{__('ContactInfoItem Page')}}
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
                        <h4 class="header-title">{{__('All ContactInfoItem Items')}}</h4>
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
                            <div class="tab-pane fade @if($b >= 0) show active @endif" id="slider_tab_{{$key}}" role="tabpanel" >
                                <table class="table table-default" id="all_blog_table">
                                    <thead>
                                        <th>{{__('ID')}}</th>
                                        <th>{{__('title')}}</th>
                                        <th>{{__('comment')}}</th>
                                        <th>{{__('phone')}}</th>
                                        <th>{{__('email')}}</th>
                                        <th>{{__('created_at')}}</th>
                                    </thead>
                                    <tbody>
                                        @foreach($all_blog as $key => $blog)
                                        @foreach($blog as $data)
                                            <tr>
                                                <td>{{$data->id}}</td>
                                                <td>{{$data->title}}</td>
                                                <td>    {{Str::limit($data->description, 20, '...')}}    </td>
                                                <td>{{$data->phone}}</td>
                                                <td>{{$data->email}}</td>


                                                <td>{{$data->created_at}}</td>
                                                <td>
                                                    <a tabindex="0" class="btn btn-lg btn-danger btn-sm mb-3 mr-1"
                                                       role="button"
                                                       data-toggle="popover"
                                                       data-trigger="focus"
                                                       data-html="true"
                                                       title=""
                                                       data-content="
                                                       <h6>Are you sure to delete this blog post?</h6>
                                                       <form method='post' action='{{route('admin.ContactInfoItem.delete',$data->id)}}'>
                                                       <input type='hidden' name='_token' value='{{csrf_token()}}'>
                                                       <br>
                                                        <input type='submit' class='btn btn-danger btn-sm' value='Yes,Delete'>
                                                        </form>
                                                        ">
                                                        <i class="ti-trash"></i>
                                                    </a>

                                                </td>
                                                @endforeach
                                                @endforeach
                                            </tr>
                                        @php $b++; @endphp
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                    </div>
                </div>
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

            $('#all_blog_table').DataTable( {
                "order": [[ 0, "desc" ]]
            } );
        } );
    </script>
@endsection
