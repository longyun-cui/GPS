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
                <p>{{ $me->nickname or '' }}</p>
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





            <li class="header">导航</li>

            <li class="treeview {{ $menu_active_of_client_list_for_all or '' }}">
                <a href="{{ url('/navigation')}}">
                    <i class="fa fa-circle-o text-green"></i>
                    <span>导航</span>
                </a>
            </li>
            <li class="treeview {{ $menu_active_of_car_list_for_all or '' }}">
                <a href="{{ url('/navigation/test-list')}}">
                    <i class="fa fa-circle-o text-green"></i>
                    <span>测试</span>
                </a>
            </li>
            <li class="treeview {{ $menu_active_of_route_list_for_all or '' }}">
                <a href="{{ url('/navigation/tool-list')}}">
                    <i class="fa fa-circle-o text-green"></i>
                    <span>工具</span>
                </a>
            </li>
            <li class="treeview {{ $menu_active_of_pricing_list_for_all or '' }}">
                <a href="{{ url('/navigation/template-list')}}">
                    <i class="fa fa-circle-o text-green"></i>
                    <span>模板</span>
                </a>
            </li>







            {{--UI--}}
            <li class="header">UI</li>

            <li class="treeview">
                <a target="_blank" href="{{ url('/gps/UI/index') }}">
                    <i class="fa fa-cube text-red"></i><span>Index</span>
                </a>
            </li>
            <li class="treeview">
                <a target="_blank" href="{{ url('/gps/UI/item-list') }}">
                    <i class="fa fa-cube text-red"></i><span>Item</span>
                </a>
            </li>




            {{--Developing--}}
            <li class="header">Developing</li>

            <li class="treeview">
                <a target="_blank" href="{{ url('/admin') }}">
                    <i class="fa fa-cube text-red"></i><span>Admin</span>
                </a>
            </li>
            <li class="treeview">
                <a target="_blank" href="{{ url('/developing') }}">
                    <i class="fa fa-cube text-red"></i><span>Developing</span>
                </a>
            </li>


            <li class="header">测试</li>

            <li class="treeview {{ $menu_active_of_finance_list_for_all or '' }}">
                <a href="{{ url('/testing')}}">
                    <i class="fa fa-list text-red"></i>
                    <span>测试</span>
                </a>
            </li>
            {{--<li class="treeview {{ $menu_active_of_finance_list_for_income or '' }}">--}}
                {{--<a href="{{ url('/finance/finance-list-for-income')}}">--}}
                    {{--<i class="fa fa-list text-red"></i>--}}
                    {{--<span>支出记录</span>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li class="treeview {{ $menu_active_of_finance_list_for_expense or '' }}">--}}
                {{--<a href="{{ url('/finance/finance-list-for-expense')}}">--}}
                    {{--<i class="fa fa-list text-red"></i>--}}
                    {{--<span>收入记录</span>--}}
                {{--</a>--}}
            {{--</li>--}}




            {{--数据统计--}}
            <li class="header">数据统计</li>

            <li class="treeview {{ $menu_active_of_statistic_index or '' }}">
                <a href="{{ url('/statistic/statistic-index') }}">
                    <i class="fa fa-bar-chart text-green"></i> <span>数据统计</span>
                </a>
            </li>

            <li class="treeview {{ $menu_active_of_statistic_export or '' }}">
                <a href="{{ url('/statistic/statistic-export') }}">
                    <i class="fa fa-download text-green"></i> <span>数据导出</span>
                </a>
            </li>
{{--            <li class="treeview {{ $menu_active_of_statistic_list_for_client or '' }}">--}}
{{--                <a href="{{ url('/statistic/statistic-list-for-client') }}">--}}
{{--                    <i class="fa fa-bar-chart text-green"></i> <span>客户统计</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="treeview {{ $menu_active_of_statistic_list_for_car or '' }}">--}}
{{--                <a href="{{ url('/statistic/statistic-list-for-car') }}">--}}
{{--                    <i class="fa fa-bar-chart text-green"></i> <span>车辆统计</span>--}}
{{--                </a>--}}
{{--            </li>--}}



        </ul>
        <!-- /.sidebar-menu -->
    </section>
    {{--<!-- /.sidebar -->--}}
</aside>