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


            {{--AdminLTE--}}
            <li class="header">AdminLTE</li>

            <li class="treeview {{ $menu_active_of__for_ or '' }}">
                <a target="_blank" href="{{ url('/adminLte/index2.html') }}">
                    <i class="fa fa-user text-blue"></i>
                    <span>index2</span>
                </a>
            </li>
            <li class="treeview {{ $menu_active_of__for_ or '' }}">
                <a target="_blank" href="{{ url('/adminLte/pages/UI/icons.html') }}">
                    <i class="fa fa-user text-blue"></i>
                    <span>Icons</span>
                </a>
            </li>





            <li class="header">事</li>

            <li class="treeview {{ $menu_active_of_todo_menu_list or '' }}">
                <a href="{{ url('/admin/item/todo-menu-list')}}">
                    <i class="fa fa-calendar-check-o text-green"></i>
                    <span>待办事-目录</span>
                </a>
            </li>
            <li class="treeview {{ $menu_active_of_todo_item_list or '' }}">
                <a href="{{ url('/admin/item/todo-item-list')}}">
                    <i class="fa fa-check-circle-o text-green"></i>
                    <span>待办事-内容</span>
                </a>
            </li>
            <li class="treeview {{ $menu_active_of_car_list_for_all or '' }}">
                <a href="{{ url('/admin/item/calendar')}}">
                    <i class="fa fa-calendar text-green"></i>
                    <span>日程</span>
                </a>
            </li>




            <li class="header">navigation</li>

            <li class="treeview {{ $menu_active_of_testing_list or '' }}">
                <a href="{{ url('/admin/testing-list')}}">
                    <i class="fa fa-file-text text-yellow"></i>
                    <span>testing</span>
                </a>
            </li>
            <li class="treeview {{ $menu_active_of_tool_list or '' }}">
                <a href="{{ url('/admin/tool-list')}}">
                    <i class="fa fa-file-text text-yellow"></i>
                    <span>tool</span>
                </a>
            </li>
            <li class="treeview {{ $menu_active_of_template_list or '' }}">
                <a href="{{ url('/admin/template-list')}}">
                    <i class="fa fa-file-text text-yellow"></i>
                    <span>template</span>
                </a>
            </li>




            <li class="header">development</li>

            <li class="treeview {{ $menu_active_of_order_list_for_all or '' }}">
                <a href="{{ url('/dev/ui')}}" target="_blank">
                    <i class="fa fa-file-text text-yellow"></i>
                    <span>ui</span>
                </a>
            </li>



        </ul>
        <!-- /.sidebar-menu -->
    </section>
    {{--<!-- /.sidebar -->--}}
</aside>