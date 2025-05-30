<?php
session_start();
require("../include/connected.php");
if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		if(isset($_POST['save']))
		{
			header("location:login.php");
			$Newuser= $_POST['username'];
			$NewEmail= $_POST['useremail'];
			$Newphon= $_POST['phon'];
			$NewPass = $_POST['password1'];
            if(!empty($Newuser))
			{
				if(!empty($NewEmail)||!empty($Newphon))
				{
					$typeEmail=array("gmail.com");
					$ext=explode("@",$NewEmail);
                    $ext=strtolower(end($ext));
					if(in_array($ext,$typeEmail)||!empty($Newphon))
				    {
		if($NewPass===$_POST["password2"]){
			$pass=sha1($_POST['password1']);	//تشفير كلمة المرور
			$sql ="INSERT  INTO users (UserName,Email,Password,phon) values(:name,:email,:pass,:phon)";
			$query=$conn->prepare($sql);//تغربل المدخلات الا تكون رموز
            $query->execute(array("name"=>$_POST['username'], "email"=>$_POST['useremail'], "pass"=>$pass ,"phon"=>$_POST['phon']));//ارسال القيم الى قاعدة البيانات
            $result=$query->rowcount();//عدد الصفوف المتئثره
		}
	}else $errors['errorEmail']="<span style='color:red;'>Write coreact Email @</span>";
}
else $errors['emptyemail']="<span style='color:red;'>Enter Email</span>";
}
else $errors['emptyname']="<span style='color:red;'>Enter Name</span>";
}
}
?>

<!-- Registration Form -->
<link rel="stylesheet" href="stylesignup.css">
<main class="wrapper">
    <section> 
        <form action="" method="post"> 
            <h1>Sign Up</h1>
            
            <div class="input-box">
                <label for="username" class="visually-hidden"></label>
                <input type="text" name="username" id="username" placeholder="Username" required="required">
                <?php if(isset($errors['emptyname'])) echo $errors['emptyname'];?>
            <i class="bx bxs-user"></i>
        </div>
    <div class="input-box">
        <i class="bx bxs-envelope"></i>
        <label for="email"  class="visually-hidden"></label>
        <input type="email" id="email" name="useremail"  placeholder="Enter Your Email ">
        <?php if(isset( $errors['emptyemail'])) echo $errors['emptyemail'];?>
        <?php if(!empty( $errors['errorEmail'])) echo $errors['errorEmail'];?>
        <span id="emailError" class="error"></span><br>
    </div>
    <div class="input-box">
        <i class="bx bxs-lock-alt"></i>
        <label for="password"  class="visually-hidden"></label>
        <input type="password" id="password" name="password1" placeholder="Enter Your password" required="required">
        <span id="passwordError" class="error"></span><br>
    </div>
    <div class="input-box">
        <i class="bx bxs-lock-alt"></i>
        <label for="password"  class="visually-hidden"></label>
        <input type="password" id="password" name="password2"  placeholder="Return Your password" required="required">
        <span id="passwordError" class="error"></span><br>
    </div>
    <div class="input-box">
                <label for="phon" class="visually-hidden"></label>
                <input type="phon" name="phon" id="phon" placeholder="phon" required="required">
                <?php if(isset($errors['phon'])) echo $errors['phon'];?>
            <i class="bx bxs-user"></i>
        </div>
        <div class="remember-forgot">
            <label >
                <input type="checkbox" name="remember" id="remember"onclick="goFurther()">Remember me 
            </label>
            <a href="#">FORGOT Password</a>
        </div>
        <button type="submit" class="btn" name="save">Sing Up</button>
        <footer class="register-link">
            <p>I have an account <a href="login.php">login</a></p>
        </footer>
    </form> 
    </section>   