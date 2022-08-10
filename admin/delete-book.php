<?php

        include('../config/constants.php');

        if(isset($_GET['id']) && isset($_GET['image_name']))  //either use '&&' or 'AND'
        {
            //process to delete
            //echo "process to delete";


            //1.Get id and image name 

            $id = $_GET['id'];
            $image_name = $_GET['image_name'];

            //2. Remove the image if available

                //check whether if image is avaiilable or not and delete only if avialable

                if($image_name!="")
                {
                    //it has image and need to be removed from the folder
                    //get the image path

                    $path = "../images/book/".$image_name;

                    //remove the image file from folder

                    $remove = unlink($path);

                    //check if image is removed or not

                    if($remove==false)
                    {
                        //failed to remove image 
                        $_SESSION['upload'] = "<div class= 'error'> Failed to remove image file </div>";
                        //redirect to manage book
                        header('location:'.SITEURL.'admin/manage-book.php');
                        //stop the process of deleting book
                        die();
                    }
                }

            //3. Delete book from database

                //create sql query 

                $sql = "DELETE FROM tbl_book WHERE id=$id";

                //execute the query

                $res = mysqli_query($conn, $sql);

                //check whether query is executed successfully or not and display the session message

                if($res==true)
                {
                    //book deleted
                    $_SESSION['delete'] = "<div class = 'success'> book deleted successfully </div>";
                    header('location:'.SITEURL.'admin/manage-book.php');
                }
                else
                {
                    //failed to ddelete book
                    $_SESSION['delete'] = "<div class = 'error'> failed to delete book </div>";
                    header('location:'.SITEURL.'admin/manage-book.php');
                }




            //4. Redirect to manage book with session message
        }

        else
        {
            //redirect to manage book page
            echo "redirect";

            $_SESSION['unauthorized'] = "<div class = 'error'> Unauthorized access </div>";
            header('location:'.SITEURL.'admin/manage-book.php');
        }

?>