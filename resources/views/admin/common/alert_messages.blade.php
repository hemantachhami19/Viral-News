 @if (session()->has('success_message'))

    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">
            <i class="icon-remove"></i>
        </button>
        {!! session()->get('success_message') !!}
        <br>
    </div>

@endif

@if (session()->has('error_message'))

    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">
            <i class="icon-remove"></i>
        </button>
        {!! session()->get('error_message') !!}
        <br>
    </div>

    @endif