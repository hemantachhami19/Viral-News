@if (request()->session()->has('error_message'))

    <div class="alert alert-warning">
        <strong>Warning!</strong> {!! request()->session()->get('error_message') !!}
    </div>

@endif

@if (request()->session()->has('success_message'))

    <div class="alert alert-success">
        <strong>Success!</strong> {!! request()->session()->get('success_message') !!}
    </div>

@endif