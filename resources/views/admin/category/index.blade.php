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
                <li>
                    <a href="{{ route($_base_route) }}">{{ $_panel }}</a>
                </li>
                <li class="active">List</li>
            </ul><!-- .breadcrumb -->

            {{--<div class="nav-search" id="nav-search">--}}
                {{--<form class="form-search">--}}
                    {{--<span class="input-icon">--}}
                        {{--<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />--}}
                        {{--<i class="icon-search nav-search-icon"></i>--}}
                    {{--</span>--}}
                {{--</form>--}}
            {{--</div><!-- #nav-search -->--}}
        </div>

        <div class="page-content">
            <div class="page-header">
                <h1>
                    {{ $_panel }} Manager
                    <small>
                        <i class="icon-double-angle-right"></i>
                        List
                    </small>
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">

                    @include('admin.common.alert_messages')

                    <div class="table-responsive">
                        <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>

                                <th>Id</th>

                                <th>Title</th>
                                <th>
                                    <i class="icon-time bigger-110 hidden-480"></i>
                                    Created At
                                </th>
                                <th>View|Edit|Delete</th>
                            </tr>
                            </thead>

                            <tbody>

                            @if ($data['rows']->count() > 0)

                                @foreach($data['rows'] as $row)

                                    <tr>


                                        <td>{{ $row->id }}</td>
                                        <td>{{$row->title }}</td>
                                        <td>{{ $row->created_at }}</td>


                                        <td>
                                            <div class="btn-group">

                                                <a href="{{ route('admin.category.show', $row->id) }}" class="btn btn-xs btn-success">
                                                    <i class="icon-eye-open bigger-120"></i>
                                                <a href="{{ route($_base_route.'.edit', ['id' => $row->id]) }}" class="btn btn-xs btn-info">
                                                    <i class="icon-edit bigger-120"></i>
                                                </a>

                                                <a href="{{ route($_base_route.'.delete', ['id' => $row->id]) }}" class="btn btn-xs btn-danger bootbox-confirm">
                                                    <i class="icon-trash bigger-120"></i>
                                                </a>

                                            </div>
                                        </td>
                                    </tr>

                                    @endforeach

                                {{--<tr>--}}
                                    {{--<td colspan="6">{!! $data['rows']->links() !!}</td>--}}
                                {{--</tr>--}}

                            @endif
                            </tbody>
                        </table>
                    </div>



                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div><!-- /.main-content -->

@endsection

@section('js')


    <script src="{{ asset('assets/admin-panel/js/bootbox.min.js') }}"></script>
    <script>

        $(document).ready(function () {

            $(".bootbox-confirm").on('click', function() {


                var $this = $(this);

                bootbox.confirm("Are you sure?", function(result) {
                    if(result) {

                        var href = $this.attr('href');
                        location.href = href;

                    }

                });

                return false;
            });

        });


    </script>

    @endsection