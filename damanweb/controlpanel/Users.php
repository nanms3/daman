<?php 
session_start();
require("heder.php");
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><i class='fa fa-users'></i>USERS</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

  <?php
    if(isset($_GET['action'],$_GET['id']) and intval($_GET['id'])>0)      
    {
		switch($_GET['action'])
	{
			case 'delete':		
			$sql='delete from users where ID=:x1';			
			$q=$conn->prepare($sql);
			$q->execute(array("x1"=>$_GET["id"]));
			IF($q->rowcount()==1)
				echo "<script>alert('one row delete')</script>";
			break;
						case "achecks":
			$sql='update users set Role="admin" where ID=:x1';			
			$q=$conn->prepare($sql);
			$q->execute(array("x1"=>$_GET["id"]));
			IF($q->rowcount()==1)
				echo "<script>alert('one row check')</script>";
			break;

			case "inachecks":
			$sql='update users set Role="user" where ID=:x1';			
			$q=$conn->prepare($sql);
			$q->execute(array("x1"=>$_GET["id"]));
			IF($q->rowcount()==1)
				echo "<script>alert('one row Incheck')</script>";
			break; 

			case "active":
			$sql='update users set Active=1 where ID=:x1';			
			$q=$conn->prepare($sql);
			$q->execute(array("x1"=>$_GET["id"]));
			IF($q->rowcount()==1)
				echo "<script>alert('one row Active')</script>";
			break;
			
			
			case "inactive":
			$sql='update users set Active=0 where ID=:x1';			
			$q=$conn->prepare($sql);
			$q->execute(array("x1"=>$_GET["id"]));
			IF($q->rowcount()==1)
				echo "<script>alert('one row Inactive')</script>";
			break;
			

			
			
		// 	case"edit":
		// 	$sql='select * from users where ID=:x1';
		// 	$q=$con->prepare($sql);
		// 	$q->execute(array("x1"=>$_GET['id']));
		//     if($q->rowcount()>0)
		//    {
		// 	$row=$q->fetch();
      	// 	   var_dump($row);		
		// }
		break;
		default :echo"Error";break;
	}
		
	}
	//<!--==========================================================================================-->
	//<!--==========================================================================================-->
	//<!--==========================================================================================-->
	//<!--==========================================================================================-->
	// var_dump($_POST);
	if($_SERVER['REQUEST_METHOD']=="POST"){	

	if(empty($_POST["name"]))
          $errors["name"]="<span style='color:red'><b>enter: name of user</b></span>";
	//valdation
	//save file

	
		else if(empty($_POST["password"]))
          $errors["password"]="<span style='color:red'><b>enter: password of user</b></span>";
	//valdation
	//save file
	else{//insert into tbl==>db
	        $sql='insert into users(UserName,Password,phon,Email) values (:x1,:x2,:x3,:x4)';
			$q=$conn->prepare($sql);
			$q->execute(array("x1"=>$_POST['name'],"x2"=>md5($_POST['password']),"x3"=>$_POST['phon'],"x4"=>$_POST['Email']));
			if($q->rowcount()>0)
				echo "<h3 class='alert alert-success'>one row inserted</h3>";
			else
				echo "<h3 class='alert alert-danger'>Error</h3>";
		}
			//if(empty($_POST["name"]))
			  //$errors["name"]="<span style='color:red'><b>Enter: name of user></b></span>";
			 //else if(empty($_POST["password"]))
			   //$errors["password"]="<span style='color:red'><b>Enter: password of user></b></span>";
			 
			// else if(!empty($_POST["name"]))
  
			  //{
			//$sql="insert into user(name,password) values (:x1,:x2)";
			//$q=$con->prepare($sql);
			//$q->execute(array("x1"=>$_POST["name"] ,"x2"=>$_POST["password"]));
			//if($q->rowcount()>0){
			//echo "<h3 class='alert alert-success'>one row inserted</h3>";}
			
			//else
					
			//echo "<h3 clss='alter alter-danger'>Error</h3>";
				
				//echo $q->rowcount();
			
			 
			
		  //}
		  
		  
		  
		  			// if(empty($_POST["userid"])){			  
			// $sql="insert into user(name,password ) values (:x1,:x2)";
				// $q=$con->prepare($sql);
				// $q->execute(array("x1"=>$_POST["name"] ,"x2"=>$_POST["password"]));
				// if($q->rowcount()>0)
				// echo "<h3 class='alert alert-success'>one row inserted</h3>";
				// //	echo $q->rowcount();
				// else
					// echo  "<script>alert('Error');</script>";
			// }

			// else{
			  
			// $sql='update user set name=:x1,password=:x2 where userid=:x3';			
			// $q=$con->prepare($sql);
			// $q->execute(array("x1"=>$_POST["name"] ,"x2"=>$_POST["password"],"x3"=>$_POST["userid"]) );
			// IF($q->rowcount()==1)
				// echo "<script>alert('one row Inactive')</script>";
			
			  
		  // }			 
		  
		  
	}
	?>
	<!--============================================================================-->
	<!--============================================================================-->
	<!--============================================================================-->
	<!--============================================================================-->




	<div id="fullscreen_bg" class="fullscreen_bg">
 <form class="form-signin" method="post">
	<div class="container" style='width:970px'>
    <div class="row">
        <div class="col-12-sx">
        <div class="panel panel-default">
        <div class="panel panel-primary">
        
				<h3 class="text-center"><i class='fa fa-plus-circle'></i> Add New User</h3>
        
        <div class="panel-body">   
        
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><span class="glyphicon glyphicon-tags"></span>
				</span>
				     <!--//انشاء ال hidden لجعل القيمه مخفية لمعرفه اننا نريد التعديل من عمود ال id  -->
				<input type="hidden"  name="userid"  value="<?php if(isset($row)) echo $row['userid'];?>"/>
						
				<div>
				<?php if(isset($errors["userid"])) echo $errors["userid"];?>
				</div>
				<input type="text" class="form-control" name="name" placeholder="Name" value="<?php if(isset($row)) echo $row['name']; ?>" />
			</div>  
			<?php if(isset($errors["name"])) echo $errors["name"];?>
		</div>
		
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><span class="glyphicon glyphicon-edit"></span></span>
				<input type="password" name="password" class="form-control"  placeholder="password"<?php if(isset($row)) echo $row['password'];?> />
			</div>
		<?php if(isset($errors["password"])) echo $errors["password"];?>
		</div>
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><span class="glyphicon glyphicon-edit"></span></span>
				<input type="phon" name="phon" class="form-control"  placeholder="phon"<?php if(isset($row)) echo $row['phon'];?> />
			</div>
		<?php if(isset($errors["phon"])) echo $errors["phon"];?>
		</div>
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><span class="glyphicon glyphicon-edit"></span></span>
				<input type="Email" name="Email" class="form-control"  placeholder="Email"<?php if(isset($row)) echo $row['Email'];?> />
			</div>
		<?php if(isset($errors["Email"])) echo $errors["Email"];?>
		</div>
		      <input class="btn btn-lg btn-primary btn-block" type="submit" value='Add' name='save'>
      </div>
       </div>
        </div>
    </div>
