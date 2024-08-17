<?php include('partials-front/menu.php');?>
    <!-- Navbar Section Ends Here -->

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="food-search.html" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php
                    //create sql query to display categories from database
                    $sql = "SELECT * FROM t_categories WHERE active='Yes' AND  featured='Yes' LIMIT 3"; 
                    
                    //execute the query
                    $res = mysqli_query($conn, $sql);  

                    if ($res) {
                        $count =  mysqli_num_rows($res);//get number of rows in result set

                        if ($count > 0) {
                            //categories available
                            while ($row = mysqli_fetch_assoc($res)) {
                                //get the value like id ,title, image, image_nam
                                $id =  $row['id'];
                                $title =  $row['title'];
                                $image_name =$row['image_name'];
                                ?>
                                     <a href="category-foods.html">
                                <div class="box-3 float-container">
                                    <?php
                                    //check whether image is available or not 
                                            if($image_name=="")
                                            {
                                                //Display Message
                                                echo "<div class ='error'>Image not Available</div";
                                            }   else{
                                                //image is available so show it
                                                ?>
                                                <img src="<?php echo SITEURL;?>/images/category/<?php echo $image_name;?>" alt="<?php echo $title;?>" class="img-responsive img-curve">
                                                <p class="text-center wrapper" ><?php echo $title; ?></p> <!-- Show the title below the image -->
                                                <?php
                                            }                                 
                                    ?>
                                </div>
                                </a>
                            <?php
                        }}

                    }else{
                        //categories is not available
                        echo "<div class ='error'>Categoriy not added.</div>";
                    }
            ?>

        

        

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php
            //getting foodds from database that are active and featured
            //sql query
            $sql2="SELECT * FROM t_food WHERE active='Yes' AND featured='Yes' LIMIT 6";
            
            //execute the query
            $res2=mysqli_query($conn,$sql2);
            //count rows
            $count2=mysqli_num_rows($res2);
            //check food availble or not
            if ($count2 >0) {
                //food availble 
                while($row2=mysqli_fetch_assoc($res2)) {
                    //get all values
                    $id=$row2['id'];
                    $title=$row2['title'];
                    $price=$row2['price'];
                    $description=$row2['description'];
                    $image_name=$row2['image_name'];
                    ?>
                                    <div class="food-menu-box">
                                <div class="food-menu-img">
                                    <?php
                                    //check whether image availble or not
                                    if($image_name==""){
                                        //image  is not available so display default.png image
                                                echo "<div class='error'>Image Not Available.</div>";
                                    }else{
                                        //image availble
                                        ?> <img src="<?php echo SITEURL;?>/images/category/<?php echo $image_name;?> " alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                        </div>
                                        <?php
                                    }
                                    
                                    ?>

                                   

                                <div class="food-menu-desc">
                                    <h4><?php echo $title;?></h4>
                                    <p class="food-price"><?php echo $price;?></p>
                                    <p class="food-detail">
                                    <?php echo $description;?>
                                    </p>
                                    <br>

                                    <a href="order.html" class="btn btn-primary">Order Now</a>
                                </div>
                            </div>

                    <?php
                }

            }else{
                // food not available
                echo "<div class='error'>Food not availble</div>";
            }

            ?>

           
            

           

            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="#">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

    <!-- social Section Starts Here -->
    <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png"/></a>
                </li>
            </ul>
        </div>
    </section>
    <!-- social Section Ends Here -->

    <?php include('partials-front/footer.php');?>