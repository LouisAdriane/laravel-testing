<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle" src="https://api.dicebear.com/6.x/fun-emoji/svg?seed={{ $idea->user->name }}" alt="{{ $idea->user->name }}">
                <div>
                    <h5 class="card-title mb-0"><a href="{{route('users.show', $idea->user->id)}}"> {{ $idea->user->name }}
                        </a></h5>
                </div>
            </div>

            <div>
                <form method="POST" action="{{ route('ideas.destroy', $idea->id) }}">
                    @csrf
                    @method('delete')
                    @auth()
                    <a class="mx-2" href="{{ route('ideas.edit', $idea->id) }}">Edit</a>
                    <a href="{{ route('ideas.show', $idea->id) }}">View</a>
                    <button class="ms-1 btn btn-danger btn-sm">X</button>
                    @endauth
                    @guest
                    <a href="{{ route('ideas.show', $idea->id) }}">View</a>
                    @endguest
                </form>

            </div>
        </div>
    </div>

    <div class="card-body">

        @if($editing ?? false)
        <form action="{{ route('ideas.update', $idea->id) }}" method="post">
            @csrf
            @method('put')

            <div class="mb-3">
                <textarea name="content" class="form-control" id="content" rows="3">{{$idea->content}}</textarea>
                @error('content')
                <span class="d-block fs-6 text-danger mt-2"> {{ $message }}</span>
                @enderror
            </div>

            <div class="">
                <button class="btn btn-dark"> Update </button>
            </div>

        </form>
        @else
        <p class="fs-6 fw-light text-muted">
            {{$idea->content}}
        </p>
        @endif
        <div class="d-flex justify-content-between">
            <div>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                    </span> {{$idea->likes}} </a>
            </div>
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    {{$idea->created_at}} </span>
            </div>
        </div>
        @include('shared.comments-box')
    </div>
</div>