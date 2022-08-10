<?php
    include('partials-front/menu.php');
?>

    <!-- book sEARCH Section Starts Here -->
    <section class="book-book-search text-left">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>book-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for book.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- book sEARCH Section Ends Here -->



    <!-- book MEnu Section Starts Here -->
    <section class="book-menu">
        <div class="container">
            <h2 class="text-center">Books</h2>

            <?php
                //display book that are active
                $sql = "SELECT * FROM tbl_book WHERE active = 'Yes'";

                //execute the query
                $res = mysqli_query($conn, $sql);

                //count rows
                $count = mysqli_num_rows($res);

                //check whether the book are available or not
                if($count>0)
                {
                    //book available
                    while($row = mysqli_fetch_assoc($res))
                    {
                        //get the values 
                        $id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $qty = $row['qty'];
                        $image_name = $row['image_name'];

                        ?>

                                <div class="book-menu-box">
                                        <div class="book-menu-img">

                                            <?php
                                                //check whether image available or not
                                                if($image_name =="")
                                                {
                                                    //image not available
                                                    echo "<div class = 'error'> Image not available </div>";
                                                }
                                                else
                                                {
                                                    //image available
                                                    ?>
                                                        <img src="<?php echo SITEURL; ?>images/book/<?php echo $image_name; ?>" alt="book5" class="img-book img-curve-book">
                                                    <?php
                                                }
                                            ?>

                                            
                                        </div>

                                    <div class="book-menu-desc">
                                        <h4><?php echo $title; ?></h4>
                                            <p class="book-price">₹<?php echo $price; ?></p>
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
                        //book noit available
                        echo "<div class ='error'> book not found </div>";
                }
            ?>

            

            


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- book Menu Section Ends Here -->

<?php
   include('partials-front/footer.php');
?>