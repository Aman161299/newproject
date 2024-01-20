<?php
    include("connection.php");
    $session_id=session_id();
    echo $session_id;
    if(isset($_POST["add_cart"]))
    {
        $check_query="select * from cart where product_id='".$_POST["product_id"]."' and session_id='".$session_id."'";
        $record_exist=mysqli_query($con,$check_query);
        $row_exist=mysqli_fetch_assoc($record_exist);
        if(isset($row_exist["id"]))
        {
            $total=$row_exist["total"]+$row_exist["price"];
            $qty=$row_exist["quantity"]+1;
            $update="update cart set quantity='".$qty."',total='".$total."' where id='".$row_exist["id"]."'";
            $query5=mysqli_query($con,$update);
            header("Location:cart.php");
        }else{
        $insert="insert into cart(session_id,product_id,price,quantity,total) values('".$session_id."','".$_POST["product_id"]."','".$_POST["price"]."','".$_POST["quantity"]."','".$_POST["price"]."')";
        $query4=mysqli_query($con,$insert);
        header("Location:cart.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="zxx">
<head>

    <title>Ecour - Education Courses & Training HTML Template</title>
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
                            <h2>Our Products</h2>
                            <ul class="breadcrumb-menu">
                                <li><a href="index.html">Home </a></li>
                                <li>Shop Left Sidebar</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <div class="shop-wrap pt-100 pb-100">
            <div class="container">
                <div class="row gx-5">
                    <div class="col-xl-3 col-lg-4 order-xl-1 order-lg-1 order-md-2 order-2">
                        <div class="sidebar">
                            <form method="get" action="">
                            <div class="sidebar-widget category-widget">
                            <h4>Category </h4>
                                <?php
                                $select="select * from category";
                                $query=mysqli_query($con,$select);
                                while($result=mysqli_fetch_assoc($query)){
                                ?>
                                <ul class="product-category-list">
                                    <li class="has-subcat">
                                        <a href="javascript:void(0)"><?php
                                        echo $result["Category"]
                                        ?> </a>
                                        <ul class="subcategory">
                                        <?php
                                        $select2="select * from sub_cat where cat_id='".$result["id"]."'";
                                        $query2=mysqli_query($con,$select2);
                                        while($result2=mysqli_fetch_assoc($query2)){
                                        ?><li>
                                            <?php
                                            $checked = "";
                                            if(isset($_GET["subcat"]) && in_array($result2["id"],($_GET["subcat"])))
                                            {
                                                $checked = "checked";
                                            }
                                            ?>
                                            <a href=""><input class="form-check-input" type="checkbox" name="subcat[]"<?php echo $checked?> value="<?php echo $result2["id"]?>" />
                                                <?php echo $result2["subcat_name"]?></a>
                                        </li>
                                           <?php
                                }
                                           ?>
                                        </ul>
                                    </li>
                                <?php
                                }
                                ?>    
                                    <!-- <li class="has-subcat">
                                        <a href="javascript:void(0)">Literature <span>3</span></a>
                                        <ul class="subcategory">
                                            <li><a href="product-details.html">English Literature</a></li>
                                            <li><a href="product-details.html">French Literature</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-subcat">
                                        <a href="javascript:void(0)">Technology <span>3</span></a>
                                        <ul class="subcategory">
                                            <li><a href="product-details.html">Tech magazine</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-subcat">
                                        <a href="javascript:void(0)">Mathematics<span>2</span></a>
                                        <ul class="subcategory">
                                            <li><a href="product-details.html">Business Math</a></li>
                                            <li><a href="product-details.html">Calculas</a></li>
                                            <li><a href="product-details.html">Collective Math</a></li>
                                        </ul>
                                    </li> -->
                                </ul>
                            </div>
                            <div class="sidebar-widget price-range-widget">
                                <h4>Price</h4>
                                <div class="filter-sub-area">
                                    <div style="color:#FF4F1E" class="price-range mt-30">
                                        <input type="range" min="0" name="price" max="200000" onchange="changeval(this)"/>
                                        <script>
                                            function changeval(event)
                                            {
                                                document.getElementById("show").value=event.value;
                                            }
                                        </script>
                                    </div>
                                    <div class="filter-title mt-20">
                                        <p class="mb-0">Price :<input type="number" id="show" readOnly="true" />
                                    </div>
                                </div>
                            <div align="center">
                                <input type="submit" class="btn btn-danger" name="submit" value="Search"/>
                            </div>
                            </form>
                            </div>
                            <div class="sidebar-widget new-product">
                                <h4>Popular Products</h4>
                                <div class="new-product-wrap">
                                    <div class="new-product-item">
                                        <div class="new-product-img">
                                            <img src="assets/img/product/product-thumb-1.png" alt="Iamge">
                                        </div>
                                        <div class="new-product-info">
                                            <h6><a href="shop-details.html">Wonder Love</a></h6>
                                            <span>$58.00</span>
                                            <span class="discount">$80</span>
                                        </div>
                                    </div>
                                    <div class="new-product-item">
                                        <div class="new-product-img">
                                            <img src="assets/img/product/product-thumb-2.png" alt="Iamge">
                                        </div>
                                        <div class="new-product-info">
                                            <h6><a href="shop-details.html">History Of English</a></h6>
                                            <span>$98.00</span>
                                        </div>
                                    </div>
                                    <div class="new-product-item">
                                        <div class="new-product-img">
                                            <img src="assets/img/product/product-thumb-3.png" alt="Iamge">
                                        </div>
                                        <div class="new-product-info">
                                            <h6><a href="shop-details.html">Day In Jungle</a></h6>
                                            <span>$98.00</span>
                                            <span class="discount">$120</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8 order-xl-2 order-lg-2 order-md-1 order-1">
                        <div class="content-wrapper">
                            <div class="row align-items-center mb-25">
                                <div class="col-xl-7 col-lg-5 col-md-4">
                                    <div class="profuct-result">
                                        <p>Showing 10 of 120 Products</p>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-4">
                                    <div class="filter-item-cat">
                                        <select>
                                            <option value="1">Sort By Most Popular</option>
                                            <option value="2">Sort By High To Low</option>
                                            <option value="3">Sort By Low To High</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-3 col-md-4">
                                    <div class="filter-item-num">
                                        <select>
                                            <option value="1">Show 10</option>
                                            <option value="2">Show 20</option>
                                            <option value="3">Show 30</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-md-center">
                                <?php
                                $select3="select * from products where id>='1' ";
                                if(isset($_GET["subcat"]))
                                {
                                    $subcat = implode(",",$_GET["subcat"]);
                                    $select3.="and sub_category in (".$subcat.") ";
                                }
                                if(isset($_GET["price"]))
                                {
                                    $select3.="and price between '0' and '".$_GET["price"]."'";
                                }
                                $query3=mysqli_query($con,$select3);
                                while($result3=mysqli_fetch_assoc($query3)){?>
                                
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <div class="product-card style1">
                                        <div class="product-img">
                                            <img class="img_product" src="/project/login_admin/assets/uploads/<?php echo $result3["image"]?>" alt="Image">
                                            <div class="product-option">
                                                <form method="post">
                                                    <button class="quickview" type="button"> <i class="ri-eye-off-line"></i>
                                                    </button>
                                                    <button class="compare" type="button">
                                                        <i class="ri-heart-line"></i>
                                                    </button>
                                                    <input type="hidden" name="product_id" value="<?php echo $result3["id"]?>"/>
                                                    <input type="hidden" name="price" value="<?php echo $result3["price"]?>"/>
                                                    <input type="hidden" name="quantity" value="1"/>
                                                    <button class="add-to-cart" name="add_cart" type="submit">
                                                        <i class="ri-shopping-cart-2-line"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h4><a href="shop-details.html"><?php echo $result3["product_name"]?></a></h4>
                                            <ul class="rating">
                                                <li> <i class="ri-star-fill"></i> </li>
                                                <li> <i class="ri-star-fill"></i> </li>
                                                <li> <i class="ri-star-fill"></i> </li>
                                                <li> <i class="ri-star-fill"></i> </li>
                                                <li> <i class="ri-star-fill"></i> </li>
                                            </ul>
                                            <h6 class="product-price"><?php echo $result3["price"]?></h6>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                }
                                ?>
                                
                            </div>
                            <div class="page-navigation">
                                <div class="row">
                                    <div class="col-lg-12 ">
                                        <ul class="page-nav">
                                            <li><a href="#"> <i class="ri-arrow-left-s-line"></i> </a></li>
                                            <li><a class="active" href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#"> <i class="ri-arrow-right-s-line"></i> </a></li>
                                        </ul>
                                    </div>
                                </div>
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

<!-- Mirrored from templates.hibootstrap.com/ecour/default/shop-left-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Nov 2023 06:31:54 GMT -->

</html>