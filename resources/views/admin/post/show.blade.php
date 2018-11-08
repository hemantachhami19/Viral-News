@extends('admin.layout')

@section('content')
    <div class="main-content">
        <div class="breadcrumbs" id="breadcrumbs">
            <script type="text/javascript">
                try {
                    ace.settings.check('breadcrumbs', 'fixed')
                } catch (e) {
                }
            </script>
            <ul class="breadcrumb">
                <li>
                    <i class="icon-home home-icon"></i>
                    <a href="{{ route('admin.dashboard') }}">Home</a>
                </li>
                <li>
                    <a href="{{ route($_base_route) }}">{{ $_panel }}</a>
                </li>
                <li class="active">{{$row->title}}</li>
            </ul><!-- .breadcrumb -->
        </div>

        <div class="page-content">
            <div class="page-header">
                <h1>
                    {{ $_panel }} Manager
                    <small>
                        <i class="icon-double-angle-right"></i>
                        {{$row->title}}
                    </small>
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    @include('admin.common.flash_messages')
                    <div class="table-responsive">
                        <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                            <tbody>
                            @if($row->count() > 0)
                                <tr>
                                    <th>Id</th>
                                    <td>{{ $row->id }}</td>
                                </tr>
                                <tr>
                                    <th width="15%">Title</th>
                                    <td>{{ $row->title}}</td>
                                </tr>
                                <tr>
                                    <th width="15%">Category</th>
                                    <td>{{ $row->category}}</td>
                                </tr>

                                <tr>
                                    <th width="15%">summary</th>
                                    <td>{{ $row->submitted_date}}</td>
                                </tr>
                                <tr>
                                    <th width="15%">summary</th>
                                    <td>{{ $row->published_date}}</td>
                                </tr>

                                <tr>
                                    <th width="15%">summary</th>
                                    <td>{{ $row->summary}}</td>
                                </tr>


                                <tr>
                                    <th width="15%">Detail Description</th>
                                    <td>{{ $row->details}}</td>
                                </tr>

                                <tr>
                                    <th>Edit</th>
                                    <td>
                                        <a class='btn btn-info btn-xs'
                                           href="{{ route($_base_route.'.edit', $row->id) }}"> Edit</a>
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <td colspan="2">
                                        <span>No data</span>
                                    </td>
                                </tr>
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
    @include('admin.common.list_scripts')
@endsection