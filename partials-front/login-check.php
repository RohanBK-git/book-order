<?php
    //authorizatiion or access control
    //check whether the user is logged in or not
    if(!isset($_SESSION['user-customer'])) //if user session is not set
    {
        //userrrnot logged in
        //redirect to login page with message
        $_SESSION['no-login-message'] = "<div class = 'error text-center' >Please login to buy books</div>";
        //redirect to login page
        header('location:'.SITEURL.'login-customer.php');
    }
?>