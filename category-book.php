<?php
    include('partials-front/menu.php');
?>

<?php
        //check whether id is passed or not
        if(isset($_GET['category_id']))
        {
            $category_id = $_GET['category_id'];
            //get the title based on category id
            $sql = "SELECT title FROM tbl_category WHERE id= $category_id";

            //execut the query 
            $res = mysqli_query($conn, $sql);

            //get the value from the database
            $row = mysqli_fetch_assoc($res);

            $category_title = $row['title'];
        
        }
        else
        {
            //redirect to home page
            header('location:'.SITEURL);
        }
?>

    <!-- book sEARCH Section Starts Here -->
    <section class="book-search text-center">
        <div class="container">
            <br>
            <h2>Books in <a href="#">"<?php echo $category_title; ?>"</a></h2>

        </div>
    </section>
    <!-- book sEARCH Section Ends Here -->



    <!-- book MEnu Section Starts Here -->
    <section class="book-menu">
        <div class="container">
            

            <?php 
                //create sql query to get book based on selected category

                $sql2 = "SELECT * FROM tbl_book WHERE category_id =$category_id" ;

                //execut the query
                $res2 = mysqli_query($conn, $sql2);

                //count the no of rows
                $count2 = mysqli_num_rows($res2);

                //check whether the book is available or not
                if($count2>0)
                {
                    //book is available
                    while($row2 = mysqli_fetch_assoc($res2))
                    {
                        $id = $row2['id'];
                        $title = $row2['title'];
                        $price = $row2['price'];
                        $qty = $row2['qty'];
                        $description = $row2['description'];
                        $image_name = $row2['image_name'];


                        ?>
                            <div class="book-menu-box">
                                <div class="book-menu-img">
                                            <?php
                                                if($image_name=="")
                                                {
                                                    //image not available
                                                    echo "<div class = 'error'> Image not available </div>";
                                                }
                                                else
                                                {
                                                    //image available
                                                    ?>
                                                    <img src="<?php echo SITEURL;?>images/book/<?php echo $image_name;?>" alt="book3" class="img-book img-curve-book">
                                                    <?php


                                                }
                                            ?>


                                    
                                </div>

                            <div class="book-menu-desc">
                                <h4><?php echo $title; ?></h4>
                                <p class="book-price">₹<?php echo $price;?></p>
                                <p class="book-detail">
                                   <?php echo $description; ?>
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
                    echo "<div class = 'error' > book not available </div>";
                }
            ?>

            



            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- book Menu Section Ends Here -->


<?php
    include('partials-front/footer.php');
?>