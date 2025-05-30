<?php
session_start();
require("../controlpanel/heder.php");
require("../include/connected.php");

?>
 <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../css/font-awesome.min.css" rel="stylesheet" />
	<link href="css/custom.css" rel="stylesheet" />
    <div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><i class='fa fa-dashboard'></i> Dashboard</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        
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
                                            <div>Product</div>
                                        </div>
                                    </div>
                                </div>
                                                 
                <!---->     <a href="../controlpanel/Add_product.php">
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
											$sql='select * from users';
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
<!---->             <a href="company.php">
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
											$sql='select * from image';
											$q=$conn->prepare($sql);
											$q->execute();
											echo $q->rowcount();
											?>
											</div>
		                       <div>image</div>
                        </div>
                    </div>
                </div>
<!---->             <a href="image.php">
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
		                          <div>car</div>
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
						
						
					<div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comments fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">
							      <?php
											$sql='select * from comment_time';
											$q=$conn->prepare($sql);
											$q->execute();
											echo $q->rowcount();
											?>
											</div>
		                       <div>comment_time</div>
                        </div>
                    </div>
                </div>
                <a href="comment_time.php">
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