{{--<!-- Left side column. contains the logo and sidebar -->--}}
<aside class="main-sidebar">

    {{--<!-- sidebar: style can be found in sidebar.less -->--}}
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel _none">
            <div class="pull-left image">
                <img src="/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ $me->nickname }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form _none">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">

            <!-- Optionally, you can add icons to the links -->

            <li class="treeview _none">
                <a href="">
                    <i class="fa fa-th"></i> <span>Super</span>
                    <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{url('/'.config('common.super.admin.prefix').'/softorg/index')}}">
                            <i class="fa fa-circle-o text-aqua"></i>基本信息
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/'.config('common.super.admin.prefix').'/softorg/edit')}}">
                            <i class="fa fa-circle-o text-aqua"></i>编辑基本信息
                        </a>
                    </li>
                </ul>
            </li>


            {{--用户管理--}}
            <li class="header">用户管理</li>

            <li class="treeview {{ $sidebar_user_all_list_active or '' }}">
                <a href="{{ url('/user/user-list-for-all') }}">
                    <i class="fa fa-user"></i><span>全部用户</span>
                </a>
            </li>
            {{--<li class="treeview {{ $sidebar_user_list_for_individual_active or '' }}">--}}
                {{--<a href="{{ url('/user/user-list-for-individual') }}">--}}
                    {{--<i class="fa fa-user"></i><span>个人</span>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li class="treeview {{ $sidebar_user_list_for_doc_active or '' }}">--}}
                {{--<a href="{{ url('/user/user-list-for-doc') }}">--}}
                    {{--<i class="fa fa-user"></i><span>轻博</span>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li class="treeview {{ $sidebar_user_list_for_org_active or '' }}">--}}
                {{--<a href="{{ url('/user/user-list-for-org') }}">--}}
                    {{--<i class="fa fa-user"></i><span>组织</span>--}}
                {{--</a>--}}
            {{--</li>--}}




            <li class="header">内容管理</li>

            <li class="treeview {{ $menu_active_of_task_list_for_all or '' }}">
                <a href="{{ url('/item/task-list-for-all')}}">
                    <i class="fa fa-list text-red"></i>
                    <span>任务列表</span>
                </a>
            </li>




            {{--流量统计--}}
            <li class="header _none">流量统计</li>

            <li class="treeview {{ $menu_active_of_statistic or '' }} _none">
                <a href="{{ url('/statistic') }}">
                    <i class="fa fa-bar-chart text-green"></i> <span>流量统计</span>
                </a>
            </li>
            <li class="treeview {{ $menu_active_of_statistic_list_for_all or '' }} _none">
                <a href="{{ url('/statistic/statistic-all-list') }}">
                    <i class="fa fa-bar-chart text-green"></i> <span>统计列表</span>
                </a>
            </li>



        </ul>
        <!-- /.sidebar-menu -->
    </section>
    {{--<!-- /.sidebar -->--}}
</aside>