<?php include('partials-front/menu.php');?>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
<?php 
//display all the categories that are active
//sql query
$sql = "SELECT * FROM t_categories  WHERE active='Yes'";
//exceute the query
$res = mysqli_query($conn, $sql);
//count rows
$count =  mysqli_num_rows($res);
//check whther categories availble or not
if ($count >0) { 
    //category available
    while ($row=mysqli_fetch_assoc($res)) { 
        //get the values
        $id=$row['id'];
        $title = $row['title'];
        $image_name = $row['image_name']
        ?>
        
                            <a href="category-foods.html">
                                <div class="box-3 float-container">
                                    <?php
                                    if ($image_name == ""){
                                        //image not availble
                                        echo "<div class='error'> image not found.</div>";
                                    }
                                    else{
                                        //image availble 
                                        ?>
                                         <img src="<?php echo SITEURL;?>/images/category/<?php echo $image_name;?>" alt="Pizza" class="img-responsive img-curve">

                                        <?php
                                    }
                                    ?>
                                   
                                    <h3 class="float-text text-white"><?php echo $title;?></h3>
                                </div>
                                </a>


        <?php
    }
}else{
    // category not availble
    echo "<div class='error'> category not found.</div>";
}

?>
         
            

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->


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