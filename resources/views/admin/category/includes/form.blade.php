{{--{!! Form::select('organisation_id', $organisations->pluck('name','id'), isset($selected_organisation)? $selected_organisation:null, ['placeholder'=>'Select organisation', 'class' => 'form-control']) !!}--}}
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="title"> Title </label>
    <div class="col-sm-9">
        {!! Form::text('title', null, ['required' => true,'class' => 'col-xs-12 col-sm-5', 'placeholder' => 'Title']) !!}
        @if ($errors->has('title'))
            <div class="col-sm-9 col-sm-offset-3" style="color: red">
                <span class="middle validation-alert">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
            </div>
        @endif
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="summary"> Summary </label>
    <div class="col-sm-9">
        {!! Form::text('summary', null, ['required' => true,'class' => 'col-xs-10 col-sm-5', 'placeholder' => 'Enter brief summary']) !!}
        @if ($errors->has('summary'))
            <div class="col-sm-9 col-sm-offset-3" style="color: red">
                <span class="middle validation-alert">
                    <strong>{{ $errors->first('summary') }}</strong>
                </span>
            </div>>
        @endif
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="title">Parent Category</label>
    <div class="col-sm-9">
        {!! Form::select('parent_id',$data['rows']->pluck('title','id'),null,['placeholder'=>'Select parent category', 'class' => 'col-xs-10 col-sm-5']) !!}
    </div>
    @if ($errors->has('parent_id'))
        <div class="col-sm-9 col-sm-offset-3" style="color: red">
                <span class="middle validation-alert">
                <strong>{{ $errors->first('parent_id') }}</strong>
            </span>
        </div>
    @endif
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
