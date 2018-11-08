<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="title"> Title </label>
    <div class="col-sm-9">
        {!! Form::text('title', null, ['required' => true,'class' => 'col-xs-12 col-sm-6', 'placeholder' => 'Title']) !!}
        @if ($errors->has('title'))
            <span class="middle validation-alert">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="title">Category</label>
    <div class="col-sm-9">
        {!! Form::select('category_id',$data['rows']->pluck('title','id'),null,['placeholder'=>'Select parent category', 'class' => 'col-xs-12 col-sm-6']) !!}
        @if ($errors->has('category'))
            <span class="middle validation-alert">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="summary"> Summary </label>
    <div class="col-sm-9">
        {!! Form::textarea('summary', null, ['required' => true,'class' => 'col-xs-12 col-sm-6', 'ck-editor','rows' => 5 ,'cols'=> 10, 'placeholder' => 'Enter brief summary']) !!}
        @if ($errors->has('summary'))
            <span class="middle validation-alert">
                <strong>{{ $errors->first('summary') }}</strong>
            </span>
        @endif
    </div>
</div>


<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="title">Description</label>
    <div class="col-sm-9">
        {!! Form::textarea('details',null,['placeholder'=>'Enter the detail news', 'class' => 'col-xs-12 col-sm-6','rows'=>12,'cols'=>12]) !!}
        @if ($errors->has('details'))
            <span class="middle validation-alert">
                <strong>{{ $errors->first('details') }}</strong>
            </span>
        @endif
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

<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="title"> Choose main image </label>
    <div class="col-sm-9">
        {!! Form::file('main_image', null, ['required' => true,'class' => 'col-xs-12 col-sm-6', 'placeholder' => 'choose a image']) !!}
        @if ($errors->has('main_image'))
            <span class="middle validation-alert">
                <strong>{{ $errors->first('main_image') }}</strong>
            </span>
        @endif
    </div>
</div>
