<?php
    include('../config/constants.php');
    include('login-check.php');
?>

<html>
    <head>
        <title>Book Order Website</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        <!--Menu Section Starts -->
        <div class="logo">
                <a href="#" title="Logo">
                    <img src="../images/logo-admin.png" alt="Bookstore Logo" class="img-logo">
                </a>
            
            </div>

        <div class = "menu text-right">
            <div>                   <!--class= wrapper-->
                <ul>
                    <li> <a href="index.php"> Home </a> </li>
                    <li> <a href="manage-admin.php"> Admin </a> </li>
                    <li> <a href="manage-category.php"> Category </a> </li>
                    <li> <a href="manage-book.php"> Book </a> </li>
                    <li> <a href="manage-publisher.php"> Publisher </a> </li>
                    <li> <a href="manage-order.php"> Order </a> </li>
                    <li> <a href="logout.php"> Logout </a></li>
                </ul>
            </div>
        </div>
        <!--Menu Section ends -->