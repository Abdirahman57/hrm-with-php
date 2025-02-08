<?php
  session_start();
  if ( isset($_SESSION['username']) && $_SESSION['username'] == true ){
        
    // echo '<script>alert("signed in.... successfully.") </script>';
    

       
  }else{
    echo '<script>window.location.href ="index.php" </script>';
     // stop further execution if user not logged in.  // exit() or die() would also work here.  // Note: Always use exit() or die() when dealing with user authentication.  // If not logged in, redirect to login page.  // This prevents unauthorized users from accessing other pages.  // Also, it's a good practice to avoid echo statements in the HTML code, as it can lead to security issues.  // Instead, use JavaScript to display messages or redirect users.  // This is a simple example, and you may need to modify it according to your specific needs.  // For example, you might want to display an error message instead of redirecting the user to the login page.  // Also, note that this example doesn't handle the case where the session is not started yet.  // If you're using this code in a
  }
?>



<link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        
        <li class="nav-item d-none d-sm-inline-block">
        <h5 style="color: black; " class="mt-2"><strong style="color: red;">Welcome</strong> <?php echo $_SESSION['fullname'] ?> </h5>
        </li>
        
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <div class="nav-link" data-toggle="dropdown" href="">
               <i class="nav-icon fas fa-arrow-circle-right"></i></h5>
                
            </div>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="logout.php" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                <strong><i class="nav-icon fas fa-arrow-circle-right"></i>&nbsp;&nbsp;  logout </strong>

                            </h3>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <a href="change_passowrd.php" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                <strong><i class="nav-icon fas fa-lock"></i>&nbsp;&nbsp;  Change Password </strong>

                            </h3>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>

                <div class="dropdown-divider"></div>


        </li>
        <!-- Notifications Dropdown Menu -->


    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo $_SESSION['user_photo'] ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $_SESSION['fullname'] ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php 
        if($_SESSION['role'] == 'admin'){
        
        ?>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="./dashboard.php" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard

                        </p>
                    </a>

                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Employee
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="employee_list.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Employee list</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-building"></i>
                        <p>
                            Department
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="department_list.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Department list</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Schedule
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="schedule_list.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Schedule list</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Users
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="users_list.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Users list</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-clipboard"></i>
                        <p>
                            Attendance
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="attendence_list.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Attendance list</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-clipboard"></i>
                        <p>
                            Report
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="employee report.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Employee Report</p>
                            </a>
                        </li>

                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="Daily report.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Daily Attendance Report</p>
                            </a>
                        </li>

                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="monthlyReport.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>MonthlyAttendeance Report</p>
                            </a>
                        </li>

                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="AllAttendanceReport.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Attendance Report</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item ">
                    <a href="./logout.php" class="nav-link">
                        <i class="nav-icon fas fa-arrow-circle-right"></i>
                        <p>
                            logout

                        </p>
                    </a>

                </li>




            </ul>
            <?php }elseif($_SESSION['role'] == 'user'){?>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->




                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Schedule
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="schedule_list.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Schedule list</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-clipboard"></i>
                        <p>
                            Attendance
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="attendence_list.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Attendance list</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-clipboard"></i>
                        <p>
                            Report
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="Daily report.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Daily Attendance Report</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="monthlyReport.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>MonthlyAttendeance Report</p>
                            </a>
                        </li>

                    </ul>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="AllAttendanceReport.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Attendance Report</p>
                            </a>
                        </li>

                    </ul>

                </li>
                <li class="nav-item menu-open">
                    <a href="./logout.php" class="nav-link">
                        <i class="nav-icon fas fa-arrow-circle-right"></i>
                        <p>
                            logout

                        </p>
                    </a>

                </li>



            </ul>
            <?php }?>
            
            
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>