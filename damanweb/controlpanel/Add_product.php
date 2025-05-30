<?php require("heder.php");
session_start();
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><i class='fa fa-tasks'></i> Product</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
	<?php
		
		// var_dump($_GET);
		if(isset($_GET['action'],$_GET['id']) and intval($_GET['id'])>0){
			
			switch($_GET['action']){
				case 'delete':		
			$sql='delete from product where id=:x1';			
			$q=$conn->prepare($sql);
			$q->execute(array("x1"=>$_GET["id"]));
			IF($q->rowcount()==1)
				echo "<script>alert('one row delete')</script>";
			break;
				
				case 'active':
					$sql='update product set pro_unv="تم العقد معاه" where id=:x1';
					$q=$conn->prepare($sql);
					$q->execute(array("x1"=>$_GET['id']));
					if($q->rowcount()==1)
				echo "<h3 class='alert alert-success'>one row ACtive</h3>";
				break;
				
				
				case 'inactive':
					$sql='update product set pro_unv="غير متفق عليه" where id=:x1';
			$q=$conn->prepare($sql);
			$q->execute(array("x1"=>$_GET['id']));
			if($q->rowcount()==1)
				echo "<h3 class='alert alert-success'>one row inACtive</h3>";
				break;
				
				
				case 'edit':
				$sql='select * from product where id=:x1';
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
			
		// 	if(empty($_POST["id"]))
		// 		if(empty($_POST["name"]))
		// 		$errors["name"]="<span style='color:red'><b>enter: name of product</b></span>";
		// }elseif(empty($_POST["description"])){
		// 	$errors["description"]="<span style='color:red'><b>enter: description of product</b></span>";
		// }else{//insert into tbl==>db
		// 	echo "<h3 class='alert alert-success'>one row inserted</h3>";
	
		
	 if(move_uploaded_file($_FILES['logo']['tmp_name'],"uplaud/$logo")){
	        $sql='insert into product(pro_name,pro_descrip,pro_img,pro_price,pro_size,pro_section) values (:x1,:x2,:x3,:x4,:x5,:x6)';
			$q=$conn->prepare($sql);
			$q->execute(array("x1"=>$_POST['name'],"x2"=>$_POST['description'],"x3"=>$logo,"x4"=>$_POST['price'],"x5"=>$_POST['size'],"x6"=>$_POST['section']));
			if($q->rowcount()>0)
				echo "<h3 class='alert alert-success'>one row inserted</h3>";
			else
			echo "<h3 class='alert alert-danger'>Error</h3>";
	}
	else 
			{
			$sql='UPDATE product SET pro_name=:x1 ,pro_descrip=:x2 ,pro_img=:x3 , pro_price=:x4 ,pro_size=:x5,pro_section=:x6 where id=:x44';
			$q=$conn->prepare($sql);
			$q->execute(array("x1"=>$_POST['name'],"x2"=>$_POST['description'],"x3"=>$logo,"x4"=>$_POST['price'],"x5"=>$_POST['size'],"x6"=>$_POST['section'],"x44"=>$_POST['userid']));
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
        
		<h3 class="text-center"><i class='fa fa-plus-circle'></i> Add New product</h3>
        
        <div class="panel-body">   
        
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><span class="glyphicon glyphicon-tags"></span>
				</span>
				<!--//انشاء ال hidden لجعل القيمه مخفية لمعرفه اننا نريد التعديل من عمود ال id  -->
				<input type="hidden"  name="userid"  value="<?php if(isset($row)) echo $row['id'];?>"/>
				<div>
					<?php if(isset($errors["userid"])) echo $errors["userid"];?>
				</div>					
				<input type="text" class="form-control" name="name" placeholder="Name" value="<?php if(isset($row)) echo $row['pro_name']; ?>" />
			</div>  
				<?php if(isset($errors["name"])) echo $errors["name"];?>
				</div>
	
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><span class="glyphicon glyphicon-tags"></span>
				</span>
				<input type="file" class="form-control" name="logo" placeholder="Title" value="<?php if(isset($row)) echo $row['pro_img']; ?>" />
			</div>
			<?php if(isset($errors["logo"])) echo $errors["logo"];?>
		</div>  
		<div class="form-group">
			<div class="input-group">				
					<span class="input-group-addon"><span class="glyphicon glyphicon-tags"></span>
				</span>
				<input type="text" class="form-control" name="price" placeholder="الموقع" value="<?php if(isset($row)) echo $row['pro_price']; ?>" />
			</div>  
			<?php if(isset($errors["name"])) echo $errors["name"];?>
		</div>  
		<div class="form-group">
			<div class="input-group">				
				<span class="input-group-addon"><span class="glyphicon glyphicon-tags"></span>
			</span>
			<input type="text" class="form-control" name="size" placeholder="size" value="<?php if(isset($row)) echo $row['pro_size']; ?>" />
			<?php if(isset($errors["name"])) echo $errors["name"];?>
		</div>  
	</div>

			<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><span class="glyphicon glyphicon-edit"></span></span>
				<input type="text" class="form-control" name="description" placeholder="description" value="<?php if(isset($row)) echo $row['pro_descrip']; ?>" />
			</div>
					<?php if(isset($errors["description"])) echo $errors["description"];?>
		</div>
		
	
	<div class="form-group">
		<div class="input-group">				
			<span class="input-group-addon"><span class="glyphicon glyphicon-tags"></span>
		</span>
		<select name='section'>
			<?php
				$sql='select * from section';
				$q=$conn->prepare($sql);
				$q->execute();
				if($q->rowcount()>0)
				{
					foreach($q->fetchall() as $row)
					{
						$id=$row['id'];
						$name=$row['section_name'];
						echo "<option value='$name' name='section'>$name</option>";
					}
				}
				if(isset($errors["name"])) echo $errors["name"];
				?>
			</select>
		</div>  
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
                    <i class="fa fa-tasks fa-fw"></i> Product
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
                                    <thead >
									<tr >
												<th>Id</th>
												<th>name</th>
												<th>img</th>
												<th>price</th>
												<th>size</th>
												<th>unv</th>
												<th>section</th>
												<th>description</th>
												<th style='text-align:center'>Actions</th>
									</tr>
								</thead>
								<tbody>
											<?php
											$sql='select * from product ';
											$q=$conn->prepare($sql);
											$q->execute();
											if($q->rowcount())
											{
											foreach($q->fetchall() as $col)
											{
											$id=$col["id"];
											$name=$col["pro_name"];
											$logo=$col["pro_img"];
											$adddate=$col["pro_price"];
											$description=$col["pro_descrip"];
											$pro_section=$col["pro_section"];
											$pro_size=$col["pro_size"];
											$pro_unv=$col["pro_unv"];
											echo "<tr>";
											echo "<td>$id</td>";    
											// echo "<td><img src=../uploads/img/$logo width=50px ></td>";
											echo "<td>$name</td>";
											echo "<td><img src='uplaud/$logo' width=50px ></td>";
											echo "<td>$adddate</td>";
											echo "<td>$pro_size</td>";
											echo "<td>$pro_unv</td>";
											echo "<td>$pro_section</td>";
											echo "<td backcolor=red >$description</td>";
											echo "<td>";
											echo "<a title='Edit' class='btn btn-success' href='?action=edit&id=$id'><i class='fa fa-edit'></i></a> ";
											echo "<a title='delete' class='btn btn-danger'onclick=\"return confirm('are you sure ???')\" href='?action=delete&id=$id'><i class='fa fa-trash'></i></a> ";
												if($col['pro_unv']=="تم العقد معاه")
												echo "<a title='inactive' class='btn btn-warning' href='?action=inactive&id=$id'><i class='fa fa-close'></i></a> ";	
												else 
											echo  "<a title='active' class='btn btn-primary' href='?action=active&id=$id'><i class='fa fa-check'></i></a> ";
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