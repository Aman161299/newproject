<?php
$con=mysqli_connect("localhost","root","","test");
if(isset($_POST["register"]))
{
    if(empty($_POST["email"] and $_POST["password"]))
    {
        echo "<script> alert('Please Enter Valid Email And Password')</script>";
    }
    else{
        $select="insert into user_data(first_name,last_name,email,password) values('".$_POST["first_name"]."','".$_POST["last_name"]."','".$_POST["email"]."','".md5($_POST["password"])."')";
        $query=mysqli_query($con,$select);
        header("Location:index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from templates.hibootstrap.com/ecour/default/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Nov 2023 06:31:56 GMT -->

<head>
<?php
include("head_lib.php")
?>
</head>

<body>

    <div class="preloader js-preloader">
        <img src="assets/img/preloader.gif" alt="Image">
    </div>


    <div class="switch-theme-mode">
        <label id="switch" class="switch">
            <input type="checkbox" onchange="toggleTheme()" id="slider">
            <span class="slider round"></span>
        </label>
    </div>


    <div class="page-wrapper">

        <section class="breadcrumb-wrap bg-f br-bg-4">
            <div class="overlay op-6 bg-black"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1 col-md-10 offset-md-1">
                        <div class="breadcrumb-title">
                            <h2>Register</h2>
                            <ul class="breadcrumb-menu">
                                <li><a href="index.html">Home </a></li>
                                <li>Register</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="Login-wrap pt-100 pb-100">
            <div class="container">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <div class="login-form">
                        <div class="login-header bg-blue">
                            <h2 class="text-center mb-0">Register</h2>
                        </div>
                        <div class="login-body">
                            <form class="form-wrap" action="register.php" method="post">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="name">First Name</label>
                                            <input id="name" name="first_name" type="text" placeholder="First Name" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="name">Last Name</label>
                                            <input id="email" name="last_name" type="text" placeholder="Last Name"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="phone">Email Address</label>
                                            <input id="phone" name="email" type="email" placeholder="Email Address*">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="phone">Password</label>
                                            <input id="pwd_2" name="password" type="password" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="submit" class="btn v6" name="register" value="Register" />
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group text-center">
                                            <span class="or">Or Register With</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <ul class="social-profile v3 text-center mt-0">
                                                <li><a target="_blank" href="https://instagram.com/"><i
                                                            class="lab la-instagram"></i></a></li>
                                                <li><a target="_blank" href="https://twitter.com/"><i
                                                            class="lab la-twitter"></i></a></li>
                                                <li><a target="_blank" href="https://facebook.com/"><i
                                                            class="lab la-facebook-f"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <p class="mb-0">Already Have An Account? <a class="link"
                                                href="login.php">Login</a></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


    <?php
    include("footer_lib.php");
    ?>
</body>

<!-- Mirrored from templates.hibootstrap.com/ecour/default/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Nov 2023 06:31:56 GMT -->

</html>