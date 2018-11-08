<div class="sidebar" id="sidebar">
    <script type="text/javascript">
        try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
    </script>

    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
           
        </div>

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
        </div>
    </div><!-- #sidebar-shortcuts -->

    <ul class="nav nav-list">
        <li {!! request()->is('admin/dashboard')?'class="active"':'' !!}>
            <a href="{{ route('admin.dashboard') }}">
                <i class="icon-dashboard"></i>
                <span class="menu-text"> Dashboard </span>
            </a>
        </li>
        <li {!! request()->is('admin/category*')?'class="active open"':'' !!}>
            <a href="#" class="dropdown-toggle">
                <i class="icon-list"></i>
                <span class="menu-text"> Category </span>

                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <li {!! request()->is('admin/category')?'class="active"':'' !!}>
                    <a href="{{ route('admin.category') }}">
                        <i class="icon-eye-open"></i>
                        List
                    </a>
                </li>
                <li {!! request()->is('admin/category/create')?'class="active"':'' !!}>
                    <a href="{{ route('admin.category.create') }}">
                        <i class="icon-plus"></i>
                        Add
                    </a>
                </li>
            </ul>
        </li>

        <li {!! request()->is('admin/post*')?'class="active open"':'' !!}>
            <a href="#" class="dropdown-toggle">
                <i class="icon-gift"></i>
                <span class="menu-text"> Post </span>


                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <li {!! request()->is('admin/post')?'class="active"':'' !!}>
                    <a href="{{ route('admin.post') }}">
                        <i class="icon-eye-open"></i>
                        List
                    </a>
                </li>
                <li {!! request()->is('admin/post/create')?'class="active"':'' !!}>
                    <a href="{{ route('admin.post.create') }}">
                        <i class="icon-plus"></i>
                        Add
                    </a>
                </li>
            </ul>
        </li>


        <li {!! request()->is('admin/tag')?'class="active open"':'' !!}>
            <a href="#" class="dropdown-toggle">
                <i class="icon-tag"></i>
                <span class="menu-text"> Tags </span>

                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <li {!! request()->is('admin/tag')?'class="active"':'' !!}>
                    <a href="{{ route('admin.tag') }}">
                        <i class="icon-eye-open"></i>
                        List
                    </a>
                </li>
                <li {!! request()->is('admin/tag/create')?'class="active"':'' !!}>
                    <a href="{{ route('admin.tag.create') }}">
                        <i class="icon-plus"></i>
                        Add
                    </a>
                </li>
            </ul>
        </li>

        {{--<li {!! request()->is('admin/gallery*')?'class="active open"':'' !!}>--}}
            {{--<a href="#" class="dropdown-toggle">--}}
                {{--<i class="icon-picture"></i>--}}
                {{--<span class="menu-text"> Gallery</span>--}}

                {{--<b class="arrow icon-angle-down"></b>--}}
            {{--</a>--}}

            {{--<ul class="submenu">--}}
                {{--<li {!! request()->is('admin/gallery')?'class="active"':'' !!}>--}}
                    {{--<a href="{{ route('admin.gallery') }}">--}}
                        {{--<i class="icon-eye-open"></i>--}}
                        {{--Images--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li {!! request()->is('admin/gallery/create')?'class="active"':'' !!}>--}}
                    {{--<a href="{{ route('admin.gallery.create') }}">--}}
                        {{--<i class="icon-plus"></i>--}}
                        {{--Add Image--}}
                    {{--</a>--}}
                {{--</li>--}}
            {{--</ul>--}}
        {{--</li>--}}
        {{--<li {!! request()->is('admin/service*')?'class="active open"':'' !!}>--}}
            {{--<a href="#" class="dropdown-toggle">--}}
                {{--<i class="icon-briefcase"></i>--}}
                {{--<span class="menu-text"> Services</span>--}}

                {{--<b class="arrow icon-angle-down"></b>--}}
            {{--</a>--}}

            {{--<ul class="submenu">--}}
                {{--<li {!! request()->is('admin/service')?'class="active"':'' !!}>--}}
                    {{--<a href="{{ route('admin.service') }}">--}}
                        {{--<i class="icon-eye-open"></i>--}}
                        {{--Services--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li {!! request()->is('admin/service/create')?'class="active"':'' !!}>--}}
                    {{--<a href="{{ route('admin.service.create') }}">--}}
                        {{--<i class="icon-plus"></i>--}}
                        {{--Add Service--}}
                    {{--</a>--}}
                {{--</li>--}}
            {{--</ul>--}}
        {{--</li>--}}

        {{--<li {!! request()->is('admin/branch*')?'class="active open"':'' !!}>--}}
            {{--<a href="#" class="dropdown-toggle">--}}
                {{--<i class="icon-sitemap"></i>--}}
                {{--<span class="menu-text">Branches</span>--}}

                {{--<b class="arrow icon-angle-down"></b>--}}
            {{--</a>--}}

            {{--<ul class="submenu">--}}
                {{--<li {!! request()->is('admin/branch')?'class="active"':'' !!}>--}}
                    {{--<a href="{{ route('admin.branch') }}">--}}
                        {{--<i class="icon-eye-open"></i>--}}
                        {{--Branch list--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li {!! request()->is('admin/branch/create')?'class="active"':'' !!}>--}}
                    {{--<a href="{{ route('admin.branch.create') }}">--}}
                        {{--<i class="icon-plus"></i>--}}
                        {{--Add Branch--}}
                    {{--</a>--}}
                {{--</li>--}}
            {{--</ul>--}}
        {{--</li>--}}

        {{--<li {!! request()->is('admin/contact*')?'class="active open"':'' !!}>--}}
            {{--<a href="#" class="dropdown-toggle">--}}
                {{--<i class="icon-user"></i>--}}
                {{--<span class="menu-text">Messages</span>--}}

                {{--<b class="arrow icon-angle-down"></b>--}}
            {{--</a>--}}

            {{--<ul class="submenu">--}}
                {{--<li {!! request()->is('admin/message')?'class="active"':'' !!}>--}}
                    {{--<a href="{{ route('admin.message') }}">--}}
                        {{--<i class="icon-eye-open"></i>--}}
                         {{--Messages Recieved--}}
                    {{--</a>--}}
                {{--</li>--}}

            {{--</ul>--}}
        {{--</li>--}}


    </ul><!-- /.nav-list -->

    <div class="sidebar-collapse" id="sidebar-collapse">
        <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
    </div>

    <script type="text/javascript">
        try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
    </script>
</div>