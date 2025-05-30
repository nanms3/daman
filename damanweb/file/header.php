<?php
include("./include/connected.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الصفحة الرئيسية للموقع</title>
<link rel="stylesheet" href="./style.css">
<!--start fontawesome-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!--end fontawesome-->

</head>
<body>
    <header>
        <!---start logo-->
        <div class="logo">
            <h1>ضمــــان للخدمـــــات الطبيــه</h1>
            <!-- <img src="img/shopping5.png">  -->
            <img src="img/bba7fc08-d102-47fe-85d9-a99bd88cdd6b.png"> 

        </div>
        <!---end lodgo-->
        <!---start search-->
        <div class="search">
            <div class="search_bar" >
                <form action="search.php" method="get">
                    <input type="text" class="search_input" name="search" placeholder="ادخل كلمة البحث">
                    <button class="button_search" name="btn_search">بحث

                    </button> 

                </form>

           </div>

        </div>

    </header>

        <!---start social-->
        <nav>
            <div class="social">
                <ul>
                    <li><a href="https://www.facebook.com/share/1UZpXm2omv/" target_blank><i class="fa-brands fa-facebook"></i></a> </li>
                    <li><a href="https://www.instagram.com/damanmedicalservice?igsh=YzljYTk1ODg3Zg==" target_blank><i class="fa-brands fa-instagram"></i></a> </li>
                    <li><a href="https://www.youtube.com/@Damanmedicalservice" target_blank><i class="fa-brands fa-youtube"></i></a> </li>
                    <li><a href="https://whatsapp.com/channel/0029Vb9vuJICcW4vcbqQS32C" target_blank><i class="fa-brands fa-whatsapp"></i></a> </li>
                    <li><a href="https://www.tiktok.com/@damanmedicalservice?_t=ZS-8wgZyRtyYWO&_r=1" target_blank><i class="fa-brands fa-tiktok"></i></a> </li>
  
                </ul>

            </div>
             <!---end social-->

             <!---start section-->
             <div class="section">
            <ul>
                <li><a href="index.php">الرئيسية</a></li>
            <?php
            $query="SELECT * FROM section";
            // $result=mysqli_query($conn,$query);
            $result=$conn->query($query);
            // while($row=mysqli_fetch_assoc($result)){
                while($row=$result->fetch()){
                    ?>
                                    <li>
                      <a href="search.php?btn_search=1&search=<?php echo urlencode($row['section_name']); ?>">
                            <?php echo $row['section_name']; ?>
                      </a>
                    </li>

   
            <?php
                }   
                ?>
            </ul>
            <a href="profile.php" class="profile">Profile</a>
             </div><!--end div section-->
            </nav>
            <!---end section-->
            
            <div class="last-post">
                <h4>مضاف حديثاً</h4>
        <ul>
            
            <?php
          $query="SELECT * FROM product ORDER BY id DESC LIMIT 2";
          $result=$conn->query($query);
          while($row=$result->fetch()){
          //   $result=mysqli_query($conn,$query);
          //   while($row=mysqli_fetch_assoc($result)){
          
          ?>
        
            <li><a href="search.php?btn_search=1&search=<?php echo urlencode($row['id']); ?>">
                <span class="span-img">
                    <img src="./controlpanel/uplaud/<?php echo $row['pro_img'];?>">
                </span>
            </a>
        </li>
        <?php
        }
        ?>
    <!-- 
        <li><a href="">
            <span class="span-img">
                <img src="img/shopping2.jpg">
            </span>
        </a>
    </li>
    
    <li><a href="">
        <span class="span-img">
            <img src="img/shopping3.jpg">
        </span>
    </a>
</li> -->
        </ul>
        

        <!--car start-->
        <div class="cart">
            <ul>
                <li>About : <a href="about.php"><i class="fa-solid fa-user"></i>
                </a></li>
                <!-- <li class="cart-icons"><a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
                    <span class="cart-count">5</span>
                </li> -->
            </ul>
        </div>

    </div>
