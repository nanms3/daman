<?php
 include ('file/header.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .notification{
        width: 1000px;
        height:50px;
        background-color: wheat;
        border: 2px  solid red;
        margin: 40px;
        padding:10px;
        font-size: 40px;
        color: black;
        text-align: center;
    }
    </style>
</head>
        <body>
</body>
</html>
<main>
<?php
if(isset($_GET['btn_search'])){//الكلمات اللتي توجد في البحث 
    $search=$_GET['search'];
    $query ="SELECT * FROM product WHERE pro_descrip  LIKE '%$search %' 
    or pro_name LIKE '%$search%'
    OR id LIKE '%$search%' 
    OR pro_price LIKE'%$search%'
    OR pro_section LIKE'%$search%'
    ";
    // $result =mysqli_query($conn,$query);
    $result=$conn->prepare($query);//ليس مهم للتجربه فقط
    $result=$conn->query($query);
    // if(mysqli_num_rows($result)>0){
        // if($query->rowcount($result)>0){
        $result->execute();
            while ($row=$result->fetch()){

                
            echo '
       
        <div class="product">
            <!-- img  -->
            <div class="product_img">
            <img src="controlpanel/uplaud//'.$row['pro_img'].'">
            <span class="unvailable">'.$row['pro_unv'].'</span>
                <a href=""></a>

        </div>
        <!-- section -->
        <div class="product_section"><a href="">'.$row['pro_section'].'</a>
        </div>
        <!-- name -->
        <div class="product_name"><a href="">'.$row['pro_name'].'</a>
        </div>
        <!-- price -->
        <div class="product_price"><a href="">'.$row['pro_price'].' &nbsp;السعر</a>
        </div>



        
        <!-- description -->
        <div class="product_description"><a href="detalis.php"><i class="fa-solid fa-eye"></i>لتفاصيل المنشئه اضغط هنا</a></div>

        <!-- quantity -->   
     <!-- submit -->
        <div class="submit"><a href="about.php">
            <button class="addto_cart" type="submit" name="">
                للتفاصيل اكثر
                </button>
        </a>
    </div>

    </div>';
        }
    }
    else{
        echo '<div class="notification">المنشئه الذي تبحث عنها غير متوفر حاليا</div>';
    }
?>
 </main>  
<?php
 include('file/footer.php');
 ?>