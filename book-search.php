<?php
    include('partials-front/menu.php');
?>

    <!-- book sEARCH Section Starts Here -->
    <section class="book-book-search text-center">
        <div class="container">

            <?php

                     //get the search keyword
                $search =  $_POST['search'];

            ?>
            
            <h2>Books on Your Search <a href="#" >"<?php echo $search;?>"</a></h2>

        </div>
    </section>
    <!-- book sEARCH Section Ends Here -->



    <!-- book MEnu Section Starts Here -->
    <section class="book-menu">
        <div class="container">
            

            <?php


               

                //sql query to get book based on search keyword

                $sql = "SELECT * FROM tbl_book WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

                //execut the query
                $res = mysqli_query($conn, $sql);

                //count rows
                $count = mysqli_num_rows($res);

                //check whether book available or not

                if($count>0)
                {
                    //book available
                    while($row = mysqli_fetch_assoc($res))
                    {
                        //get the details
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $qty = $row['qty'];
                        $description = $row['description'];
                        $image_name = $row['image_name'];

                        ?>
                                <div class="book-menu-box">
                                    <div class="book-menu-img">

                                            <?php
                                                //check whethee image is available or not
                                                if($image_name == "")
                                                {
                                                    //image not available
                                                    echo "<div class ='error'>Image not available </div>";
                                                }
                                                else
                                                {
                                                    //image available
                                                    ?>

                                                    
                                                    <img src="<?php echo SITEURL; ?>images/book/<?php echo $image_name;?>" alt="book six" class="img-book img-curve-book">

                                                    <?php
                                                }


                                            ?>
            





                                        
                                    </div>

                                    <div class="book-menu-desc">
                                        <h4><?php echo $title;?></h4>
                                        <p class="book-price"><?php echo $price;?></p>
                                        <p class="book-detail">
                                                <?php echo $description;?>
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
                    //book not available
                    echo "<div class = 'error'>book not found</div>";
                }



            ?>

            

            

              


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- book Menu Section Ends Here -->

<?php
    include('partials-front/footer.php');
?>