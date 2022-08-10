<?php
    include('partials/menu.php');
?>



<div class="main-content">
    <div class="wrapper">
        <h1> Manage Publisher </h1>

        <br/>
                <br/>

                <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset ($_SESSION['add']);
                }

                if(isset($_SESSION['remove']))
                {
                    echo $_SESSION['remove'];
                    unset ($_SESSION['remove']);
                }

                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];
                    unset ($_SESSION['delete']);
                }

                if(isset($_SESSION['no-publisher-found']))
                {
                    echo $_SESSION['no-publisher-found'];
                    unset ($_SESSION['no-publisher-found']);
                }
                
                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset ($_SESSION['update']);
                }
                
                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];
                    unset ($_SESSION['upload']);
                }

                if(isset($_SESSION['failed-remove']))
                {
                    echo $_SESSION['failed-remove'];
                    unset ($_SESSION['failed-remove']);
                }

                
        ?>

                    <br>
                    <br>

                <!-- button to add admin -->

                <a href="<?php echo SITEURL; ?>admin/add-publisher.php" class="btn-primary"> Add Publisher</a>
                <br/>
                <br/>

                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>

                    <?php
                        //query to get all publisher from database
                        $sql = "SELECT * FROM tbl_publisher";

                        $res = mysqli_query($conn, $sql);

                        //count the rows 
                        $count = mysqli_num_rows($res);

                        //create serial number varialble and assign the value as one
                        $sn = 1;
                        
                        //check whether we have dataa in databasse or not

                        if($count>0)
                        {
                            //we have data inn databasse

                            //get the data and display 

                            while($row = mysqli_fetch_assoc($res))
                            {
                                $id = $row['id'];
                                $title = $row['title'];
                                $image_name = $row['image_name'];
                                $featured = $row['featured'];
                                $active = $row['active'];

                                ?>

                                    <tr>
                                        <td><?php echo $sn++;?></td>
                                        <td><?php echo $title;?> </td>

                                        <td>
                                            <?php 
                                                //check whether the image name is available or not
                                                if($image_name != "")
                                                {
                                                    //display the image
                                                    ?>
                                                    
                                                    <img src="<?php echo SITEURL;?>images/publisher/<?php echo $image_name;?>" width = "100px" >
                                                    
                                                    <?php

                                                }
                                                else
                                                {
                                                    //display the message
                                                    echo "<div class= 'error'> Image not added </div>";
                                                }
                                            ?>
                                        </td>
                                        
                                        <td><?php echo $featured;?></td>
                                        <td><?php echo $active;?></td>
                                        <td>
                                        <a href="<?php echo SITEURL;?>admin/update-publisher.php?id=<?php echo $id;?>" class="btn-secondary">Update Publisher </a>
                                        <a href="<?php echo SITEURL; ?>admin/delete-publisher.php?id=<?php echo $id;?> &image_name=<?php echo $image_name;?>" class="btn-danger">Delete Publisher </a>
                                        </td>
                                    </tr>

                                <?php
                            }

                        }

                        else
                        {
                            //We dont have data

                            //we will display message inside the table 
                            ?>

                                <tr>
                                    <td>
                                        <div colspan = "6" class="error"> No publisher added</div>
                                    </td>
                                </tr>

                            <?php

                        }


                    ?>

                    

                    

                </table>
    </div>
</div>



<?php
    include('partials/footer.php');
?>