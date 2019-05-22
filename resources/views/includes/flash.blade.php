
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
        @if(session('password'))
            <p class="text-danger">{{session('password')}}</p>
        @endif
    </div>
@endif

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}

    </div>
@endif
