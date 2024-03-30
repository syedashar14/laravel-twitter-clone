<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:150px" class="me-3 avatar-sm rounded-circle" src="{{ $user->getImageURL() }}"
                    alt="Mario Avatar">
                <div>

                    <h3 class="card-title mb-0"><a href="{{ route('users.show', $user->id) }}"> {{ $user->name }}
                        </a></h3>
                    <span class="fs-6 text-muted">{{ $user->email }}</span>

                </div>
            </div>
            @can('update', $user)
                <div>
                    <a href="{{ route('users.edit', $user->id) }}"> Edit </a>
                </div>
            @endcan

        </div>
        <div class="px-2 mt-4">
            <h5 class="fs-5"> About : </h5>

            <p class="fs-6 fw-light">
                {{ $user->bio }}
            </p>
            @include('users.shared.user-stats')
            @auth
                @if (Auth::user()->isNot($user))
                    @if (Auth::user()->follows($user))
                    <form method="post" action="{{route('users.unfollow', $user->id)}}">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm"> Unfollow </button>
                    </form>
                    @else
                    <form method="post" action="{{route('users.follow', $user->id)}}">
                        @csrf
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary btn-sm"> Follow </button>
                        </div>
                    </form>
                    @endif

                @endif
            @endauth

        </div>
    </div>
</div>
<hr>
