@extends('admin.layout')

@section('content')

    <div class="main-content">
        <div class="breadcrumbs" id="breadcrumbs">
            <script type="text/javascript">
                try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
            </script>

            <ul class="breadcrumb">
                <li>
                    <i class="icon-home home-icon"></i>
                    <a href="{{ route('admin.dashboard') }}">Home</a>
                </li>
                <li><a href="{{ route($_base_route) }}">{{ $_panel }}</a></li>
                <li class="active">Edit</li>
            </ul><!-- .breadcrumb -->


        </div>

        <div class="page-content">
            <div class="page-header">
                <h1>
                    {{ $_panel }} Manager
                    <small>
                        <i class="icon-double-angle-right"></i>
                        Edit Form
                    </small>
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12"+>
                    <!-- PAGE CONTENT BEGINS -->

                    {{--@include($flash_message_path)--}}

                    {!! Form::model($data['row'], ['url' => route($_base_route.'.update', ['id' => $data['row']->id]), 'class' => 'form-horizontal']) !!}

                        <input type="hidden" name="id" value="{{ $data['row']->id }}">

                        @include('admin.tag.includes.form')

                        <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                                <button class="btn btn-info" type="submit">
                                    <i class="icon-ok bigger-110"></i>
                                    Update
                                </button>


                            </div>
                        </div>

                        <div class="hr hr-24"></div>


                    </form>

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div><!-- /.main-content -->

@endsection