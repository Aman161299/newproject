<div class="header-top">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="header-top-left">
                                <div class="close-header-top xl-none">
                                    <button type="button"><i class="las la-times"></i></button>
                                </div>
                                <div class="header-contact">
                                    <p><i class="ri-map-pin-fill"></i> 24th North Lane, Hill Town, New York</p>
                                </div>
                                <div class="header-contact">
                                    <a
                                        href="https://templates.hibootstrap.com/cdn-cgi/l/email-protection#462e232a2a290623252933346825292b">
                                        <i class="ri-mail-send-line"></i> <span class="__cf_email__"
                                            data-cfemail="274e4941486742444852550944484a">[email&#160;protected]</span></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="header-top-right">
                                <div class="lang_selctor  style1">
                                    <i class="ri-global-line"> </i>
                                    <select>
                                        <option value="1">English</option>
                                        <option value="2">French</option>
                                        <option value="3">Arabic</option>
                                    </select>
                                </div>
                                <div class="header-social">
                                    <span>Follow us :</span>
                                    <ul class="social-profile style3">
                                        <li><a target="_blank" href="https://facebook.com/"><i
                                                    class="ri-facebook-fill"></i> </a></li>
                                        <li><a target="_blank" href="https://linkedin.com/"> <i
                                                    class="ri-linkedin-fill"></i> </a></li>
                                        <li><a target="_blank" href="https://twitter.com/"> <i
                                                    class="ri-twitter-fill"></i> </a></li>
                                        <li><a target="_blank" href="https://instagram.com/"> <i
                                                    class="ri-instagram-line"></i> </a></li>
                                    </ul>
                                </div>
                                <div class="dropdown">
                                <button type="button" class="btn btn-primary " data-bs-toggle="dropdown">
                                    <?php
                                    if(isset($_SESSION["user_name"])){
                                        echo $_SESSION["user_name"];
                                    }
                                    else{?>
                                       <a href="resgister.php">register</a>
                                    <?php
                                    }
                                    
                                    ?>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="register.php">register</a></li>
                                    <li><a class="dropdown-item" href="logout.php">logout</a></li>
                                </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 xl-none">
                            <div class="header-search">
                                <form action="#">
                                    <div class="form-group">
                                        <input type="search" placeholder="Search Here ...">
                                        <button type="submit"> <i class="ri-search-eye-line"></i> </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>