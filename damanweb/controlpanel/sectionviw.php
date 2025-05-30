<?php require("heder.php"); 
// if(!isset($_SESSION['id'])){
//     header("Location:../admin/login.php");
//     exit();
// }
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><i class='fa fa-tasks'></i>  Section</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
	<?php
		
		// var_dump($_GET);
		if(isset($_GET['action'],$_GET['id']) and intval($_GET['id'])>0){
			
			switch($_GET['action']){
				case 'delete':		
			$sql='delete from section where id=:x1';			
			$q=$conn->prepare($sql);
			$q->execute(array("x1"=>$_GET["id"]));
			IF($q->rowcount()==1)
				echo "<script>alert('one row delete')</script>";
			break;

				case 'edit':
				$sql='select * from section where id=:x1';
				$q=$conn->prepare($sql);
				$q->execute(array("x1"=>$_GET['id']));
				if($q->rowcount()>0)
				{
					$row=$q->fetch();
					//var_dump($row);
				}
				
				break;
				
				default:echo "No Action slected";break;
				
				
			}
			
		}
		
	// var_dump($_POST);
	if($_SERVER['REQUEST_METHOD']=="POST"){
			$ext=explode(".",$_FILES['logo']['name']);
		$a=end($ext);
		$b=$ext[0];
		$logo=$b.".".$a;
		
	// if(empty($_POST["compid"]))
	// if(empty($_POST["name"]))
    //       $errors["name"]="<span style='color:red'><b>enter: name of section</b></span>";
		
	// 	else if(empty($_POST["logo"]))
	// 	$errors["logo"]="<span style='color:red'><b>enter: imge of section</b></span>";
	
	// else{//insert into tbl==>db		
	 if(move_uploaded_file($_FILES['logo']['tmp_name'],"uplaud/$logo")){
	        $sql='INSERT into section(section_name,img) values (:x1,:x2)';
			$q=$conn->prepare($sql);
			$q->execute(array("x1"=>$_POST['name'],"x2"=>$logo));
			if($q->rowcount()>0)
				echo "<h3 class='alert alert-success'>one row inserted</h3>";
			else
				echo "<h3 class='alert alert-danger'>Error</h3>";
	}
	        else 
			{
			$sql='UPDATE section set section_name=:x1 ,img=:x2 where id=:x3';
			$q=$conn->prepare($sql);
			$q->execute(array("x1"=>$_POST['name'],"x2"=>$logo,"x3"=>$_POST['compid']));
			if($q->rowcount()>0)
			   echo "<h3 class='alert alert-success'>one row modify</h3>";        }
	}
	
	?>
	
	
	
	
	
	
 <div id="fullscreen_bg" class="fullscreen_bg"/>
 <form class="form-signin" method="post"  enctype="multipart/form-data">
	<div class="container" style='width:970px'>
    <div class="row">
        <div class="col-12-sx">
        <div class="panel panel-default">
        <div class="panel panel-primary">
        
		<h3 class="text-center"><i class='fa fa-plus-circle'></i> Add New Section</h3>
        
        <div class="panel-body">   
        
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><span class="glyphicon glyphicon-tags"></span>
				</span>
					<!--============================================================================-->
					<!--============================================================================-->

				                        <!--//انشاء ال hidden لجعل القيمه مخفية لمعرفه اننا نريد التعديل من عمود ال id  -->
				<input type="hidden"  name="compid"  value="<?php if(isset($row)) echo $row['id'];?>"/>
				<div>
				<?php if(isset($errors["compid"])) echo $errors["compid"];?>
				</div>	
					<!--============================================================================-->
					<!--============================================================================-->

				
				<input type="text" class="form-control" name="name" placeholder="Name" value="<?php if(isset($row)) echo $row['section_name']; ?>" />
			</div>  
			<?php if(isset($errors["name"])) echo $errors["name"];?>
		</div>
		
		
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><span class="glyphicon glyphicon-tags"></span>
				</span>
				<input type="file" class="form-control" name="logo" placeholder="Title" value="<?php if(isset($row)) echo $row['img']; ?>" />
			</div>
					<?php if(isset($errors["logo"])) echo $errors["logo"];?>

		</div>
		
			<input class="btn btn-lg btn-primary btn-block" type="submit" value='Save' name='save'>
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
                    <i class="fa fa-tasks fa-fw"></i> Section
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
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row">

				<div class="col-xs-12">
					<div class="table-responsive">
						<table class="table table-bordered table-hover table-striped" >
							<thead>
							<tr>
								<th>Id</th>
								<th>logo</th>
								<th>name</th>
								<th style='text-align:center'>Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$sql='select * from section ';
								$q=$conn->prepare($sql);
								$q->execute();
								if($q->rowcount())
								{
								foreach($q->fetchall() as $col)
								{
								$id=$col["id"];
								$name=$col["section_name"];
								$logo=$col["img"];
								echo "<tr>";
								echo "<td>$id</td>";
								echo "<td><img src='uplaud/$logo 'width=50px ></td>";
								echo "<td>$name</td>";
								echo "<td>";
								echo "<a title='Edit' class='btn btn-success' href='?action=edit&id=$id'><i class='fa fa-edit'></i></a> ";
								echo "<a title='delete' class='btn btn-danger'onclick=\"return confirm('are you sure ???')\" href='?action=delete&id=$id'><i class='fa fa-trash'></i></a> ";
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
$('#deletej').click(function(){
    return confirm('Are You Sure!!!');
});
});
</script>
</body>
</html>