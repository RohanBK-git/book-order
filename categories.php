<?php
    include('partials-front/menu.php');
?>



    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Categories</h2>

            <?php

                //display all categories that are available
                $sql = "SELECT * FROM tbl_category WHERE active='Yes' ORDER BY title";

                //execute the query
                $res = mysqli_query($conn, $sql);

                //count the rows 
                $count = mysqli_num_rows($res);

                //check whether categories available or not 
                if($count>0)
                {
                    //categories availiable
                    while($row = mysqli_fetch_assoc($res))
                    {
                        //get the values
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];

                        ?>
                            <a href="<?php SITEURL;?>category-book.php?category_id=<?php echo $id;?>">
                                <div class="box-3 float-container">

                                <?php
                                    if($image_name=="")
                                    {
                                        //image not avaiiable
                                        echo "<div class = 'error'> Image not available</div>";

                                    }
                                    else
                                    {
                                        ?>

                                            <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="category" class="img-category img-curve">
                                    
                                        <?php
                                    }
                                ?>
                                    <h3 class="float-text text-white"><?php echo $title;?></h3>
                                </div>
                            </a>
                        <?php
                    }

                }
                else
                {
                       //category not avaialble
                       echo "<div class = 'error'> Category not found</div>";
                }

            ?>

            

            

            

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->


<?php
    include('partials-front/footer.php');
?>