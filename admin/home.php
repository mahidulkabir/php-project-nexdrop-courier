<?php 
require('./includes/header.php');

require('./configs/config.php');

?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa-solid fa-bars"></i></a>
      </li>
      
        
      </ul>
      <marquee behavior="" direction=""> We are <span style="color: #FF7B00;"> NexDrop Courier. </span> &nbsp; &nbsp; We Will prioritize Customers first.  &nbsp; &nbsp;<span style="color: #FF7B00;">Always!</span> &nbsp; &nbsp; <span style="color: #FF7B00;">Forever!</span> </marquee>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../assets/img/nfavicon.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../assets/img/nfavicon.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">NexDrop Courier</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
     

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <!-- ||||||
               ||||||
               |||||| -->


               <!-- Dashboard item of the list  -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="fa-solid fa-database nav-icon"></i>
              <p>
                Dashboard
              </p>
            </a>
            
          </li>
               <!-- fist item of the list  -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fa-solid fa-users"></i>
              <p>
                Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="home.php?page=1" class="nav-link ">

                  <i class="fa-solid fa-user-plus nav-icon"></i>
                  <p>Add User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="home.php?page=2" class="nav-link ">
                  <i class="fa-solid fa-user-gear nav-icon"></i>
                  <p>Manage Users</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- second item of the list  -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="fa-solid fa-house-flag nav-icon"></i>
              <p>
                Branches
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="home.php?page=4" class="nav-link ">
                    <i class="fa-solid fa-house-chimney-medical nav-icon"></i>
                  <p>Add Branch</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="home.php?page=5" class="nav-link ">
                  <i class="fa-solid fa-house-circle-exclamation nav-icon"></i>
                  <p>Manage Branch</p>
                </a>
              </li>
            </ul> 
          </li>
          <!-- third item of the list  -->
           <li class="nav-item menu-open">
            <a href="" class="nav-link active">
            <i class="fa-solid fa-boxes-stacked nav-icon"></i>
            <p>
                Parcels
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="home.php?page=7" class="nav-link ">
                  <i class="fa-solid fa-box nav-icon"></i>
                  <p>Add new Parcel</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="home.php?page=8" class="nav-link ">
                <i class="fa-solid fa-boxes-packing nav-icon"></i>
                <p>Parcel List</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- fourth item of the list  -->
           <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="fa-solid fa-parachute-box nav-icon"></i>
              <p>
                Parcel Status
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="home.php?page=10" class="nav-link ">
                  <i class="fa-solid fa-people-carry-box nav-icon"></i>
                  <p>Accepted by courier</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="fa-solid fa-dolly nav-icon"></i>
                  <p>Shipped</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="fa-solid fa-truck-fast nav-icon"></i>
                  <p>In-transit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="fa-solid fa-plane-arrival nav-icon"></i>
                  <p>Arrived at Destination</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="fa-solid fa-file-circle-check nav-icon"></i>
                  <p>Ready for Delivery</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="fa-solid fa-circle-check nav-icon"></i>
                  <p>Delivered</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="fa-solid fa-thumbs-down nav-icon"></i>
                  <p>Delivery Unseccessful</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- fifth item of the list  -->
           <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="fa-solid fa-magnifying-glass nav-icon"></i>
              <p>
                Parcel Track
              </p>
            </a>
            
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
       
      <?php 
      include('./divcontainer.php');
      ?>

      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- /.content-header -->

    
    
   
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->





  <!-- Main Footer -->
 <?php 
 require('./includes/footer.php');
 ?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

 <?php 
 require('./includes/scripts.php');
 ?>


</body>
</html>
