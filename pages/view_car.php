<?php 
include('../controller/config.php');
include('../include/head.php');

// Get the car ID from the URL
$carId = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch car details from the database
$sql = "SELECT * FROM cars WHERE id = $carId";
$result = $conn->query($sql);
$car = $result->fetch_assoc();

if (!$car) {
    echo "Car not found!";
    exit;
}
?>
<body class="template-color-1">
    <div class="main-wrapper">
        <?php include('../include/header.php');?>

        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <h2><?php echo htmlspecialchars($car['vehicle_name']); ?></h2>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li class="active"><?php echo htmlspecialchars($car['vehicle_name']); ?></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="sp-area">
            <div class="container-fluid">
                <div class="sp-nav">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="sp-img_area">
                                <div class="sp-img_slider slick-img-slider uren-slick-slider" data-slick-options='{
                                "slidesToShow": 1,
                                "arrows": false,
                                "fade": true,
                                "draggable": false,
                                "swipe": true,
                                "asNavFor": ".sp-img_slider-nav"
                                }'>
                                    <div class="single-slide zoom">
                                        <img src="<?php echo '../admin/pages/' . htmlspecialchars($car['car_image']); ?>" alt="<?php echo htmlspecialchars($car['vehicle_name']); ?>">
                                    </div>
                                </div>
                                <div class="sp-img_slider-nav slick-slider-nav uren-slick-slider slider-navigation_style-3" data-slick-options='{
                                    "slidesToShow": 3,
                                    "asNavFor": ".sp-img_slider",
                                    "focusOnSelect": true,
                                    "arrows" : true,
                                    "spaceBetween": 30
                                }' data-slick-responsive='[
                                        {"breakpoint":1501, "settings": {"slidesToShow": 3}},
                                        {"breakpoint":992, "settings": {"slidesToShow": 4}},
                                        {"breakpoint":768, "settings": {"slidesToShow": 3}},
                                        {"breakpoint":575, "settings": {"slidesToShow": 2}}
                                    ]'>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="sp-content">
                                <div class="sp-heading">
                                    <h5><?php echo htmlspecialchars($car['vehicle_name']); ?></h5>
                                </div>
                                <span class="reference">Reference: <?php echo htmlspecialchars($car['id']); ?></span>
                                <div class="rating-box">
                                    <ul>
                                        <li><i class="ion-android-star"></i></li>
                                        <li><i class="ion-android-star"></i></li>
                                        <li><i class="ion-android-star"></i></li>
                                        <li class="silver-color"><i class="ion-android-star"></i></li>
                                        <li class="silver-color"><i class="ion-android-star"></i></li>
                                    </ul>
                                </div>
                                <div class="sp-essential_stuff">
                                    <ul>
                                        <li>Brand: <a href="javascript:void(0)"><?php echo htmlspecialchars($car['brand']); ?></a></li>
                                        <li>Vehicle Type: <a href="javascript:void(0)"><?php echo htmlspecialchars($car['vehicle_type']); ?></a></li>
                                        <li>Power: <a href="javascript:void(0)"><?php echo htmlspecialchars($car['power']); ?></a></li>
                                    </ul>
                                </div>
                                <div class="uren-tag-line">
                                    <h6>Tags:</h6>
                                    <a href="javascript:void(0)">vehicle</a>,
                                    <a href="javascript:void(0)">car</a>,
                                    <a href="javascript:void(0)">bike</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sp-product-tab_area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sp-product-tab_nav">
                            <div class="product-tab">
                                <ul class="nav product-menu">
                                    <li><a class="active" data-toggle="tab" href="#description"><span>Description</span></a></li>
                                    <li><a data-toggle="tab" href="#specification"><span>Specification</span></a></li>
                                    <li><a data-toggle="tab" href="#reviews"><span>Reviews</span></a></li>
                                </ul>
                            </div>
                            <div class="tab-content uren-tab_content">
                                <div id="reviews" class="tab-pane" role="tabpanel">
                                    <div class="tab-pane active" id="tab-review">
                                        <form class="form-horizontal" id="form-review">
                                            <div id="review">
                                                <table class="table table-striped table-bordered">
                                                    <tbody id="reviews-list">
                                                        <!-- Existing reviews will be loaded here -->
                                                    </tbody>
                                                </table>
                                            </div>
                                            <h2>Write a review</h2>
                                            <div class="form-group required second-child">
                                                <div class="col-sm-12 p-0">
                                                    <label class="control-label">Share your opinion</label>
                                                    <textarea class="review-textarea" name="review_text" id="review_text"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group last-child required">
                                                <div class="col-sm-12 p-0">
                                                    <button type="button" id="submit-review" class="uren-btn-2">Continue</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><br><br>
        <?php include('../include/footer.php');?>
    </div>
    <?php include('../include/foot.php');?>

    <script>
    $(document).ready(function(){
        var carId = <?php echo $carId; ?>;

        function loadReviews() {
            $.ajax({
                url: '../controller/fetch_review.php',
                type: 'POST',
                data: { car_id: carId },
                success: function(response) {
                    var reviews = JSON.parse(response);
                    var reviewsHtml = '';
                    for (var i = 0; i < reviews.length; i++) {
                        reviewsHtml += '<tr>';
                        reviewsHtml += '<td style="width: 50%;"><strong>Customer</strong></td>';
                        reviewsHtml += '<td class="text-right">' + new Date(reviews[i].date_created).toLocaleDateString() + '</td>';
                        reviewsHtml += '</tr>';
                        reviewsHtml += '<tr>';
                        reviewsHtml += '<td colspan="2">';
                        reviewsHtml += '<p>' + reviews[i].review_text + '</p>';
                        reviewsHtml += '</td>';
                        reviewsHtml += '</tr>';
                    }
                    $('#reviews-list').html(reviewsHtml);
                }
            });
        }

        $('#submit-review').click(function(){
            var reviewText = $('#review_text').val();
            
            $.ajax({
                url: '../controller/add_review.php',
                type: 'POST',
                data: {
                    car_id: carId,
                    review_text: reviewText
                },
                success: function(response){
                    var res = JSON.parse(response);
                    if(res.status == 'success'){
                        alert(res.message);
                        loadReviews(); // Reload the reviews without reloading the page
                    } else {
                        alert(res.message);
                    }
                }
            });
        });

        // Load reviews on page load
        loadReviews();
    });
    </script>
</body>
</html>

<?php 
$conn->close();
?>