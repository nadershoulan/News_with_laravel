@if(session()->has('msg'))
<div class="alert alert-{{session('type')}} text-center">
    {{session('msg')}}
</div>
@endif
