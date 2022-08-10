<?php
    //include constants.phpf fiel here
    include('../config/constants.php');
    //1.get the id of admin to be deleted 
        echo $id = $_GET['id'];
    //2.create sql query to delete admin
        $sql = "DELETE FROM tbl_admin WHERE id = $id";
        //exedvute the query 
        $res = mysqli_query($conn, $sql);
        //check whether query is executed or not
        if($res==TRUE)
        {
            //query executed sucessfully and admin deleted
            //echo "admin deleted";
            //create a session variable to display message
            $_SESSION['delete'] = "<div class ='success'>admin deleted sucessfully</div>";
            //redirect to manage admin page
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
        else 
        {
            //failed to delete admin
            //echo "failed to delete admin";
            $_SESSION['delete'] = "<div class = 'error'>failed to delete admin, try again later </div>";
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
?>