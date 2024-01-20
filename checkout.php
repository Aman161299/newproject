<?php
include("connection.php");
if(isset($_POST["orderplaced"])){
    $order_id = date("ymdHis");
    $insert = "insert into address (order_no,billing_first_name,billing_last_name,billing_Email,billing_phone_no,   billing_country,billing_street_adress,billing_city_town,billing_state,billing_zip_code,billing_note) values ('".$order_id."','".$_POST["fname"]."','".$_POST["lname"]."','".$_POST["email"]."','".$_POST["phone"]."','".$_POST["country"]."','".$_POST["street"]."','".$_POST["city"]."','".$_POST["state"]."','".$_POST["zip"]."','".$_POST["msg"]."')";
    $query = mysqli_query($con,$insert);

     $check_query="select * from order_items where product_id='".$_POST["product_id"]."'";
        $record_exist=mysqli_query($con,$check_query);
        $row_exist=mysqli_fetch_assoc($record_exist);
        if(isset($row_exist["id"]))
        {
            $total=$row_exist["total"]+$row_exist["price"];
            $qty=$row_exist["quantity"]+1;
            $update="update order_items set quantity='".$qty."',total='".$total."' where id='".$row_exist["id"]."'";
            $query5=mysqli_query($con,$update);
            header("Location:cart.php");
        }else{
    $select6 = "select * from cart where user_id = '".$_SESSION["user_id"]."'";
    $query6 = mysqli_query($con,$select6);
    while($result = mysqli_fetch_assoc($query6)){
        $order_id = date("ymdHis");
        $insert = "insert into order_items (product_id,price,quantity,subtotal,total,order_no) values ('".$result["product_id"]."','".$result["price"]."','".$result["quantity"]."','".$result["total"]."','".$result["total"]."','".$order_id."')";
        $query7 = mysqli_query($con,$insert);
        $delete = "delete from cart where user_id = '".$_SESSION["user_id"]."'";
        $query5 = mysqli_query($con,$delete);
    }
    }        
    $total_price1="SELECT SUM(total) FROM cart where user_id = '".$_SESSION["user_id"]."'";
    $qery9=mysqli_query($con,$total_price1);
    $result9=mysqli_fetch_assoc($qery9);
    $insert2 = "insert into orders (user_id,order_no,mode,total) values ('".$_SESSION["user_id"]."','".$order_id."','".$_POST["radio-group"]."','".implode($result9)."')";
    $query8 = mysqli_query($con,$insert2);
    header("location:index.php");
}

