<?php
session_start();
	require("../include/connected.php");	
	if($_SERVER['REQUEST_METHOD']=='POST')
	{	
		$query= "SELECT * from users where UserName=:name and Password=:pass and Active=1";
		$query= $conn->prepare($query);
		$query->execute(array("name"=>$_POST['username'],"pass"=>sha1($_POST['password'])));

		$result= $query->rowcount();
		if($result==1)
		{
			$row= $query->fetch();
			if($row['Role']=='admin')
			{
				setcookie("user",$_POST['username'],time()+3600*24);

				$_SESSION['user']= $_POST['username'];
				$_SESSION['role']= 'admin';

				header("location:../controlpanel/dashboard.php");
				exit();

			}else{
				setcookie("user",$_POST['username'],time()+3600*24);

				$_SESSION['user']= $_POST['username'];
				$_SESSION['role']= 'user';

				header("location:../index.php");
				exit();
			}
		}else 
			echo "<script>alert('Wrong Username or Password');</script>";
		}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>login</title>
	<link rel="stylesheet" href="styleiogin.css">
</head>
<body>
<main class="wrapper">
	<section>
				<form class="btn-Container" method="post" style="margin: inherit;margin-top: 80px;">
							   <h1>Log In</h1>
							   <div class="input-box">
								   <label for="username" class="visually-hidden"></label>
							   <i class="bx bxs-user"></i>
                            <input type="text" name="username" id="username" placeholder="Username" required>
                        </div>
						<div class="input-box">
                    <label for="password" class="visually-hidden"></label>
                    <i class="bx bxs-lock-alt"></i>
                    <input type="password" name="password" id="pass" placeholder="Password" required>
                </div>
				<div class="remember-forgot">
					<label >
						<input type="checkbox" name="remember" id="remember">Remember me </label>
					<a href="#">FORGOT Password</a>
				</div>
				<button type="submit" class="btn " value='login' name='login'>Login</button>
				<!-- <input type="submit" id="btn" value='login' name='login'> -->
			   </form>
        </section>
        <footer class="register-link">
            <p>Dont have an account? <a href="signup.php">Sing UP</a></p>
        </footer>
    </main>

</body>
</html>