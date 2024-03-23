<div class="card">
    <div class="card-header pb-0 border-0">
        <h5 class="">Search</h5>
    </div>
    <div class="card-body">
        <form action="@if (Route::is('feed')) {{route('feed')}} @else {{route('dashboard')}} @endif" method="GET">
        @csrf
        <input value = "{{request('search', '')}}" placeholder="...
        " class="form-control w-100" type="text"
            name="search">
        <button class="btn btn-dark mt-2"> Search</button>
        </form>
    </div>
</div>
<div class="card mt-3">
    @include('shared.follow-box')
</div>