?>
<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from templates.hibootstrap.com/ecour/default/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Nov 2023 06:31:56 GMT -->

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

        <header class="header-wrap style1">
            <?php
            include("top_header.php");
            ?>
            <?php
            include("top_navbar_shop.php");
            ?>
        </header>

        <?php
        include("cart_dropdown.php");
        ?>


        <?php
        include("about_us.php");
        ?>



        <section class="breadcrumb-wrap bg-f br-bg-2">
            <div class="overlay op-6 bg-black"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1 col-md-10 offset-md-1">
                        <div class="breadcrumb-title">
                            <h2>Checkout</h2>
                            <ul class="breadcrumb-menu">
                                <li><a href="index.html">Home </a></li>
                                <li>Checkout</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    
        <div class="checkout-wrap pt-100 pb-100">
            <div class="container">
                <div class="row gx-5">
                    <div class="col-xl-8 col-lg-8">
                        <div class="content-box-title style2">
                            <h5>Billing Details</h5>
                        </div>
                        <form action="#" class="checkout" method="post">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="fname">First name*</label>
                                        <input type="text" name="fname" id="fname" placeholder="Enter First name"
                                            required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="lname">Last name*</label>
                                        <input type="text" name="lname" id="lname" placeholder="Enter last name"
                                            required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="email">Email Address*</label>
                                        <input type="email" name="email" id="email" placeholder="Enter Email Address"
                                            required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="phone">Phone Number*</label>
                                        <input type="number" name="phone" id="phone" placeholder="Enter Phone Numnber"
                                            required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="country">Country*</label>
                                        <input type="text" name="country" id="country" placeholder="USA" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="street">Street Address</label>
                                        <input type="text" name="street" id="street" placeholder="Street" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="city">City/Town*</label>
                                        <input type="text" name="city" id="city" placeholder="City Name" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="state">State*</label>
                                        <input type="text" name="state" id="state" placeholder="" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="zip">ZIP Code*</label>
                                        <input type="text" name="zip" id="zip" placeholder="" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="checkbox mb-10">
                                        <input type="checkbox" id="ts">
                                        <label for="ts">Ship To Different Address?</label>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-0">
                                        <label for="msg">Note</label>
                                        <textarea name="msg" id="msg" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                        
                    </div>
                    <div class="col-xxl-4 col-xl-3">
                        <div class="checkout-details smt-30">
                            <div class="content-box-title">
                                <h5>Total Bill</h5>
                            </div>
                            <div class="bill-details">
                                <div class="bill-item-wrap">
                                <?php
                                     $session_id=session_id();
                                     $cart="select * from cart where session_id='".$session_id."'";
                                     $query=mysqli_query($con,$cart);
                                     while($result=mysqli_fetch_assoc($query)){
                                         $product="select * from products where id='".$result["product_id"]."'";
                                         $query2=mysqli_query($con,$product);
                                         while($result2=mysqli_fetch_assoc($query2)){
                                             ?>
                                    <div class="bill-item">
                                        <div class="bill-item-name">
                                            <p><?php echo $result2["product_name"]?></p>
                                        </div>
                                        <div class="bill-item-price">
                                            <span><?php
                                                    $price=$result["price"];
                                                    $quantity=$result["quantity"];
                                                    $total=$price*$quantity;
                                                    echo $total;
                                                    ?></span>
                                        </div>
                                    </div>
                                    <?php
                                        }
                                            }
                                        ?>
                                </div>
                                <div class="subtotal-wrap">
                                    <div class="subtotal-item">
                                        <div class="subtotal-item-left">
                                            <h6>Subtotal</h6>
                                        </div>
                                        <div class="subtotal-item-right">
                                            <?php
                                            $session=session_id();
                                            $total_price="SELECT SUM(total) FROM cart where session_id='".$session."'";
                                            $qery4=mysqli_query($con,$total_price);
                                            $result4=mysqli_fetch_assoc($qery4);
                                            print_r(implode($result4));
                                            ?>
                                        </div>
                                    </div>
                                    <div class="subtotal-item">
                                        <h6>Have A Promo Code?</h6>
                                        <div class="form-group mb-0 w-100">
                                            <input class="w-100" type="text" placeholder="Enter code here">
                                            <button type="submit">Apply</button>
                                        </div>
                                    </div>
                                    <div class="subtotal-item">
                                        <div class="subtotal-item-left">
                                            <p>Shipping Charge</p>
                                        </div>
                                        <div class="subtotal-item-right">
                                            <p>$0.00</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="total-wrap">
                                    <h5>Total Amount</h5>
                                    <?php
                                            $session=session_id();
                                            $total_price="SELECT SUM(total) FROM cart where user_id='".$_SESSION["user_id"]."'";
                                            $qery4=mysqli_query($con,$total_price);
                                            $result4=mysqli_fetch_assoc($qery4);
                                            echo implode($result4);
                                    ?>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="select-method">
                                    <div>
                                        <input type="radio" id="test1" value="cash" name="radio-group">
                                        <label for="test1">Cash On Delivery</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="test2" value="card" name="radio-group">
                                        <label for="test2">Card</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="test3" value="check" name="radio-group">
                                        <label for="test3">Check</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-3">
                                <button type="submit" name="orderplaced" class="btn v3">Place order</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php
        include("footer.php");
        ?>

    </div>
<?php
include("footer_lib.php");
?>
</body>

<!-- Mirrored from templates.hibootstrap.com/ecour/default/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Nov 2023 06:31:56 GMT -->

</html>