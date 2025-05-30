<?php 
session_start();
// if(!isset($_SESSION['id'])){
//     header("Location:../admin/login.php");
//     exit();
// }
require("heder.php");
require("../include/connected.php");
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><i class='fa fa-dashboard'></i> Dashboard</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <br>
        
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-shopping-cart fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">
											<?php
											$sql='select * from product';
											$q=$conn->prepare($sql);
											$q->execute();
											echo $q->rowcount();
											?>
											</div>
                                            <div>المنشأت</div>
                                        </div>
                                    </div>
                                </div>
                                                 
                             <a href="Add_product.php">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
       
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">
                                <?php
											$sql='select * from users ';
											$q=$conn->prepare($sql);
											$q->execute();
											echo $q->rowcount();
											?>
											
                                        </div>
                                        <div>Users</div>
                        </div>
                    </div>
                </div>
<!---->             <a href="Users.php">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        
        
						
        
					<div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <!-- <i class="fa fa-comments fa-5x"></i> -->
                            <i class="fa fa-tasks fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">
                                <?php
											$sql='select * from section';
											$q=$conn->prepare($sql);
											$q->execute();
											echo $q->rowcount();
											?>
											</div>
           
	                           <div>section</div>
                        </div>
                    </div>
                </div>
<!---->         <a href="sectionviw.php">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
			
					<div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comments fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">
							    <?php
											$sql='select * from car';
											$q=$conn->prepare($sql);
											$q->execute();
											echo $q->rowcount();
											?>
											</div>
		                          <div>Massigs</div>
                        </div>
                    </div>
                </div>
<!---->             <a href="car.php">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
		</div>
    <!-- /.row -->
  
</div>         
</div>

<script src="../js/jquery-3.1.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>