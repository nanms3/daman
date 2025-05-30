 <?php
 include('file/header.php');
 ?>

    <!--product start-->
    <main>
        <?php
        $query="SELECT * FROM product";
        // $result=mysqli_query($conn,$query);
        // while($row=mysqli_fetch_assoc($result)){
            $result=$conn->query($query);
            while($row=$result->fetch()){    
        ?>
        
        <div class="product">
            <!-- img  -->
            <div class="product_img">
                <img src="controlpanel/uplaud/<?php echo $row['pro_img'];?>">
                <span class="unvailable"><?php echo $row['pro_unv'];?></span>
                <a href=""></a>

            </div>
            <!-- section -->
            <div class="product_section"><a href=""><?php echo $row['pro_section'];
             ?></a>
            </div>
            <!-- name -->
            <div class="product_name"><a href=""><?php echo $row['pro_name']?></a>
            </div>
            <!-- price -->
            <div class="product_price"><a href="">العنوان : <?php echo $row['pro_price'];?>&nbsp;</a>
            </div>

            <!-- description -->
            <div class="product_description"><a href="detalis.php"><i class="fa-solid fa-eye"></i>لتفاصيل المنشئه اضغط هنا</a></div>

            <!-- quantity -->
            <!-- <div class="qty_input">
                <button class="qty_count_mins">-</button>
                <input type="number" id="quantity" name="" value="1" min="0" max="10">
                <button class="qty_count_add">+</button>
            </div>   <br> -->
            <!-- submit -->
            <div class="submit"><a href="about.php">
                <button class="addto_cart" type="submit" name="">
                   للتفاصيل والاستفسار اكثر
                </button>
            </a>
        </div>

        </div>
        <?php
        }
        ?>
    </main>    
    <!--produt end-->
    <?php
 include('file/footer.php');
 ?>