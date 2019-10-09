<!-- < ?php  print_r($this->session->userdata()); exit(); ?> -->
  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>ERP</b> E-comm</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><!-- <b>ERP</b> --> <?php echo ucwords($this->session->userdata['company_name']); ?></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span>Date:- <?php $dateTime = new DateTime('now', new DateTimeZone('Asia/Kolkata')); echo $dateTime->format("d/m/y  H:i:s A");  ?></span>
              <!-- <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span> -->
            </a>
          </li>
          
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url(); ?>uploads/<?php echo $this->session->userdata['companyImg'] ?>" class="user-image" alt="Image">
              <span class="hidden-xs"><i class="fa fa-user"></i></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url(); ?>uploads/<?php echo $this->session->userdata['companyImg'] ?>" class="img-circle" alt="Image">
                <p>
                  <?php echo $this->session->userdata['company_name']; ?>
                  <!-- <small>Member since Nov. 2012</small> -->
                </p>
              </li>
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-12 text-center">
                    <!-- <a href="#">Followers</a> -->
                      
                      <?php if(in_array('updateCompany', $user_permission)): ?>
                        <a href="<?php echo base_url('company') ?>" class="btn btn-default btn-flat"><span>Company Info</span></a>
                      <?php endif; ?>
                      

                  </div>
                  <!-- <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div> -->
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                  
                  <?php if(in_array('viewProfile', $user_permission)): ?>
                    <div class="pull-left">
                      <!-- <a href="#" class="btn btn-default btn-flat">Profile</a> -->
                      <a href="<?php echo base_url('users/profile/') ?>" class="btn btn-default btn-flat"><span>Profile</span></a>
                    </div>
                  <?php endif; ?>

               
                <!-- companyImg -->

                <div class="pull-right">
                  <!-- <a href="#" class="btn btn-default btn-flat">Sign out</a> -->
                  <a href="<?php echo base_url('auth/logout') ?>" class="btn btn-default btn-flat"><span>Logout</span></a>
                </div>
              </li>
            </ul>
          </li>

          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" ><i class="fa fa-gears"></i></a>
            <!-- <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a> -->
          </li>
        </ul>
      </div>
    </nav>
  </header>