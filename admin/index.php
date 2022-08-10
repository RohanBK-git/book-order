<?php
    include('partials/menu.php'); 
?>

        <!--main content Starts -->
        <div class="main-content">
            <div class="wrapper">
                <h1> Dashboard</h1>
                    <br>
                <?php 
                    
                        if(isset($_SESSION['login']))
                        {
                            echo $_SESSION['login'];
                            unset ($_SESSION['login']);
                        }







                ?>
                <br><br>
                <div class="col-4 text-center">

                        <?php
                            $sql = "SELECT * FROM tbl_category";
                            
                            $res = mysqli_query($conn, $sql);

                            $count = mysqli_num_rows($res);
                        ?>
                    <h1><?php echo $count;?></h1>
                    <br/>
                    Categories
                </div>

                <div class="col-4 text-center">

                        <?php
                            $sql5 = "SELECT * FROM tbl_publisher";
                            
                            $res5 = mysqli_query($conn, $sql5);

                            $count5 = mysqli_num_rows($res5);
                        ?>
                    <h1><?php echo $count5;?></h1>
                    <br/>
                    Publishers
                </div>

                <div class="col-4 text-center">

                        <?php
                            $sql2 = "SELECT * FROM tbl_book";
                            
                            $res2 = mysqli_query($conn, $sql2);

                            $count2 = mysqli_num_rows($res2);
                        ?>

                    <h1><?php echo $count2;?></h1>
                    <br/>
                    Books
                </div>

                <div class="col-4 text-center">
                        <?php
                            $sql3 = "SELECT * FROM tbl_order";
                            
                            $res3 = mysqli_query($conn, $sql3);

                            $count3 = mysqli_num_rows($res3);
                        ?>

                    <h1><?php echo $count3;?></h1>
                    <br/>
                    Total Orders
                </div>

                <div class="col-4 text-center">

                <?php
                    //create sql query to get total revenue generated
                    //aggregate function in SQL

                        $sql4 = "SELECT SUM(total) AS Total FROM tbl_order WHERE status='Delivered'";

                        //execute the query
                        $res4 = mysqli_query($conn, $sql4);

                        //get the value
                        $row4 = mysqli_fetch_assoc($res4);

                        //get the total revenue
                        $total_revenue = $row4['Total'];


                ?>
                    <h1>₹<?php echo $total_revenue; ?></h1>
                    <br/>
                    Revenue Generated
                </div>

              
                <div class="clearfix"> </div>


            </div>
        </div>
        <!--main content ends -->



<?php 
    include('partials/footer.php');
?>
        