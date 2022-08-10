<?php
    include('partials-front/menu.php');
?>

<div class="main-content">
    <div class="container text-center">
        <h1> Register </h1>

        <br/>
        <br/>
        
        <?php
            if(isset($_SESSION['add'])) //checking whether the session is set of not
            {
                echo $_SESSION['add']; //display the session message if set
                unset($_SESSION['add']); //remove session message
            }
        ?>

        <form action "" method= "POST" class="text-center order"> 
            <legend>
                <br>
                <br>
                Full name
                <input type ="text" name="full_name" placeholder="Enter your name" required>
                <br><br>

                Username
                <input type ="text" name="username" placeholder="Enter your username" required>
                <br><br>

                Password
                <input type ="password" name="password" placeholder="Enter your password" required>
                <br><br>

                <input type="submit" name="submit" value="Register" class="btn btn-primary">
                <br>
                <br>
                
            </legend>
            
            <p class="text-center"> <a href="<?php echo SITEURL;?>login-customer.php">Login</a></p>
            <br>
            
        </form>
    
    </div>
</div>


<?php
    include('partials-front/footer.php');
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

       $sql = "INSERT INTO tbl_customer SET 
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

            $_SESSION['register'] = "<div class = 'success'>Registration succesful</div>";

            //redirect page to manage admin
            header("location:".SITEURL.'login-customer.php');


        }
        else
        {
            //failed to insert data
            //echo "failed to insert data";
             //create a session variable to display message

             $_SESSION['add'] = "<div class = 'success'>Failed to Register</div>";

             //redirect page to add admin
             header("location:".SITEURL.'register.php');
        }
    }
    
?>

