<?php
    include('config/constants.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div>
             
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="images/logo.png" alt="Book Logo" class="img-responsive">
                </a>
            </div>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL;?>" >Home</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL;?>categories.php" >Categories</a>
                    </li>

                    <li>
                        <a href="<?php echo SITEURL;?>publisher.php" >Publisher</a>
                    </li>

                    <li>
                        <a href="<?php echo SITEURL;?>book.php">Book</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>


                    <?php 
                    if(!isset($_SESSION['user-customer'])) //if user session is not set
                    {
                    ?>
                    <li>
                        <a href="<?php echo SITEURL;?>login-customer.php">Login</a>
                    </li>
                    <?php
                    }
                    else{

                    
                    ?>
                    
                    <li>
                        <a href="<?php echo SITEURL;?>logout-customer.php">Logout</a>
                    </li>
                    <?php
                    }
                    ?>
                    <li>
                        <a href="<?php echo SITEURL;?>admin/index.php">ADMIN</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->