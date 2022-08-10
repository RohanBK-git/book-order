<?php
    include('partials-front/menu.php');
    ob_start();
?>

<html> 
    <head>
        <title>
            Login - Book Order System
        </title>
       
    </head>

    <body>
        <div class="container">
            <h1 class="text-center">Login</h1>
            <br>
                    <?php 
                    
                        if(isset($_SESSION['login']))
                        {
                            echo $_SESSION['login'];
                            unset ($_SESSION['login']);
                        }

                        if(isset($_SESSION['no-login-message']))
                        {
                            echo $_SESSION['no-login-message'];
                            unset ($_SESSION['no-login-message']);
                        }

                        if(isset($_SESSION['register']))
                        {
                            echo $_SESSION['register'];
                            unset ($_SESSION['register']);
                        }
                    ?>
                    <br><br>

                <!--login form starts here -->
                    <form action="" method ="POST" class="order text-center">                      
                        <br>
                        <br>
                        <legend>
                       Username: 
                        <input type="text" name = "username" placeholder = "enter username" required> <br> <br>

                        Password: 
                        <input type="password" name = "password" placeholder = "enter password" required> <br> <br>

                        <input type="submit" name="submit" value="Login" class = "btn btn-primary">

                        <br>
                        </legend>
                        <br>
                        <p class="text-center"> <a href="<?php echo SITEURL;?>register.php">Register</a></p>
                        <br>
                    </form>
                <!--login form ends here -->           
        </div>

        <?php 
            include("partials-front/footer.php");
        ?>

    </body>

</html>


<?php 

    //check whether the submit button is clicked or not
    if(isset($_POST['submit']))
        {
            //process for login
                //1.Get the data from login form

                $username = $_POST['username'];
                $password = md5($_POST['password']);

                //2.creating sql query to check whether the user with username and password exists or not

                $sql = "SELECT * FROM tbl_customer WHERE username= '$username' AND password = '$password' ";

                //3. execute the query
                $res = mysqli_query($conn, $sql);

                //4. count rows to check whether the user exists or not
                $count = mysqli_num_rows($res);

                if($count==1)
                {                    
                    //user availiable and login sucess
                    $_SESSION['login'] = "<div class = 'success'> Login sucessful </div>";
                    
                    $_SESSION['user-customer'] = $username; //check whether user is logged in or not and logout with unset it
                    //redirect to homepage/dashboard
                    header('location:'.SITEURL);
                    ob_end_flush();
                }

                else
                {
                    //user not availaibe and login failed
                    $_SESSION['login'] = "<div class = 'error text-center'> Username or Password is incorrect</div>";
                    //redirect to homepage/dashboard
                    header('location:'.SITEURL.'login-customer.php');
                    //header('location:'.SITEURL.'admin/index.php');
                }

        }
?>

