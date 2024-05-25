<?php 
include('../controller/config.php');
include('../include/head.php');
?>
<body class="template-color-1">
    <div class="main-wrapper">
        <?php include('../include/header.php');?>
        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <h2>Cars</h2>
                </div>
            </div>
        </div>
        <div class="shop-content_wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shop-toolbar">
                            <div class="product-view-mode">
                                <a class="grid-1" data-target="gridview-1" data-toggle="tooltip" data-placement="top" title="1">1</a>
                                <a class="grid-2" data-target="gridview-2" data-toggle="tooltip" data-placement="top" title="2">2</a>
                                <a class="active grid-3" data-target="gridview-3" data-toggle="tooltip" data-placement="top" title="3">3</a>
                                <a class="grid-4" data-target="gridview-4" data-toggle="tooltip" data-placement="top" title="4">4</a>
                                <a class="grid-5" data-target="gridview-5" data-toggle="tooltip" data-placement="top" title="5">5</a>
                                <a class="list" data-target="listview" data-toggle="tooltip" data-placement="top" title="List"><i class="fa fa-th-list"></i></a>
                            </div>
                            <div class="product-item-selection_area">
                                <div class="product-short">
                                    <label class="select-label">Short By:</label>
                                    <select class="myniceselect nice-select">
                                        <option value="1">Default</option>
                                        <option value="2">Name, A to Z</option>
                                        <option value="3">Name, Z to A</option>
                                        <option value="4">Price, low to high</option>
                                        <option value="5">Price, high to low</option>
                                        <option value="5">Rating (Highest)</option>
                                        <option value="5">Rating (Lowest)</option>
                                        <option value="5">Model (A - Z)</option>
                                        <option value="5">Model (Z - A)</option>
                                    </select>
                                </div>
                                <div class="product-showing">
                                    <label class="select-label">Show:</label>
                                    <select class="myniceselect short-select nice-select">
                                        <option value="1">15</option>
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="shop-product-wrap grid gridview-3 listfullwidth img-hover-effect_area row">
                            <?php
                            $sql = "SELECT id, vehicle_name, brand, vehicle_type, car_image, power FROM cars WHERE vehicle_type = 'electric'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    $vehicle_id = $row['id'];
                                    $vehicleName = $row['vehicle_name'];
                                    $brand = $row['brand'];
                                    $vehicleType = $row['vehicle_type'];
                                    $carImage = $row['car_image'];
                                    $power = $row['power'];
                                    ?>
                                    <div class="col-lg-4">
                                        <div class="product-slide_item">
                                            <div class="inner-slide">
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        <a href="view_car.php?id=<?php echo $vehicle_id?>">
                                                            <img class="primary-img" src="../admin/pages/<?php echo $carImage; ?>" alt="<?php echo $vehicleName; ?>">
                                                        </a>
                                                        <div class="sticker-area-2">
                                                            <span class="sticker-2"><?php echo $brand; ?></span>
                                                            <span class="sticker"><?php echo $vehicleType; ?></span>
                                                        </div><br>
                                                        <div class="add-actions">
                                                            <ul>
                                                                <li><a class="uren-add_cart" href="cart.html" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="ion-bag"></i></a></li>
                                                                <li><a class="uren-wishlist" href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-content">
                                                        <div class="product-desc_info">
                                                            <div class="rating-box"><br>
                                                                <ul>
                                                                    <li><i class="ion-android-star"></i></li>
                                                                    <li><i class="ion-android-star"></i></li>
                                                                    <li><i class="ion-android-star"></i></li>
                                                                    <li class="silver-color"><i class="ion-android-star"></i></li>
                                                                    <li class="silver-color"><i class="ion-android-star"></i></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-slide_item">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="view_car.php?id=<?php echo $vehicle_id?>">
                                                        <img class="primary-img" src="../admin/pages/<?php echo $carImage; ?>" alt="<?php echo $vehicleName; ?>">
                                                    </a>
                                                    <div class="sticker-area-2">
                                                        <span class="sticker-2"><?php echo $brand; ?></span>
                                                        <span class="sticker"><?php echo $vehicleType; ?></span>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <div class="product-desc_info">
                                                        <div class="rating-box">
                                                            <ul>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                                            </ul>
                                                        </div>
                                                        <h6><a class="product-name" href="single-product.html"><?php echo $vehicleName; ?></a></h6>
                                                        <div class="price-box">
                                                            <span class="new-price new-price-2"><?php echo $power; ?></span>
                                                        </div>
                                                        <div class="product-short_desc">
                                                            <p>Power: <?php echo $power; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            } else {
                                echo "<div class='col-lg-12'><div class='alert alert-warning text-center' role='alert'>No cars found in the database.</div></div>";
                            }
                            $conn->close();
                            ?>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="uren-paginatoin-area">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <ul class="uren-pagination-box primary-color">
                                                <li class="active"><a href="javascript:void(0)">1</a></li>
                                                <li><a href="javascript:void(0)">2</a></li>
                                                <li><a href="javascript:void(0)">3</a></li>
                                                <li><a href="javascript:void(0)">4</a></li>
                                                <li><a href="javascript:void(0)">5</a></li>
                                                <li><a class="Next" href="javascript:void(0)">Next</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include('../include/footer.php');?>
    </div>
    <?php include('../include/foot.php');?>
</body>
</html>
