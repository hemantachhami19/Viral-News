
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="title"> Title </label>
    <div class="col-sm-9">
        {!! Form::text('title', null, ['required' => true,'class' => 'col-xs-10 col-sm-5', 'placeholder' => 'Title']) !!}
        @if ($errors->has('title'))
            <span class="middle validation-alert">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="summary"> Summary </label>
    <div class="col-sm-9">
        {!! Form::text('summary', null, ['required' => true,'class' => 'col-xs-10 col-sm-5', 'placeholder' => 'Enter brief summary']) !!}
        @if ($errors->has('summary'))
            <span class="middle validation-alert">
                <strong>{{ $errors->first('summary') }}</strong>
            </span>
        @endif
    </div>
</div>


<div class="row">
    <div class="form-group">
        <label for="category" class="col-sm-3 control-label no-padding-right">Category</label>
        <div class="col-sm-9">
            {{ Form::select('category_id', $data['categories'], null, [ 'class' => 'col-xs-10 col-sm-5','placeholder'=>'--Select Category--']) }}
        </div>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-3">Status</label>
    <div class="col-sm-6">
        <div class="row">
            <div class="col-sm-6">
                <label class="radio-inline">
                    <input type="radio" name="status" value="1" checked>Active
                </label>
                <label class="radio-inline">
                    <input type="radio" name="status" value="0">Inactive
                </label>
            </div>
        </div>
    </div>
</div>
