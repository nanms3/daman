<?php
 
 require("../include/connected.php");
 ?>
<!DOCTYPE html>
<meta charset="utf-8" />
<html>
<head> 
 <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../css/font-awesome.min.css" rel="stylesheet" />
	<link href="css/custom.css" rel="stylesheet" />
</head>
<body>
<div id="wrapper" class="active">

<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="Dashboard.php">Dashboard</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="../profile.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                <li class="divider"></li>
                <li><a href="../admin/login.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>                


    <div class="navbar-default sidebar" role="navigation">                  
        <div class="sidebar-nav">
          <ul class="nav" id="side-menu">   
                   <li>
                    <a href="dashboard.php"><i class="fa fa-dashboard fa-fw"></i> <span class="ttspan-fill">Dashboard</span></a>
                </li>
                
                <li>
                    <a href="Users.php"><i class="fa fa-users fa-fw"></i> <span class="ttspan-fill">Users</span></a>
                </li>
				
                
				
                <li>
                    <a href="Add_product.php"><i class="fa fa-shopping-cart fa-fw"></i></i> <span class="ttspan-fill">Product</span></a>
                </li>
				
                <li>
                    <a href="sectionviw.php"><i class="fa fa-tasks fa-fw"></i> <span class="ttspan-fill">Section</span></a>
                </li>
                <li>
                    <a href="../login/signup.php"><i class="fa fa-tasks fa-fw"></i> <span class="ttspan-fill">Signup</span></a>
                </li>
                <li>
          <a href="../login/login.php"><i class="fa fa-comments fa-fw"></i> <span class="ttspan-fill">LogOut</span></a>
          <li><a href="../index.php">الصفحة الرئيسية<i class="fa-solid fa-house"></i></a></li>
      </li>
            </ul>
        </div>
    </div>     
</nav>  
