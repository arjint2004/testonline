<!-- Left side column. contains the logo and sidebar -->
<aside class="left-side sidebar-offcanvas">                
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url();?>assets/img/avatar3.png" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>Hello, Jane</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li>
                <a href="<?php echo site_url('admin/dashboard'); ?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li  class="treeview">
                <a href="#">
                    <i class="fa fa-th"></i> <span>Exams</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('admin/exams/create'); ?>"><i class="fa fa-angle-double-right"></i> Add Exam</a></li>
                    <li><a href="<?php echo site_url('admin/exams'); ?>"><i class="fa fa-angle-double-right"></i> View Exams</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-bar-chart-o"></i>
                    <span>Categories</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('admin/categories/create'); ?>"><i class="fa fa-angle-double-right"></i> Add Category</a></li>
                    <li><a href="<?php echo site_url('admin/categories'); ?>"><i class="fa fa-angle-double-right"></i> View Categories</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Users</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('auth/create_user'); ?>"><i class="fa fa-angle-double-right"></i> Add User</a></li>
                    <li><a href="<?php echo site_url('admin/users'); ?>"><i class="fa fa-angle-double-right"></i> View Users</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Subscriptions</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('admin/subscriptions/create'); ?>"><i class="fa fa-angle-double-right"></i> Add Subscription</a></li>
                    <li><a href="<?php echo site_url('admin/subscriptions'); ?>"><i class="fa fa-angle-double-right"></i> View Subscriptions</a></li>                              
                </ul>
            </li>
            <li>
                <a href="<?php echo site_url('admin/results'); ?>">
                    <i class="fa fa-table"></i> <span>Results</span>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('admin/settings'); ?>">
                    <i class="fa fa-cog"></i> <span>Settings</span>
                </a>
            </li>
            
            
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>