</div>
</form>
</div> 



<div class="row">
        <div class="col-xs-12">
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-users fa-fw"></i> Users
                    <div class="pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                Actions
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu">
                                <li><a href="#">Action</a>
                                </li>
                                <li><a href="#">Another action</a>
                                </li>
                                <li><a href="#">Something else here</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

	     <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="table-responsive">
                                <table  class="table table-bordered table-hover table-striped" style='text-align:center' >
                                    <thead>
                                      <tr>
											<th>Id</th>
											<th>Name</th>
											<th >password</th>
											<th >phon</th>
											<th >Email</th>
											<th >Adddate</th>
											<!-- <th >Role</th> -->
											<!-- <th >Active</th> -->
											<th style='text-align:left'> Actions </th>
                                      </tr>
                                    </thead>
                                    <tbody>
										<?php
										$sql='select * from users';
										$q=$conn->prepare($sql);
										$q->execute();
										if($q->rowcount())
										{
										foreach($q->fetchall() as $col)
										{
										$id=$col["ID"];
										$name=$col["UserName"];
										$password=$col["Password"];
										$phon=$col["phon"];
										$Email=$col["Email"];
										$adddate=$col["AddDate"];
										$active=$col["Active"];
										$role=$col["Role"];
										echo "<tr>";
										echo "<td>$id</td>";
										echo "<td>$name</td>";
										echo "<td>$password</td>";
										echo "<td>$phon</td>";
										echo "<td>$Email</td>";
										echo "<td>$adddate</td>";
										// echo "<td>$role</td>";
										// echo "<td>$active</td>";
										echo "<td>";
										echo "<a  title='delete' class='btn btn-danger' onclick=\"return confirm('are you sure ???')\" href='?action=delete&id=$id'><i class='fa fa-trash'></i></a> ";
										if($col['Role']=='admin')
										 echo "  <a title='user' class='fa fa-cog' href='?action=inachecks&id=$id'><i class='fa fa'></i></a>   ";	
										 else 
										echo"  <a title='admin'  class='fa fa-user ' href='?action=achecks&id=$id'><i class='fa fa'></i></a>   ";
										  if($col['Active']==1)
										 echo "<a title='inactive' class='btn btn-warning' href='?action=inactive&id= $id'><i class='fa fa-close'></i></a> ";	
										 else 
										echo  "<a title='active' class='btn btn-primary' href='?action=active&id= $id'><i class='fa fa-check'></i></a> ";
									   echo "</tr>";
										}
										}
										?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>         
</div>

<script src="../js/jquery-3.1.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>
<script>
$(function () {
    'use strict';
$('#delete').click(function(){
    return confirm('Are You Sure!!!');
});
});
</script>
</body>
</html>