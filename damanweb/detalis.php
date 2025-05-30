<?php
include('file/header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تفصيل المنتج</title>
</head>
<style>
    main{
        display:flex;
        flex-wrap: wrap;
    }
    .container{
        width:90px;
        height: auto;
        margin:20px auto;
        border-radius:8px;
    }
    .product_img{
        float:left;
        display:flex;
        flex-wrap:wrap;
        margin-bottom:20px;
    }
    .product_img img{
        width: 400px;
        height: 400px;
        margin-left:40px;
        margin-bottom:20px;
    }
    .product_info{
        float:right;
        width: 400px;
        height: 400px;
        text-align:center;
        font-size:20px;
        margin-right:50px;
        padding:10px 10px;
        margin-top: 30px;
    }
    .product_title{
        margin:10px 0;
    }
    .product_price{
        color:#e67e22;
        margin:10px 0;
    }
    .product_description{
        font-size:16px;
        line-height: 1.5;
    }
    .add_cart{
        width:150px;
        height: 35px;
        margin-left: 30px;
        padding:10px 10px;
        background-color:#fff;
        border-radius: 5px;
    }
    .add_cart :hover{
        background-color:#e67e22;
    }
    .recently_added{
        float:right;
        width:30px;
        margin-top:30px;
        border-radius:8px;
        padding:10px 10px;
        box-shadow: 0 5px 10px rgba(0,0,0,1,0);
    }
    .added_img img {
        float:right;
        margin:10px 10px;
        width:70px;
        height:70px;
        margin-right: 5px;
        border-radius: 10px;
    }
    .comment_info{
        float:left;
        width:50%;
        height:auto;
        margin:20px 10px;
        box-shadow:0 2px 2px rgba(0,0,0,1,0);
    }
    h5{
        font-size: 20px;
        margin-top: 20px;
        text-align: center;
        color:black;
    }
    textarea{
        text-align: center;
        width:80%;
        margin-top: 20px;
        margin-left: 50px;
        margin-bottom: 10px;
        padding: 10px;
        border:1px solid #ccc;
        border-radius: 10px;
        height: 50px;
    }
    .add_comment{
        width:100px;
        height: 35px;
        margin-left: 40px;
        padding: 10px 10px;
        background-color:#fff;
        border-radius: 5px;
    }
    .add_comment :hover{
        background-color: #e67e22;
    }
    .comments{
        margin-top: 10px;
    }
    .comment{
        color:black;
        font-size: larger;
        margin:5px 5px;
        text-align: center;
        padding:10px;
        background-color:#fff;
        border: 1px solid #ddd;
        margin-bottom: 10px;
        border-radius: 5px;
        overflow: hidden;
        text-overflow: ellipsis
    }



</style>
<body>
    <main>
        <?php
        
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            $query ="SELECT *FROM product";
            // $row=mysqli_fetch_assoc($result);
            // $result = $conn->prepare($query);
            $result=$conn->query($query);
            $row=$result->fetch();
        }
        ?>
        <!-- start img-->
        <div class="container">
            <div class="product_img">
                <img src="uploads/img/<?php echo $row['pro_img'];?>">
            </div>
                <!-- end img-->
                <!-- start information-->
                <div class="product_info">
                    <h1 class="product_title"><?php echo $row['pro_name']?></h1>
                    <h2 class="product_price"><?php echo $row['pro_price']?> &nbsp; الموقع</h2><br>
                    <h3><?php echo $row['pro_size'];?> &nbsp; المقسات المتوفره</h3>
                    <h4 class="product_description">تفاصيل المنتج</h4>
                    <P><?php echo $row['pro_descrip'];?> </P>
                    <!-- quantity -->
            <div class="qty_input">
                <button class="qty_count_mins">-</button>
                <input type="number" id="quantity" name="" value="1" min="0" max="10">
                <button class="qty_count_add">+</button>
            </div>   <br>

            <!-- submit-->
                <div class="submit"><a href="">
                    <button class="add_cart" try="sybmit" name="">ارسال 

                    </button>
                </a>
                </div>
                </div>
        </div>
    </main>
    <hr>
    <!--start recently added المنتجات الحديثه-->
    <div class="container">
        <div class="recently_added">
            <h4>منتجات حديثه</h4>
            <?php
            $query="SELECT * FROM product WHERE id='$id' ORDER BY rand() LIMIT 3";
        // $result=mysqli_query($conn,$query);
        // while($row=mysqli_fetch_assoc($result)){
            $result=$conn->query($query);
            while($row=$result->fetch()){  
            // while($row=mysqli_fetch_assoc($result));{
            ?>
            <div class="added_img"><a href="detalos.php?id=<?php echo $row['id']?>">
                <img src="uploads/img//<?php echo $row['pro_img'];?>">
                
            </a>
        </div>
        <?php
            }
        ?>
        </div>
        <!--end recently added المنتجات الحديثه-->
        <!--start comment-->
        <?php
        //add comment

        ?>
        <din class="comment_info">
            <h5>هل تود تقييم المنتج</h5>
            <form action="" method="post">
                <textarea name="comment" placeholder="قيم هذا المنتج من فضلك" require></textarea>
                <button class="add_comment" type="submit" name="add_comment">ارسال</button>
            </form>
            <h5>تييمات العملاء</h5>
            <div class="comments">
            <div class="comment">المنتج ممتاز</div>
            <div class="comment">المنتج ممتاز</div>
            <div class="comment">المنتج ممتاز</div>
            </div>
        </din>
        <!--end comment-->
    </div>

    

</body>
</html>
