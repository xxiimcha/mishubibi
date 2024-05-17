<header class="header-main_area bg--black">
    <div class="header-top_area d-lg-block d-none">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-7 col-lg-8">
                    <div class="main-menu_area position-relative">
                        <nav class="main-nav">
                            <ul>
                                <li class=""><a href="contact.html">Cars</a></li>
                                <li class=""><a href="contact.html">Motorcycles</a></li>
                                <li class=""><a href="contact.html">Trucks</a></li>
                                <li class=""><a href="contact.html">Used Cars</a></li>
                                <li class=""><a href="contact.html">Three Wheelers</a></li>
                                <li class=""><a href="contact.html">Electric</a></li>
                                <li class="active"><a href="javascript:void(0)">About Us <i
                                        class="ion-ios-arrow-down"></i></a>
                                    <ul class="hm-dropdown">
                                        <li><a href="about.php">Who Are We</a></li>
                                        <li><a href="privacy.php">Privacy Policy</a></li>
                                        <li><a href="terms.php">Terms and Conditions</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-4">
                    <div class="ht-right_area">
                        <div class="ht-menu">
                            <ul>
                                <?php if(!isset($_SESSION['user_id'])) { ?>
                                <li><a href="my-account.html">My Account<i class="fa fa-chevron-down"></i></a>
                                    <ul class="ht-dropdown ht-my_account">
                                        <li><a href="../register.php">Register</a></li>
                                        <li class="active"><a href="../login.php">Login</a></li>
                                    </ul>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-top_area header-sticky bg--black">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 col-lg-7 d-lg-block d-none">
                    <div class="main-menu_area position-relative">
                        <nav class="main-nav">
                            <ul>
                                <li class=""><a href="contact.html">Cars</a></li>
                                <li class=""><a href="contact.html">Motorcycles</a></li>
                                <li class=""><a href="contact.html">Trucks</a></li>
                                <li class=""><a href="contact.html">Used Cars</a></li>
                                <li class=""><a href="contact.html">Three Wheelers</a></li>
                                <li class=""><a href="contact.html">Electric</a></li>
                                <li class=""><a href="contact.html">News & Reviews</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-sm-3 d-block d-lg-none">
                    <div class="header-logo_area header-sticky_logo">
                        <a href="index.html">
                            <img src="../assets/images/favicon.ico" alt="Uren's Logo">
                        </a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 col-sm-9">
                    <div class="header-right_area">
                        <ul>
                            <li class="mobile-menu_wrap d-flex d-lg-none">
                                <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn color--white">
                                    <i class="ion-navicon"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle_area">
        <div class="container-fluid">
            <div class="row">
                <div class="custom-logo_col col-12">
                    <div class="header-logo_area">
                        <a href="index.html">
                            <img src="../assets/images/favicon.ico" alt="Uren's Logo">
                        </a>
                    </div>
                </div>
                <div class="custom-category_col col-6">
                </div>
                <div class="custom-search_col col-12">
                    <div class="hm-form_area">
                        <form action="#" class="hm-searchbox">
                            <select class="nice-select select-search-category">
                                <option value="0">All Categories</option>
                                <option value="10">Laptops</option>
                                <option value="17">Prime Video</option>
                                <option value="20">All Videos</option>
                                <option value="21">Blouses</option>
                                <option value="22">Evening Dresses</option>
                                <option value="23">Summer Dresses</option>
                                <option value="24">T-shirts</option>
                                <option value="25">Rent or Buy</option>
                            </select>
                            <input type="text" placeholder="Enter your search key ...">
                            <button class="header-search_btn" type="submit"><i
                                class="ion-ios-search-strong"><span>Search</span></i></button>
                        </form>
                    </div>
                </div>
                <div class="custom-cart_col col-12">
                    <div class="header-right_area">
                        <ul>
                            <li class="mobile-menu_wrap d-flex d-lg-none">
                                <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn color--white">
                                    <i class="ion-navicon"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="offcanvas-minicart_wrapper" id="miniCart">
        <div class="offcanvas-menu-inner">
            <a href="#" class="btn-close"><i class="ion-android-close"></i></a>
            <div class="minicart-content">
                <div class="minicart-heading">
                    <h4>Shopping Cart</h4>
                </div>
                <ul class="minicart-list">
                    <li class="minicart-product">
                        <a class="product-item_remove" href="javascript:void(0)"><i
                            class="ion-android-close"></i></a>
                        <div class="product-item_img">
                            <img src="assets/images/product/small-size/1.jpg" alt="Uren's Product Image">
                        </div>
                        <div class="product-item_content">
                            <a class="product-item_title" href="shop-left-sidebar.html">Autem ipsa ad</a>
                            <span class="product-item_quantity">1 x $145.80</span>
                        </div>
                    </li>
                    <li class="minicart-product">
                        <a class="product-item_remove" href="javascript:void(0)"><i
                            class="ion-android-close"></i></a>
                        <div class="product-item_img">
                            <img src="assets/images/product/small-size/2.jpg" alt="Uren's Product Image">
                        </div>
                        <div class="product-item_content">
                            <a class="product-item_title" href="shop-left-sidebar.html">Tenetur illum amet</a>
                            <span class="product-item_quantity">1 x $150.80</span>
                        </div>
                    </li>
                    <li class="minicart-product">
                        <a class="product-item_remove" href="javascript:void(0)"><i
                            class="ion-android-close"></i></a>
                        <div class="product-item_img">
                            <img src="assets/images/product/small-size/3.jpg" alt="Uren's Product Image">
                        </div>
                        <div class="product-item_content">
                            <a class="product-item_title" href="shop-left-sidebar.html">Non doloremque placeat</a>
                            <span class="product-item_quantity">1 x $165.80</span>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="minicart-item_total">
                <span>Subtotal</span>
                <span class="ammount">$462.4‬0</span>
            </div>
            <div class="minicart-btn_area">
                <a href="cart.html" class="uren-btn uren-btn_dark uren-btn_fullwidth">Minicart</a>
            </div>
            <div class="minicart-btn_area">
                <a href="checkout.html" class="uren-btn uren-btn_dark uren-btn_fullwidth">Checkout</a>
            </div>
        </div>
    </div>
</header>