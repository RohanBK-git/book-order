<?php
    include('partials/menu.php');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update publisher</h1>


        <br><br>

        <?php
            //check whether the id is set or not 
            if(isset($_GET['id']))
            {
                //get the id and alll details
                //echo "Getting the data";
                $id = $_GET['id'];

                //create sql query to get all details

                $sql = "SELECT * FROM tbl_publisher WHERE id= $id";

                //execute the query 
                $res = mysqli_query($conn, $sql);

                //count the rows to check whether the id is valid or not

                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    //get all the data
                    $row =mysqli_fetch_assoc($res);

                    $title = $row['title'];
                    $current_image = $row['image_name'];
                    $featured = $row['featured'];
                    $active = $row['active'];
                }
                else
                {
                    //redirect to manage category with session message
                    $_SESSION['no-category-found'] = "<div class = 'error'> Publisher not found </div>";
                    header('location:'.SITEURL.'admin/manage-publisher.php');
                }



            }
            else
            {
                //redirect to manage category
                header('location:'.SITEURL.'admin/manage-publisher.php');
            }
        ?>



    <form action="" method = "POST" enctype = "multipart/form-data">
        <table class="tbl-30">

            <tr>
                <td>Title</td>
                <td><input type="text" name= "title" value = "<?php echo $title;?>" required ></td>
            </tr>

            <tr>
                <td>Current image</td>
                <td>
                    <?php 
                        if($current_image != "")
                        {
                            //display the message
                            ?>
                                <img src="<?php echo SITEURL;?>images/publisher/<?php echo $current_image;?>" width="150px">
                            <?php
                        }
                        else
                        {
                            //display the message

                            echo "<div class='error'> Image not added </div>";
                        }
                    ?>
                </td>
            </tr>

            <tr>
                <td>New image</td>
                <td>
                    <input type="file" name = "image" >
                </td>
            </tr>

            <tr>
                <td>Featured</td>
                <td>
                    <input <?php if($featured=="Yes"){echo "checked";}?> type="radio" name = "featured" value = "Yes"> Yes
                    <input <?php if($featured=="No"){echo "checked";}?> type="radio" name = "featured" value = "No"> No
                </td>
            </tr>

            <tr>
                <td>Active</td>
                <td>
                    <input <?php if($active=="Yes"){echo "checked";}?> type="radio" name = "active" value = "Yes"> Yes
                    <input <?php if($active=="No"){echo "checked";}?> type="radio" name = "active" value = "No"> No
                </td>
            </tr>

            <tr>
                <td colspan ="2">
                    <input type="hidden" name = "current_image" value = "<?php echo $current_image;?>">
                    <input type="hidden" name="id" value = "<?php echo $id?>">
                    <input type="submit" name ="submit" value = "Update Publisher" class = "btn-secondary">
                </td>
                
            </tr>


        </table>

        </form>



        <?php
            if(isset($_POST['submit']))
            {
                //echo "clicked";
                //1.Get all the values from the form
                $id = $_POST['id'];
                $title = $_POST['title'];
                $current_image = $_POST['current_image'];

                $featured = $_POST['featured'];
                $active = $_POST['active'];

                //2. Updating new image 

                    //check whether the image is selected or not

                    if(isset($_FILES['image']['name']))
                    {
                        //get the image details
                        $image_name = $_FILES['image']['name'];
                        //check whether the image is available or not
                        if($image_name != "")
                        {
                            //image available
                            //A.upload the new image

                            //auto rename our image
                        //get the extension of our image (jpg, png, gif etc) eg.book1.jpg

                        $ext = end(explode('.', $image_name));

                        //rename the image 
                        $image_name = "book_publisher_".rand(000,999).'.'.$ext; //eg. book_category_834.jpg
                        



                        $source_path = $_FILES['image']['tmp_name'];

                        $destination_path = "../images/publisher/".$image_name;

                        //upload the image
                        $upload = move_uploaded_file($source_path, $destination_path);

                        //check whether the image is uploaded or not
                        //And if image s not uplaoded , then we will stop the process , and redirect with error
                        if($upload == false)
                        {
                            //set message
                            $_SESSION['upload'] = "<div class = 'error'> Failed to upload image </div>";
                            //redirect to add-category page
                            header('location:'.SITEURL.'admin/manage-publisher.php');
                            //stop the process
                            die();
                        }

                            //B.remove the current image if available
                            if($current_image!="")
                            {
                                $remove_path = "../images/publisher/".$current_image;
                                $remove = unlink($remove_path);
    
                                //check whether the image is removed or not 
                                //if failed to remove , display message and stop the process
    
                                if($remove==false)
                                {
                                    //failed to remove image
                                    $_SESSION['failed-remove'] = "<div class='error'>failed to remove current image</div>";
                                    header('location:'.SITEURL.'admin/manage-publisher.php');
                                    die();
                                }
                            }
                                
                        }
                        else
                        {
                            $image_name = $current_image;
                        }

                    }
                    else
                    {
                        $image_name = $current_image;
                    }

                //3. update the database
                    $sql2 = "UPDATE tbl_publisher SET
                    title = '$title',
                    image_name = '$image_name',
                    featured = '$featured',
                    active = '$active'
                    WHERE id = '$id'
                    ";
                    //exevuyt e htr query

                    $res2 = mysqli_query($conn, $sql2);


                //4. redirect to manafe category with message

                //check whether is executed or not

                if($res2 == true)
                {
                    //Publisher added
                    $_SESSION['update'] = "<div class = 'success'>Publisher updated successfully </div>";
                    header('location:'.SITEURL.'admin/manage-publisher.php');
                }
                else
                {
                    //Publisher not added
                    $_SESSION['update'] = "<div class = 'error'> Failed to update Publisher </div>";
                    header('location:'.SITEURL.'admin/manage-publisher.php');

                }
            }
        ?>
    </div>
</div>


<?php
    include('partials/footer.php');
?>