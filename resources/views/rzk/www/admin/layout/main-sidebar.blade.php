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
                <p>{{ $me->username or '' }}</p>
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
                        <a href="{{url('/admin/index')}}">
                            <i class="fa fa-circle-o text-aqua"></i>基本信息
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/admin/edit')}}">
                            <i class="fa fa-circle-o text-aqua"></i>编辑基本信息
                        </a>
                    </li>
                </ul>
            </li>


            {{--页面管理--}}
            <li class="header">页面管理</li>

            <li class="treeview {{ $menu_active_of_page_list or '' }}">
                <a href="{{ url('/admin/item/page-list') }}">
                    <i class="fa fa-columns text-red"></i>
                    <span>页面列表</span>
                </a>
            </li>


            {{--模块组件--}}
            <li class="header">模块组件</li>

            <li class="treeview {{ $menu_active_of_module_list or '' }}">
                <a href="{{ url('/admin/item/module-list') }}">
                    <i class="fa fa-delicious text-green"></i>
                    <span>模块组件</span>
                </a>
            </li>


            {{--内容管理--}}
            <li class="header">内容管理</li>

            <li class="treeview {{ $menu_active_of_article_list or '' }}">
                <a href="{{ url('/admin/item/article-list') }}">
                    <i class="fa fa-newspaper-o text-orange"></i>
                    <span>文章列表</span>
                </a>
            </li>


            <li class="header">网站</li>
            <li class="treeview">
                <a target="_blank" href="{{ url('/') }}">
                    <i class="fa fa-home text-default"></i> <span>网站首页</span>
                </a>
            </li>



        </ul>
        <!-- /.sidebar-menu -->
    </section>
    {{--<!-- /.sidebar -->--}}
</aside>