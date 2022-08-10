<?php 
    include('../config/constants.php');
?>


<html> 
    <head>
        <title>
            Login - Book Order System
        </title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        
    <div class="logo">
                <a href="#" title="Logo">
                    <img src="../images/logo-admin.png" alt="logo" class="img-logo">
                </a>
            
            </div>

        <div class = "menu text-right">
            <div>                   <!--class= wrapper-->
                <ul>
                    <li> <a href="<?php echo SITEURL;?>"> Homepage </a> </li>
                    
                </ul>
            </div>
        </div>

    <div class='login-message-top'>
        <p>To access the admin panel, you have to login with your admin username and password </p>
            
    </div>

        <div class="login">
            <h1>Login</h1>
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





                    ?>
                    <br><br>

                    <!--login form starts here -->
                    <form action="" method ="POST" >

                        

                       Username: 
                        <input type="text" name = "username" placeholder = "enter username"> <br> <br>

                        Password: 
                        <input type="password" name = "password" placeholder = "enter password"> <br> <br>

                        <input type="submit" name="submit" value="Login" class = "btn-primary">

                        <br>
                        <br>
                        <br>
                    
                    </form>
                    <!--login form ends here -->


            <p> <a href="<?php echo SITEURL;?>">Go Back to Homepage</a></p>
        </div>

    
        <div class="footer">
            <div class="wrapper">
                <p class="text-center"> Bookstore  <a href="<?php echo SITEURL;?>about-us.php" class = "about-us-link">About Us<a> </p>
                
            </div>
        </div>

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

                $sql = "SELECT * FROM tbl_admin WHERE username= '$username' AND password = '$password' ";

                //3. execute the query
                $res = mysqli_query($conn, $sql);

                //4. count rows to check whether the user exists or not
                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    
                    //user availiable and login sucess
                    $_SESSION['login'] = "<div class = 'success'> Login sucessful </div>";
                    
                    $_SESSION['user'] = $username; //check whether user is logged in or not and logout with unset it




                    //redirect to homepage/dashboard
                    header('location:'.SITEURL.'admin/');
                }

                else
                {
                    //user not availaibe and login failed
                    $_SESSION['login'] = "<div class = 'error text-center'> username or password didnt match</div>";
                    //redirect to homepage/dashboard
                    header('location:'.SITEURL.'admin/login.php');
                    //header('location:'.SITEURL.'admin/index.php');
                }



        }



?>