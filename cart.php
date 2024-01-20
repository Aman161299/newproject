<?php
include("connection.php");

if(isset($_POST["add"]))
{
    $check_query="select * from cart where id='".$_POST["record_id"]."'";
    $record_exist=mysqli_query($con,$check_query);
    $row_exist=mysqli_fetch_assoc($record_exist);
    if(isset($row_exist["id"]))
    {
        $total=$row_exist["price"]*($row_exist["quantity"]+1);
        $qty=$row_exist["quantity"]+1;
        $update="update cart set quantity='".$qty."',total='".$total."' where id='".$row_exist["id"]."'";
        $query5=mysqli_query($con,$update);
    }
}
if(isset($_POST["minus"]))
{
    $check_query="select * from cart where id='".$_POST["record_id"]."'";
    $record_exist=mysqli_query($con,$check_query);
    $row_exist=mysqli_fetch_assoc($record_exist);
    if(isset($row_exist["id"]))
    {
        $total=$row_exist["price"]*($row_exist["quantity"]-1);
        $qty=$row_exist["quantity"]-1;
        $update="update cart set quantity='".$qty."',total='".$total."' where id='".$row_exist["id"]."'";
        $query5=mysqli_query($con,$update);
    }
}
if(isset($_POST["checkout"]))
{
    if(isset($_SESSION["user_name"])){
        $session_id = session_id(); 
        $select = "select * from  cart where session_id = '".$session_id."'";
        $query6 = mysqli_query($con,$select);
        while($result3 = mysqli_fetch_assoc($query6)){
            $update = "update cart set user_id = '".$_SESSION["user_id"]."' , session_id = '".null."' where session_id = '".$session_id."'";
            $query = mysqli_query($con,$update);
        }
        header("Location:checkout.php");
    }else{
        header("Location:register.php");
    }
}
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
<?php
include("head_lib.php");
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
            include("top_navbar_shop.php");
            ?>
        </header>

        <?php
        include("cart_dropdown.php");
        include("about_us.php");
        ?>

        <section class="breadcrumb-wrap bg-f br-bg-4">
            <div class="overlay op-6 bg-black"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1 col-md-10 offset-md-1">
                        <div class="breadcrumb-title">
                            <h2>Cart</h2>
                            <ul class="breadcrumb-menu">
                                <li><a href="index.html">Home </a></li>
                                <li>Cart</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="wishlist-wrap ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-8 col-xl-9">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="wishlist-table ">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">Image</th>
                                                <th scope="col">Product</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Qunatity</th>
                                                <th scope="col">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $session_id=session_id();
                                        $cart="select * from cart where session_id='".$session_id."'";
                                        $query=mysqli_query($con,$cart);
                                        while($result=mysqli_fetch_assoc($query)){
                                            $product="select * from products where id='".$result["product_id"]."'";
                                            $query2=mysqli_query($con,$product);
                                            while($result2=mysqli_fetch_assoc($query2)){
                                                ?>
                                            <tr>
                                                <td>
                                                    <div class="wh_item">
                                                    <img style="height:80px;" class="img_product" src="/project/login_admin/assets/uploads/<?php echo $result2["image"]?>" alt="Image">
                                                    </div>
                                                </td>
                                                <td><a href="shop-details.html"><?php echo $result2["product_name"]?></a></td>
                                                <td>
                                                    <p class="wh-tem-price"><?php echo $result2["price"]?></p>
                                                </td>
                                                <td>
                                                    <form method="post" action="cart.php">
                                                    <div class="wh_qty">
                                                        <div class="product-quantity">
                                                            <div class="qtySelector">
                                                            <input type="hidden" name="record_id" value="<?php echo $result["id"]?>"/>
                                                                <button type="submit" name="minus">
                                                                <span class="las la-minus decreaseQty"></span>
                                                                </button>
                                                                <input type="text" name="qty" class="qtyValue" value="<?php echo $result["quantity"]?>" />
                                                                <button type="submit" name="add">
                                                                <span class="las la-plus increaseQty"></span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </td>
                                                <td>
                                                    <p id="total" class="wh-tem-price text-red"><?php
                                                    $price=$result["price"];
                                                    $quantity=$result["quantity"];
                                                    $total=$price*$quantity;
                                                    echo $total;
                                                    ?></p> 
                                                </td>
                                            </tr>
                                        <?php
                                            }
                                        }
                                        ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 text-sm-end">
                                <a href="shop_left_sidebar.php" class="btn v7">Continue Shopping</a>
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
                                            $total_price="SELECT SUM(total) FROM cart where session_id='".$session."'";
                                            $qery4=mysqli_query($con,$total_price);
                                            $result4=mysqli_fetch_assoc($qery4);
                                            echo implode($result4);
                                            ?>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="select-method">
                                    <div>
                                        <input type="radio" id="test1" name="radio-group">
                                        <label for="test1">Cash On Delivery</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="test2" name="radio-group">
                                        <label for="test2">Card</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="test3" name="radio-group">
                                        <label for="test3">Check</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-3">
                                <form method="post">
                                <button type="submit" name="checkout" class="btn v3">checkout</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
        include("footer.php");
        ?>
    </div>
    <?php
    include("footer_lib.php");
    ?>
</body>

<!-- Mirrored from templates.hibootstrap.com/ecour/default/cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Nov 2023 06:31:56 GMT -->

</html>