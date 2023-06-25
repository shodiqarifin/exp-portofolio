@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="aler alert-danger mb-2 p-2">
            <strong>{{ $error }}</strong>
        </div>
    @endforeach
@endif

@if (Session::has('success'))
    <div class="aler alert-success mb-2 p-2">
        <strong>{{ Session::get('success') }}</strong>
    </div>
@endif
