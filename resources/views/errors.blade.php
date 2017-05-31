@if (count($errors) > 0)
    <div class="alert alert-danger error">
        <ul>
            <p>***</p>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            <p>***</p>
        </ul>
    </div>
@endif