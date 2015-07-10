<div class="container">
  <div id="logo">
<?php
      $settings = Setting::first();
      if (isset($settings->logo) && $settings->logo != '') {
          $image_properties = array(
                        'src' => (isset($settings->logo)) ? $settings->logo : 'assets/img/15.jpg',
                        'alt' => 'OES system',
                        'title' => 'logo',
                        'width'=>"110px",
                        'style'=>'margin:20px'
              );

           echo  img($image_properties);
       }

       ?>
</div>
</div>
<header class="header">
  <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.js" type="text/javascript"></script>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-custom" role="navigation" style="height:auto">
<div class="container">
    <div class="navbar-left">
        <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
            <li><a href="<?php echo site_url('main'); ?>" <?php echo ($menu == 'main') ? 'class="active"' : ''; ?>><i class="fa fa-home"></i> HOME</a></li>
            <li><a href="<?php echo site_url('exams'); ?>"  <?php echo ($menu == 'exams') ? 'class="active"' : ''; ?>><i class="fa fa-folder"></i> EXAMS</a></li>
            <li><a href="<?php echo site_url('main/about'); ?>"  <?php echo ($menu == 'about') ? 'class="active"' : ''; ?>><i class="fa fa-folder-open"></i> ABOUT</a></li>
            <li><a href="<?php echo site_url('main/contact'); ?>"  <?php echo ($menu == 'contact') ? 'class="active"' : ''; ?>><i class="fa fa-envelope"></i> CONTACT</a></li>
            
        </ul>
    </div>
    <div class="navbar-right">
        <ul class="nav navbar-nav">

        <?php if (!$this->ion_auth->logged_in()) { ?>
        <li <?php echo ($menu == 'login') ? 'class="active"' : ''; ?>><a href="<?php echo site_url('main/login'); ?>" id="login_link" class="btn toggle-modal"><i class="fa fa-unlock"></i> LOGIN (DAFTAR)</a></li>
        <li <?php echo ($menu == 'login') ? 'class="active"' : ''; ?>><a href="<?php echo site_url('main/createtest'); ?>" id="login_link" class="btn toggle-modal"><i class="fa fa-plus"></i> BUAT TESTONLINE</a></li>
        <?php } else {
          $user =  $this->ion_auth->user()->row();
          ?>


            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span>My Account <i class="caret"></i></span>
                </a>
                <ul class="dropdown-menu" id="user_menu">
                    <!-- User image -->
                    <li><a href="<?php echo site_url('users/exams');?>"><i class="fa fa-folder"></i> <strong>My Exams</strong></a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo site_url('users/subscriptions');?>"><i class="fa fa-money"></i> <strong>My Subscriptions</strong></a></li>
                    <li class="divider"></li>
                    <!-- Menu Footer-->
                </ul>
            </li>
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i>
                    <span><?php echo $user->username; ?> <i class="caret"></i></span>
                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header bg-light-blue">
                        <img src="<?php echo  ($user->photo != '') ? base_url().PROFILEPHOTOSTHUMBS.$user->photo : base_url().'assets/img/300.gif';  ?>" class="img-responsive img-circle center-block" alt="Responsive image"/>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <div class="pull-left">
                            <a href="<?php echo site_url('users/profile'); ?>" class="btn btn-default btn-flat">Profile</a>
                        </div>
                        <div class="pull-right">
                            <a href="<?php echo site_url('auth/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                        </div>
                    </li>
                </ul>
            </li>
            <?php } ?>
        </ul>
    </div>

</div>
</nav>
</header>
