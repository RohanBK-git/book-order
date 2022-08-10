<?php include('partials/menu.php'); ?>


    <div class = "main-content">
        <div class = "wrapper">
            <h1>Update admin </h1>
            
            <br/> <br/>

            <?php 
            
            //1. get id of selected admin

            $id = $_GET['id'];

            //2. create sql query to get the details 

            $sql = "SELECT * FROM tbl_admin WHERE id=$id";

            $res = mysqli_query($conn, $sql);

            //check whether the query is executed or not

            if($res==true)
            {
                //check whether the data is available or not

                $count = mysqli_num_rows($res);

                //check whether we have admin data or not


                if($count==1)
                {
                    //get the details 
                    //echo "admin availiable";
                    $row=mysqli_fetch_assoc($res);

                    $full_name = $row['full_name'];
                    $username = $row['username'];


                }

                else
                {
                    //redirect to manage adm,in page

                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }
            ?>



            <form action="" method = "POST">

                    <table class = "tbl-30">
                        <tr>
                            <td> full name </td>
                            <td>
                                <input type= "text" name= "full_name" value = "<?php echo $full_name;?>" required>
                            <td>
                        </tr>

                        <tr>
                            <td> user name </td>
                            <td> 
                                <input type = "text" name = "username" value = "<?php echo $username; ?>" required>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <input type = "hidden" name = "id" value = "<?php echo $id ?>">
                                <input type = "submit" name = "submit" value = "Update Admin" class = "btn-secondary">
                        </tr>



                    </table>


            </form>


            


        </div>
    </div>

<?php 



            //check whether the submit button is clicked or not
            

            if(isset($_POST['submit']))
            {



                //echo "Button cllicked";
                //get all values from the form to update 

                $id = $_POST['id'];
                $full_name = $_POST['full_name'];
                $username = $_POST['username'];
                

                //create an sql query to update admin 
                $sql = "UPDATE tbl_admin SET
                full_name = '$full_name',
                username = '$username'
                WHERE id = '$id'
                ";


                    //eaxtecute the query

                $res = mysqli_query($conn, $sql);

                //check whether query execuyted or not

                if($res==true)
                {
                    //query execvuated ,admin upadted
                    $_SESSION['update'] = "<div class = 'success'>admin update sucessfully</div>";
                    //redirect to manage-admin page
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }


                else
                {
                    //failed to update admin
                    $_SESSION['update'] = "<div class = 'error'> admin failed to update </div>";
                    //redirect to manage-admin page
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }


            }






?>


<?php include('partials/footer.php'); ?>