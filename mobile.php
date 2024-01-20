<?php
    include("connection.php")
?>
<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from templates.hibootstrap.com/ecour/default/shop-left-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Nov 2023 06:31:47 GMT -->

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
        include("cart.php");
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
                                        ?>
                                            <li><a href="mobile.php"><?php echo $result2["subcat_name"]?></a></li>
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
                                    <div id="slider-range_one" class="price-range mt-30">
                                    </div>
                                    <div class="filter-title mt-20">
                                        <p class="mb-0">Price : <span><input type="text" id="amount_one"></span></p>
                                    </div>
                                </div>
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
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <div class="product-card style1">
                                        <div class="product-img">
                                            <img src="https://specificationsplus.com/wp-content/uploads/2022/06/Vivo-V29-Pro-Specifications-Plus.jpg" alt="Image">
                                            <div class="product-option">
                                                <button class="quickview" type="button"> <i class="ri-eye-off-line"></i>
                                                </button>
                                                <button class="compare" type="button">
                                                    <i class="ri-heart-line"></i>
                                                </button>
                                                <button class="add-to-cart" type="button">
                                                    <i class="ri-shopping-cart-2-line"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h4><a href="shop-details.html">vivo v29</a></h4>
                                            <ul class="rating">
                                                <li> <i class="ri-star-fill"></i> </li>
                                                <li> <i class="ri-star-fill"></i> </li>
                                                <li> <i class="ri-star-fill"></i> </li>
                                                <li> <i class="ri-star-fill"></i> </li>
                                                <li> <i class="ri-star-fill"></i> </li>
                                            </ul>
                                            <h6 class="product-price">$2000.00</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <div class="product-card style1">
                                        <div class="product-img">
                                            <img src="https://i.gadgets360cdn.com/products/large/vivo-T2x-5G-db-709x800-1681199877.jpg" alt="Image">
                                            <div class="product-option">
                                                <button class="quickview" type="button"> <i class="ri-eye-off-line"></i>
                                                </button>
                                                <button class="compare" type="button">
                                                    <i class="ri-heart-line"></i>
                                                </button>
                                                <button class="add-to-cart" type="button">
                                                    <i class="ri-shopping-cart-2-line"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h4><a href="shop-details.html">vivo t2x 5g</a></h4>
                                            <ul class="rating">
                                                <li> <i class="ri-star-fill"></i> </li>
                                                <li> <i class="ri-star-fill"></i> </li>
                                                <li> <i class="ri-star-fill"></i> </li>
                                                <li> <i class="ri-star-fill"></i> </li>
                                                <li> <i class="ri-star-line"></i> </li>
                                            </ul>
                                            <h6 class="product-price">$35.00 - $50.00</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <div class="product-card style1">
                                        <div class="product-img">
                                            <img src="https://www.specmentor.com/wp-content/uploads/2021/05/vivo-V21-5G-full-specifications-and-price-965x1024.png" alt="Image">
                                            <div class="product-option">
                                                <button class="quickview" type="button"> <i class="ri-eye-off-line"></i>
                                                </button>
                                                <button class="compare" type="button">
                                                    <i class="ri-heart-line"></i>
                                                </button>
                                                <button class="add-to-cart" type="button">
                                                    <i class="ri-shopping-cart-2-line"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h4><a href="shop-details.html">vivo v21</a></h4>
                                            <ul class="rating">
                                                <li> <i class="ri-star-fill"></i> </li>
                                                <li> <i class="ri-star-fill"></i> </li>
                                                <li> <i class="ri-star-fill"></i> </li>
                                                <li> <i class="ri-star-fill"></i> </li>
                                                <li> <i class="ri-star-line"></i> </li>
                                            </ul>
                                            <h6 class="product-price">$40.00 - $60.00</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <div class="product-card style1">
                                        <div class="product-img">
                                            <img src="https://th.bing.com/th/id/OIP.Vr5Rbbo3oiPj8itzPos5lgHaHa?rs=1&pid=ImgDetMain" alt="Image">
                                            <div class="product-option">
                                                <button class="quickview" type="button"> <i class="ri-eye-off-line"></i>
                                                </button>
                                                <button class="compare" type="button">
                                                    <i class="ri-heart-line"></i>
                                                </button>
                                                <button class="add-to-cart" type="button">
                                                    <i class="ri-shopping-cart-2-line"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h4><a href="shop-details.html">vivo s7</a></h4>
                                            <ul class="rating">
                                                <li> <i class="ri-star-fill"></i> </li>
                                                <li> <i class="ri-star-fill"></i> </li>
                                                <li> <i class="ri-star-fill"></i> </li>
                                                <li> <i class="ri-star-fill"></i> </li>
                                                <li> <i class="ri-star-line"></i> </li>
                                            </ul>
                                            <h6 class="product-price">$90.00 - $120.00</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <div class="product-card style1">
                                        <div class="product-img">
                                            <img src="https://asia-exstatic-vivofs.vivo.com/PSee2l50xoirPK7y/1623151606942/4f45ffaffb7d66e2095e4ab2bb81e480.png" alt="Image">
                                            <div class="product-option">
                                                <button class="quickview" type="button"> <i class="ri-eye-off-line"></i>
                                                </button>
                                                <button class="compare" type="button">
                                                    <i class="ri-heart-line"></i>
                                                </button>
                                                <button class="add-to-cart" type="button">
                                                    <i class="ri-shopping-cart-2-line"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h4><a href="shop-details.html">vivo v23</a></h4>
                                            <ul class="rating">
                                                <li> <i class="ri-star-fill"></i> </li>
                                                <li> <i class="ri-star-fill"></i> </li>
                                                <li> <i class="ri-star-fill"></i> </li>
                                                <li> <i class="ri-star-fill"></i> </li>
                                                <li> <i class="ri-star-line"></i> </li>
                                            </ul>
                                            <h6 class="product-price">$20.00 - $40.00</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <div class="product-card style1">
                                        <div class="product-img">
                                            <img src="https://fdn2.gsmarena.com/vv/bigpic/vivo-x100-pro.jpg" alt="Image">
                                            <div class="product-option">
                                                <button class="quickview" type="button"> <i class="ri-eye-off-line"></i>
                                                </button>
                                                <button class="compare" type="button">
                                                    <i class="ri-heart-line"></i>
                                                </button>
                                                <button class="add-to-cart" type="button">
                                                    <i class="ri-shopping-cart-2-line"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h4><a href="shop-details.html">vivo x 100 pro</a></h4>
                                            <ul class="rating">
                                                <li> <i class="ri-star-fill"></i> </li>
                                                <li> <i class="ri-star-fill"></i> </li>
                                                <li> <i class="ri-star-fill"></i> </li>
                                                <li> <i class="ri-star-fill"></i> </li>
                                                <li> <i class="ri-star-line"></i> </li>
                                            </ul>
                                            <h6 class="product-price">$60.00 - $80.00</h6>
                                        </div>
                                    </div>
                                </div>
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