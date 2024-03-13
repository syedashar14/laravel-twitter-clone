@if(session()->has('ideaCreatedSuccess'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('ideaCreatedSuccess')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
