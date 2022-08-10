<?php
    //include constants file

    include('../config/constants.php');

    //echo "delete page";
    //check whether the id and image_name is set or not

    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        //get the value and delete
        //echo "get value and delete";

        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //remove the physical image file if available


        if($image_name != "")
        {
            //image is available , so remove it
            $path = "../images/publisher/".$image_name;
            //remove the image
            $remove = unlink($path);


            //if failed to remove image, then , add an error message and stop the process
            if($remove==false)
            {
                //set the sessiion message
                $_SESSION['remove'] = "<div class = 'error'> Failed to remove publisher image </div>";
                //redirect to manage cattefoty page
                header('location:'.SITEURL.'admin/manage-publisher.php');

                //stop the process
                die();
            }
        }


        //delete data from database
        //sql query to delete data from database
        $sql = "DELETE FROM tbl_publisher WHERE id =$id";
        //execute query
        $res = mysqli_query($conn, $sql);
        //check whether data is deleted from database or not
        if($res==true)
        {
            //set success message and redirect
            $_SESSION['delete'] = "<div class = 'success'>Publisher deleted successfully </div>";
            header('location:'.SITEURL.'admin/manage-publisher.php');
        }
        else
        {
            //set failed message and redirect
            $_SESSION['delete'] = "<div class = 'error'>Failed to delete publisher </div>";
            header('location:'.SITEURL.'admin/manage-publisher.php');
        }
        //redirect to manage-publisher page with message

    }
    else
    {
        //redirect to manage-publisher page
        header('location:'.SITEURL.'admin/manage-publisher.php');
    }
?>