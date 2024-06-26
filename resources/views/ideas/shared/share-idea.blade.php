@auth
<h4> {{ __('ideas.share_idea') }} </h4>
<div class="row">
    <form action = {{route('ideas.store')}} method="post">
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
    <h3> @lang('ideas.login_to_share') </h3>
@endguest
