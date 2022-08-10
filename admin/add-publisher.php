<?php 
    include ('partials/menu.php');
?>


<div class="main-content"> 
    <div class="wrapper">
        <h1>Add Publisher</h1>

        <br>
        <br>

        <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset ($_SESSION['add']);
                }

                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];
                    unset ($_SESSION['upload']);
                } 
        ?>

                <br>
                <br>
                <br>
        <!-- Add publisher Form starts -->

        <form action="" method = "POST" enctype="multipart/form-data">


            <table class="tbl-30">
                <tr>
                    <td>Title</td>
                    <td>
                        <input type="text" name="title" placeholder="publisher-title" required>
                    </td>
                </tr>


                <tr>

                
                    <td>Select image</td>
                    <td>
                        <input type="file" name = "image">
                    </td>
                

                </tr>

                <tr>
                    <td>featured:</td>
                    <td>
                        <input type="radio" name = "featured" value="Yes"> Yes
                        <input type="radio" name = "featured" value="No"> No
                    </td>


                </tr>

                <tr>
                    <td>active</td>
                    <td>
                        <input type="radio" name="active" value="Yes"> Yes
                        <input type="radio" name = "active" value="No"> No
                    </td>


                </tr>




                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add publisher" class = "btn-secondary">
                    </td>
                </tr>



            </table>


        </form>


        <!-- Add publisher Form ends-->


        <?php 
        
                //check whether submit button is clicked or not

                if(isset($_POST['submit']))
                {
                    //echo "clicked";


                    //get the value from the publisher form
                    $title = $_POST['title'];
                    
                    //for radio input , we need to check whether the button is selected or not
                    if(isset($_POST['featured']))
                    {
                        //get the value from form
                        $featured = $_POST['featured'];
                    }
                    else
                    {
                        //set the default value
                        $featured = "No";
                    }

                    if(isset($_POST['active']))
                    {
                        $active = $_POST['active'];
                    }


                    else
                    {
                        $active ="No";
                    }

                    
                    //check whether the image is selected or not and set the value for image name accordingly
                    //print_r($_FILES['image']);

                    //die(); //break the code heree

                    if(isset($_FILES['image']['name']))
                    {
                        //upload the image
                        //to upload image we need image name, source path and destinationn path
                        $image_name = $_FILES['image']['name'];

                        //upload the image only if image is selected

                        
                        if($image_name!= "")
                        {

                        


                        //auto rename our image
                        //get the extension of our image (jpg, png, gif etc) eg.book1.jpg

                        $ext = end(explode('.', $image_name));

                        //rename the image 
                        $image_name = "publisher_publisher_".rand(000,999).'.'.$ext; //eg. book_publisher_834.jpg
                        



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
                            //redirect to add-publisher page
                            header('location:'.SITEURL.'admin/add-publisher.php');
                            //stop the process
                            die();
                        }
                    }

                    }

                    else
                    {
                        //dont upload the image and set the image name value as blank
                        $image_name = "";
                    }

                    //create sql query to insert publisher into database

                    $sql = "INSERT INTO tbl_publisher SET 
                    title='$title',
                    image_name = '$image_name',
                    featured = '$featured',
                    active = '$active'
                    ";

                    //3. exefdcte the query and fsave ininn database
                    $res = mysqli_query($conn, $sql);

                    //4. check whether query is executed or noy and data added or not

                    if($res == true)
                    {
                        //querty executed and publisher added
                        $_SESSION['add'] = "<div class = 'success'> Publisher added successfully </div>";
                        //redirect to manage publisher page
                        header('location:'.SITEURL.'admin/manage-publisher.php');
                    }

                    else
                    {
                        //failied to add publisher
                        $_SESSION['add'] = "<div class = 'error'> Failed to add Publisher</div>";
                        
                        header('location:'.SITEURL.'admin/add-publisher.php');
                    }
                }

        ?>

    </div>
</div>






<?php 
    include ('partials/footer.php');
?>