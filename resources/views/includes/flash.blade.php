
@if (Session::get('status'))
    <div class="alert alert-success">
        {{ Session::get('status') }}
        @if(Session::get('password'))
            <p class="text-danger">{{Session::get('password')}}</p>
        @endif
    </div>
@endif



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
