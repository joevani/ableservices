@if (session('type' =='success'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>

@else
<div class="alert alert-error">
    {{ session('status') }}
</div>

@endif
