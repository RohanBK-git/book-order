
<?php    
    include('partials-front/menu.php'); 
    include('partials-front/login-check.php');
    ob_start();
?>

    <?php 
        //CHeck whether book id is set or not
        if(isset($_GET['book_id']))
        {
            //Get the book id and details of the selected book
            $book_id = $_GET['book_id'];

            //Get the DEtails of the SElected book
            $sql = "SELECT * FROM tbl_book WHERE id=$book_id";
            //Execute the Query
            $res = mysqli_query($conn, $sql);
            //Count the rows
            $count = mysqli_num_rows($res);
            //CHeck whether the data is available or not
            if($count==1)
            {
                //WE Have DAta
                //GEt the Data from Database
                $row = mysqli_fetch_assoc($res);

                $title = $row['title'];
                $price = $row['price'];
                $qty = $row['qty'];
                $image_name = $row['image_name'];
            }
            else
            {
                //book not Availabe
                //REdirect to Home Page
                header('location:'.SITEURL);
            }
        }
        else
        {
            //Redirect to homepage
            header('location:'.SITEURL);
        }
    ?>

    <!-- book Section Starts Here -->
    <section>
        <div class="container">
            <br>
            <h2 class="text-center">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order">
                <br>
                <fieldset>
                    <legend>Selected book</legend>

                        <div class="book-menu-img">
                            <?php 
                                //CHeck whether the image is available or not
                                if($image_name=="")
                                {
                                    //Image not Availabe
                                    echo "<div class='error'>Image not Available.</div>";
                                }
                                else
                                {
                                    //Image is Available
                                    ?>
                                    <img src="<?php echo SITEURL; ?>images/book/<?php echo $image_name; ?>" alt="book2" class="img-book img-curve-book">
                                    <?php
                                }
                            ?>
                        </div>
    
                        <div class="book-menu-desc">
                            <h3><?php echo $title; ?></h3>
                            <input type="hidden" name="book" value="<?php echo $title; ?>">

                            <p class="book-price">₹<?php echo $price; ?></p>
                            <input type="hidden" name="price" value="<?php echo $price; ?>">

                            <p class="book-price">Quantity avaiilable: <?php echo $qty; ?></p>
                            

                            <div class="order-label">Quantity</div>
                            <input type="number" name="qty2" placeholder = "Please enter quantity" class="input-responsive" min=1 max=<?php echo $qty; ?> required>                            
                        </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="Name" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="Phone Number" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="Email" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="Address" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>
                <br>
            </form>

            <?php 

                //CHeck whether submit button is clicked or not
                if(isset($_POST['submit']))
                {
                    // Get all the details from the form

                    $book = $_POST['book'];
                    $price = $_POST['price'];
                    $qty2 = $_POST['qty2'];

                    $total = $price * $qty2; // total = price x qty 

                    $order_date = date("Y-m-d h:i:sa"); //Order DAte

                    $status = "Ordered";  // Ordered, On Delivery, Delivered, Cancelled

                    $customer_name = $_POST['full-name'];
                    $customer_contact = $_POST['contact'];
                    $customer_email = $_POST['email'];
                    $customer_address = $_POST['address'];


                    //Save the Order in Databaase
                    //Create SQL to save the data
                    $sql2 = "INSERT INTO tbl_order SET 
                        book = '$book',
                        price = $price,
                        qty = $qty2,
                        total = $total,
                        order_date = '$order_date',
                        status = '$status',
                        customer_name = '$customer_name',
                        customer_contact = '$customer_contact',
                        customer_email = '$customer_email',
                        customer_address = '$customer_address'
                    ";

                    //echo $sql2; die();

                    //Execute the Query
                    $res2 = mysqli_query($conn, $sql2);

                    //updating quantities in tbl_book
                    $nqty = $qty - $qty2;
                    $sql4 = "UPDATE tbl_book SET
                    qty = $nqty
                    WHERE id=$book_id";
                    $res4 = mysqli_query($conn, $sql4);


                    //Check whether query executed successfully or not
                    if($res2&&$res4==true)
                    {
                        //Query Executed and Order Saved
                        $_SESSION['order'] = "<div class='success text-center'>Book Ordered Successfully.</div>";
                        header('location:'.SITEURL);
                        ob_end_flush();
                    }
                    else
                    {
                        //Failed to Save Order
                        $_SESSION['order'] = "<div class='error text-center'>Failed to order book.</div>";
                        header('location:'.SITEURL);
                    }
                   

                }
            
            ?>

        </div>
    </section>
    <!-- book sEARCH Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>