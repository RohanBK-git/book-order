<?php
    include('partials-front/menu.php');
?>

    <!-- book sEARCH Section Starts Here -->
    <section class="book-search text-right">
        <div>
            
            <form action="<?php echo SITEURL;?>book-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for book.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- book sEARCH Section Ends Here -->

    <?php

        if(isset($_SESSION['order']))
        {
            echo $_SESSION['order'];
            unset ($_SESSION['order']);
        }

        if(isset($_SESSION['login']))
        {
            echo $_SESSION['login'];
            unset ($_SESSION['login']);
        }
    ?>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2>Categories</h2>
            <?php
                //create sql query to display categories from the database
                $sql = "SELECT * FROM tbl_category WHERE active='YES' AND featured='Yes' LIMIT 6";
                //exeute the query
                $res = mysqli_query($conn, $sql);
                //count the rows to check whether the category is available or not
                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    // categories available
                    while($row = mysqli_fetch_assoc($res))
                    {
                        //we need to get values like title, id, image_name
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>

                            <a href="<?php echo SITEURL; ?>category-book.php?category_id=<?php echo $id;?>">
                                <div class="box-3 float-container">

                                <?php
                                        //check whether image is available or not
                                    if($image_name == "")
                                    {
                                        //display the message
                                        echo "<div class ='error'> Image not avaiilable </div>";
                                        $title = "";
                                    }
                                    else
                                    {
                                            //image available
                                            ?>



                                                    <img src="<?php SITEURL;?>images/category/<?php echo $image_name ?>" alt="category1" class="img-category img-curve">
                                            <?php
                                    }
                                ?>

                                    

                                    <p class="float-text text-white"><?php echo $title;?></p>
                                </div>
                            </a>



                        <?php


                    }
                }
                else
                {
                    // categories not available
                    echo "<div class = 'error'> Category not added </div>";
                }



            ?>


            

            <div class="clearfix"></div>
        </div>
        <p class="text-center">
            <a href="<?php echo SITEURL;?>categories.php">Show All Categories</a>
        </p>
    </section>
    <!-- Categories Section Ends Here -->

     

    <!-- book MEnu Section Starts Here -->
    <section class="book-menu">
        <div class="container">
            <h2>Books</h2>

            <?php
                //Getting book from database that are active and featured

                //SQL query
                $sql2 = "SELECT * FROM tbl_book WHERE active='Yes' AND featured = 'Yes' LIMIT 6";

                //execute the query
                $res2 = mysqli_query($conn, $sql2);

                 //count hthe rows
                 $count2 = mysqli_num_rows($res2);

                 //check if book available or not

                 if($count2>0)
                 {
                     //book available
                     while($row2 = mysqli_fetch_assoc($res2))
                     {
                         $id = $row2['id'];
                         $title = $row2['title'];
                         $price = $row2['price'];
                         $description = $row2['description'];
                         $image_name = $row2['image_name'];
                         $qty = $row2['qty'];

                        ?>

                            <div class="book-menu-box">
                                <div class="book-menu-img">
                                    <?php
                                    //check if image available or not
                                        if($image_name == "")
                                        {
                                            //image not available
                                            echo "<div class = 'error'> Image not available </div>";
                                        }
                                        else
                                        {
                                            ?>
                                                <img src="<?php echo SITEURL;?>images/book/<?php echo $image_name;?>" alt="book2" class="img-book img-curve-book">
                                            <?php
                                        }
                                    ?>
                                </div>

                                <div class="book-menu-desc">
                                    <h4><?php echo $title ?></h4>
                                    <p class="book-price">₹<?php echo $price ?></p>
                                    <p class="book-detail">
                                        <?php
                                            echo $description;
                                        ?>
                                    </p>
                                    <br>
                                    <?php 
                                        if($qty>0){
                                            ?>
                                            <a href="<?php echo SITEURL; ?>order.php?book_id=<?php echo $id;?>" class="btn btn-primary">Order Now</a>
                                            <?php
                                        }
                                        else{
                                            echo "<div class = 'error'> Out of Stock </div>";
                                        }
                                    ?>
                                </div>
                            </div>


                        <?php

                     }

                 }
                 else
                 {
                     //book nnot availbale
                     echo "<div class = 'error'> book not availabel </div>";
                 }

            ?>
            
            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="<?php echo SITEURL;?>book.php">Show All Books</a>
        </p>
    </section>
    <!-- book Menu Section Ends Here -->


    <!-- Publisher Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2>Publisher</h2>

            <?php
                //create sql query to display categories from the database
                $sql3 = "SELECT * FROM tbl_publisher WHERE active='YES' AND featured='Yes' LIMIT 6";
                //exeute the query
                $res3 = mysqli_query($conn, $sql3);
                //count the rows to check whether the category is available or not
                $count3 = mysqli_num_rows($res3);
                
                if($count3>0)
                {
                    // categories available
                    while($row3 = mysqli_fetch_assoc($res3))
                    {
                        //we need to get values like title, id, image_name
                        $id = $row3['id'];
                        $title = $row3['title'];
                        $image_name = $row3['image_name'];
                        ?>


                            <a href="<?php echo SITEURL; ?>publisher-book.php?publisher_id=<?php echo $id;?>">
                                <div class="box-3-publisher-home float-container">

                                <?php
                                        //check whether image is available or not
                                    if($image_name == "")
                                    {
                                        //display the message
                                        echo "<div class ='error'> Image not avaiilable </div>";
                                    }
                                    else
                                    {
                                            //image available
                                            ?>



                                                    <img src="<?php SITEURL;?>images/publisher/<?php echo $image_name ?>" alt="publisher2" class="img-publisher-home img-curve">
                                            <?php
                                    }
                                ?>

                                    

                                    
                                </div>
                            </a>



                        <?php


                    }
                }
                else
                {
                    // categories not available
                    echo "<div class = 'error'> Publisher not added </div>";
                }



            ?>


            

            <div class="clearfix"></div>
        </div>
        <p class="text-center">
            <a href="<?php echo SITEURL;?>publisher.php">Show All publishers</a>
        </p>
    </section>
    <!-- Categories Section Ends Here -->

<?php 
    include('partials-front/footer.php');
?>