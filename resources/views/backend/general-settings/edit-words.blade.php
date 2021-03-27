@extends('backend.admin-master')
@section('site-title')
    {{__('Edit Words Settings')}}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                @include('backend.partials.message')
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__("Change All Words")}}</h4>
                        <form action="{{route('admin.languages.words.update')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                @foreach($all_word as $key => $value)
                                    <div class="col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label for="{{Str::slug(($key))}}">{{$value->option_name}}</label>
                                            <input type="text" name="word[{{$value->id}}]"  class="form-control" value="{{$value->option_value}}"  >
                                            <input type="hidden" name="wo[{{$value->id}}]" class="form-control" value="{{$value->option_name}}"  >
                                            <input type="hidden" name="m[{{$value->id}}]" class="form-control" value="{{$value->id}}">
                                            <input type="hidden" name="lw" class="form-control" value="{{$value->id}}">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Changes')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
