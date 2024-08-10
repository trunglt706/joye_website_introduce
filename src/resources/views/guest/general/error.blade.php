@if ($errors->any())
    <div class="alert alert-danger text-center">
        {{ $errors->first() }}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger text-center">
        {{ session('error') }}
    </div>
@endif
