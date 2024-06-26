<!-- Main Header -->
<header class="main-header">


    <!-- Logo -->
    <a href="{{url('/admin')}}" class="logo hidden-xs">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>GPS</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>GPS</b>stage</span>
    </a>


    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="#">Link <span class="sr-only">(current)</span></a>
                </li>
                <li>
                    <a href="#">Link</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
            </ul>
        </div>


        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <!-- Add Menu -->
                <li class="dropdown tasks-menu add-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-plus"></i>
                    </a>
                    <ul class="dropdown-menu">

                        @if(in_array($me->user_type,[0,1,9,11,19,21,22]))
                        <li class="header">待办事</li>
                        <li class="header">
                            <a href="{{ url('/admin/item/todo-menu-create') }}">
                                <i class="fa fa-plus text-red"></i> 添加待办-目录
                            </a>
                        </li>
                        <li class="header">
                            <a href="{{ url('/admin/item/todo-item-create') }}">
                                <i class="fa fa-plus text-red"></i> 添加待办-内容
                            </a>
                        </li>
                        @endif

                        @if(in_array($me->user_type,[0,1,9,11,19]))
                        <li class="header">业务</li>
                        <li class="header">
                            <a href="{{ url('/user/client-create') }}">
                                <i class="fa fa-plus text-green"></i> 添加客户
                            </a>
                        </li>
                        <li class="header">
                            <a href="{{ url('/item/car-create') }}">
                                <i class="fa fa-plus text-green"></i> 添加车辆
                            </a>
                        </li>
                        @endif

                        @if(in_array($me->user_type,[0,1,9,11,19,81,82,88]))
                        <li class="header">订单</li>
                        <li class="header">
                            <a href="{{ url('/item/order-import') }}">
                                <i class="fa fa-file-excel-o text-yellow"></i> 导入订单
                            </a>
                        </li>
                        <li class="header">
                            <a href="{{ url('/item/order-create') }}">
                                <i class="fa fa-plus text-yellow"></i> 添加订单
                            </a>
                        </li>
                        <li class="header">
                            <a href="{{ url('/item/circle-create') }}">
                                <i class="fa fa-plus text-yellow"></i> 添加环线
                            </a>
                        </li>
                        @endif

                        @if(in_array($me->user_type,[0,1,9,11,19,41,42]))
                        <li class="header">财务</li>
                        <li class="header">
                            <a href="{{ url('/finance/finance-import') }}">
                                <i class="fa fa-file-excel-o text-red"></i> 导入财务
                            </a>
                        </li>
                        @endif

                        <li class="footer"><a href="#">See All Messages</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu right" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>

                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success">4</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 4 messages</li>
                        <li>
                            <!-- inner menu: contains the messages -->
                            <ul class="menu">
                                <li><!-- start message -->
                                    <a href="#">
                                        <div class="pull-left">
                                            <!-- User Image -->
                                            <img src="/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                        </div>
                                        <!-- Message title and timestamp -->
                                        <h4>
                                            Support Team
                                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                        </h4>
                                        <!-- The message -->
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                <!-- end message -->
                            </ul>
                            <!-- /.menu -->
                        </li>
                        <li class="footer"><a href="#">See All Messages</a></li>
                    </ul>
                </li>
                <!-- /.messages-menu -->

                <!-- Notifications Menu -->
                <li class="dropdown notifications-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">10</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 10 notifications</li>
                        <li>
                            <!-- Inner Menu: contains the notifications -->
                            <ul class="menu">
                                <li><!-- start notification -->
                                    <a href="#">
                                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                    </a>
                                </li>
                                <!-- end notification -->
                            </ul>
                        </li>
                        <li class="footer"><a href="#">View all</a></li>
                    </ul>
                </li>
                <!-- Tasks Menu -->
                <li class="dropdown tasks-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-flag-o"></i>
                        <span class="label label-danger">9</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 9 tasks</li>
                        <li>
                            <!-- Inner menu: contains the tasks -->
                            <ul class="menu">
                                <li><!-- Task item -->
                                    <a href="#">
                                        <!-- Task title and progress text -->
                                        <h3>
                                            Design some buttons
                                            <small class="pull-right">20%</small>
                                        </h3>
                                        <!-- The progress bar -->
                                        <div class="progress xs">
                                            <!-- Change the css width attribute to simulate progress -->
                                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">20% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <!-- end task item -->
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="#">View all tasks</a>
                        </li>
                    </ul>
                </li>
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        @if(!empty($me->portrait_img))
                            <img src="{{ url(env('DOMAIN_CDN').'/'.$me->portrait_img) }}" class="user-image" alt="User">
                        @else
                            <img src="/AdminLTE/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                        @endif
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs">{{ $me->username or '' }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            @if(!empty($me->portrait_img))
                                <img src="{{ url(env('DOMAIN_CDN').'/'.$me->portrait_img) }}" class="user-image" alt="User">
                            @else
                                <img src="/AdminLTE/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                            @endif

                            <p>{{ $me->username or '' }}</p>
                            <p></p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="row">
                                <div class="col-xs-4 text-center">
                                    <a href="#">Followers</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Sales</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Friends</a>
                                </div>
                            </div>
                            <!-- /.row -->
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ url('/admin/my-account/my-profile-info-index') }}" class="btn btn-default btn-flat">个人资料</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('/admin/logout') }}" class="btn btn-default btn-flat">退出</a>
                            </div>
                        </li>
                    </ul>
                </li>

                <!-- Add Menu -->
                <li class="dropdown tasks-menu add-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-calendar"></i>
                        <span class="hidden-xs">第{{ $me->diff['total'] + 1 }}天</span>
                    </a>
                    <ul class="dropdown-menu">

                        <li class="header">人生</li>
                        <li class="header">
                            <a href="javascript:void(0);">
                                <i class="fa fa-plus text-red"></i>
                                {{ $me->diff['year'] }}岁{{ $me->diff['month'] }}个月{{ $me->diff['day'] }}天
                            </a>
                        </li>
                        <li class="header">
                            <a href="javascript:void(0);">
                                <i class="fa fa-plus text-red"></i>
                                {{ $me->diff['year'] }}岁{{ $me->diff['this_day'] }}天
                            </a>
                        </li>

                        <li class="header">今年</li>
                        <li class="header">
                            <a href="javascript:void(0);">
                                <i class="fa fa-calendar text-green"></i>
                                {{ "今年第".intval(date('W'))."周 星期".(date('N')) }}
                            </a>
                        </li>
                        <li class="header">
                            <a href="javascript:void(0);">
                                <i class="fa fa-calendar-check-o text-green"></i>
                                {{ "今年第".(date('z') + 1)."天" }}
                            </a>
                        </li>
                        <li class="header">
                            <a href="javascript:void(0);">
                                <i class="fa fa-calendar-minus-o text-red"></i>
                                {{ "今年还剩".($me->diff['this_year_day'] - date('z')) }}天
                            </a>
                        </li>

                        <li class="footer"><a href="javascript:void(0);">更多</a></li>
                    </ul>
                </li>

                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>


</header>