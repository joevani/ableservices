
@if (Session::get('status'))
    <div class="alert alert-success">
        {{ Session::get('status') }}
        @if(Session::get('password'))
            <p class="text-danger">{{Session::get('password')}}</p>
        @endif
    </div>
@endif
