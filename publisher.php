<?php
    include('partials-front/menu.php');
?>



    <!-- Publisher Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Publishers</h2>

            <?php

                //display all publishers that are available
                $sql = "SELECT * FROM tbl_publisher WHERE active='Yes'";

                //execute the query
                $res = mysqli_query($conn, $sql);

                //count the rows 
                $count = mysqli_num_rows($res);

                //check whether publishers available or not 
                if($count>0)
                {
                    //publishers availiable
                    while($row = mysqli_fetch_assoc($res))
                    {
                        //get the values
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];

                        ?>
                            <a href="<?php SITEURL;?>publisher-book.php?publisher_id=<?php echo $id;?>">
                                <div class="box-3-publisher-publisher float-container">

                                <?php
                                    if($image_name=="")
                                    {
                                        //image not avaiiable
                                        echo "<div class = 'error'> Image not available</div>";

                                    }
                                    else
                                    {
                                        ?>

                                            <img src="<?php echo SITEURL; ?>images/publisher/<?php echo $image_name; ?>" alt="publisher1" class="img-publisher-publisher img-curve">
                                    
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
                       //Publisher not avaialble
                       echo "<div class = 'error'> Publishers not found</div>";
                }
                ?>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Publisher Section Ends Here -->


<?php
    include('partials-front/footer.php');
?>