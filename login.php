<?php
include("connection.php");
if(isset($_POST["login"]))
{
    $select="select * from user_data where email='".$_POST["email"]."' and password='".md5($_POST["pwd"])."'";
    $query=mysqli_query($con,$select);
    $result=mysqli_fetch_assoc($query);
    if(isset($result["id"]))
    {
        $_SESSION["user_name"]=$result["first_name"];
        $_SESSION["user_id"]=$result["id"];
        header("Location:index.php");
    }
    else{
        echo "<script>alert('Enter Valid Email And Password');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from templates.hibootstrap.com/ecour/default/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Nov 2023 06:31:32 GMT -->

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
                            <h2>Login</h2>
                            <ul class="breadcrumb-menu">
                                <li><a href="index.html">Home </a></li>
                                <li>Login</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="Login-wrap pt-100 pb-100">
            <div class="container">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                    <div class="login-form">
                        <div class="login-header bg-blue">
                            <h2 class="text-center mb-0">Log In</h2>
                        </div>
                        <div class="login-body">
                            <form class="form-wrap" action="login.php" method="post">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="email">Username/Email/Phone</label>
                                            <input id="email" name="email" type="email" placeholder="Email Address*"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="pwd">Password</label>
                                            <input id="pwd" name="pwd" type="password" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <div class="form_group mb-20">
                                            <input type="checkbox" id="test_1">
                                            <label for="test_1">Remember Me</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-6 text-end mb-20">
                                        <a href="forgot-pwd.html" class="link">Forgot Password?</a>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="submit" name="login" class="btn v1" value="Log In" />
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group text-center">
                                            <span class="or">Or Login With</span>
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
                                        <p class="mb-0">Don’t Have an Account? <a class="link"
                                                href="register.php">Create One</a></p>
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

<!-- Mirrored from templates.hibootstrap.com/ecour/default/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Nov 2023 06:31:34 GMT -->

</html>