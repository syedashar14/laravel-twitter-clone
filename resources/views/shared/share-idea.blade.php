@auth
<h4> Share yours ideas </h4>
<div class="row">
    <form action = {{route('ideas.create')}} method="post">
    @csrf
    <div class="mb-3">
        <textarea name = "content" class="form-control" id="idea" rows="3"></textarea>
        @error('content')
        <span class="fs-6 text-danger mt-2">
                {{$message}}
        </span>
        @enderror
    </div>
    <div class="">
        <button type ="submit" class="btn btn-dark"> Share </button>
    </div>
    </form>
</div>
<hr>
@endauth
@guest
    <h3> Login to share Ideas </h3>
@endguest
