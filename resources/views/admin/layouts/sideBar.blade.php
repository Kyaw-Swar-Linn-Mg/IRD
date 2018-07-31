<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <span class="fa fa-user-circle fa-2x" style="color: #ffffff;"></span>
            </div>
            <div class="pull-left info">
                <p>{{Auth::user()->name}}</p>
                <i class="fa fa-circle text-success"></i> Online
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>

            <li><a href="{{route('dashboard.index')}}"><i class="fa fa-dashboard text-blue"></i> <span>Dashboard</span></a></li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users text-gray"></i>
                    <span>User Management</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('dashboard.users.index')}}"><i class="fa fa-eye"></i> User List</a></li>
                    <li><a href="{{route('dashboard.users.create')}}"><i class="fa fa-plus-circle"></i> Add New User</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-circle-o text-red"></i>
                    <span>Person</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('dashboard.person.index')}}"><i class="fa fa-eye"></i> Person List</a></li>
                    <li><a href="{{route('dashboard.person.create')}}"><i class="fa fa-plus-circle"></i> Add New Person</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-circle-o text-yellow"></i>
                    <span>Category</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('dashboard.category.index')}}"><i class="fa fa-eye"></i> Category List</a></li>
                    <li><a href="{{route('dashboard.category.create')}}"><i class="fa fa-plus-circle"></i> Add New Category</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-circle-o text-green"></i>
                    <span>Sub Category</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('dashboard.subCategory.index')}}"><i class="fa fa-eye"></i> Sub Category List</a></li>
                    <li><a href="{{route('dashboard.subCategory.create')}}"><i class="fa fa-plus-circle"></i> Add Sub Category</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-circle-o text-white"></i>
                    <span>Position</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('dashboard.position.index')}}"><i class="fa fa-eye"></i> Position List</a></li>
                    <li><a href="{{route('dashboard.position.create')}}"><i class="fa fa-plus-circle"></i> Add Position</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gears"></i>
                    <span>Settings</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-info-circle"></i> About Us</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
