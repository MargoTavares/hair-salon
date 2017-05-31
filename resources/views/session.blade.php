@if (Session::has('message'))
    <div class="alert alert-success">
        {{ Session::get('message') }}
    </div>
@endif