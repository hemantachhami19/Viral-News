<div class="sidebar" id="sidebar">
    <script type="text/javascript">
        try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
    </script>

    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <button class="btn btn-success">
                <i class="icon-signal"></i>
            </button>

            <button class="btn btn-info">
                <i class="icon-pencil"></i>
            </button>

            <button class="btn btn-warning">
                <i class="icon-group"></i>
            </button>

            <button class="btn btn-danger">
                <i class="icon-cogs"></i>
            </button>
        </div>

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
        </div>
    </div><!-- #sidebar-shortcuts -->

    <ul class="nav nav-list">
        <li class="active">
            <a href="index-2.html">
                <i class="icon-dashboard"></i>
                <span class="menu-text"> Dashboard </span>
            </a>
        </li>

        <li>
            <a href="#" class="dropdown-toggle">
                <i class="icon-desktop"></i>
                <span class="menu-text"> Categories </span>

                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <li>
                    <a href="elements.html">
                        <i class="icon-double-angle-right"></i>
                        Category list
                    </a>
                </li>

                <li>
                    <a href="buttons.html">
                        <i class="icon-double-angle-right"></i>
                        Add new Category
                    </a>
                </li>

                {{--<li>--}}
                    {{--<a href="#" class="dropdown-toggle">--}}
                        {{--<i class="icon-double-angle-right"></i>--}}

                        {{--Three Level Menu--}}
                        {{--<b class="arrow icon-angle-down"></b>--}}
                    {{--</a>--}}

                    {{--<ul class="submenu">--}}
                        {{--<li>--}}
                            {{--<a href="#">--}}
                                {{--<i class="icon-leaf"></i>--}}
                                {{--Item #1--}}
                            {{--</a>--}}
                        {{--</li>--}}

                        {{--<li>--}}
                            {{--<a href="#" class="dropdown-toggle">--}}
                                {{--<i class="icon-pencil"></i>--}}

                                {{--4th level--}}
                                {{--<b class="arrow icon-angle-down"></b>--}}
                            {{--</a>--}}

                            {{--<ul class="submenu">--}}
                                {{--<li>--}}
                                    {{--<a href="#">--}}
                                        {{--<i class="icon-plus"></i>--}}
                                        {{--Add Product--}}
                                    {{--</a>--}}
                                {{--</li>--}}

                                {{--<li>--}}
                                    {{--<a href="#">--}}
                                        {{--<i class="icon-eye-open"></i>--}}
                                        {{--View Products--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
            </ul>
        </li>
    </ul><!-- /.nav-list -->

    <div class="sidebar-collapse" id="sidebar-collapse">
        <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
    </div>

    <script type="text/javascript">
        try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
    </script>
</div>