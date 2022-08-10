<?php
    include('partials/menu.php');
?>

<div class="main-content">
    <div class="wrapper">
        <h1> Add Admin </h1>

        <br/>
        <br/>
        
        <?php
            if(isset($_SESSION['add'])) //checking whether the session is set of not
            {
                echo $_SESSION['add']; //display the session message if set
                unset($_SESSION['add']); //remove session message
            }
        ?>

        <form action "" method= "POST"> 
            
            <table class="tbl-30">
                <tr>
                    <td>Full Name</td>
                    <td>
                        <input type ="text" name="full_name" placeholder="Enter your name" required>
                    </td>
                </tr>

                <tr>
                    <td>Username</td>
                    <td>
                        <input type ="text" name="username" placeholder="Enter your username" required>
                    </td>
                </tr>

                <tr>
                    <td>Password</td>
                    <td>
                        <input type ="password" name="password" placeholder="Enter your password" required>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    
    </div>
</div>


<?php
    include('partials/footer.php');
?>


<?php
    //Process the value from Form and Save it in Database

    //Check whether the submit button is clicked or not

    if(isset($_POST['submit']))
    {
       //Button clicked


       //1. Get data from the form

       $full_name = $_POST['full_name'];
       $username = $_POST['username'];
       $password = md5($_POST['password']);             //password encryption with MD5


       //2. SQL Query To Save Data Into The DataBase

       $sql = "INSERT INTO tbl_admin SET 
            full_name = '$full_name',
            username = '$username',
            password = '$password'
            ";

        //3.query and savi data to databaaase
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        //4.check whether data (query is exexuted) data is inserted or not and display appropriate message
        if($res==TRUE)
        {
            //data inserted
            //echo"data inserted";
            //create a session variable to display message

            $_SESSION['add'] = "<div class = 'success'>Admin added succesfully</div>";

            //redirect page to manage admin
            header("location:".SITEURL.'admin/manage-admin.php');


        }
        else
        {
            //failed to insert data
            //echo "failed to insert data";
             //create a session variable to display message

             $_SESSION['add'] = "<div class = 'success'>Failed to add admin</div>";

             //redirect page to add admin
             header("location:".SITEURL.'admin/add-admin.php');
        }
    }
    
?>