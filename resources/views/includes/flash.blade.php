


@if (request()->session()->get('status'))
    <div class="alert alert-success">
        {{ request()->session()->get('status') }}
        @if(request()->session()->get('password'))
            <p class="text-danger">{{request()->session()->get('password')}}</p>
        @endif
    </div>
@endif

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}

    </div>
@endif
