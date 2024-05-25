<?php
session_start();
include('../include/head.php'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<style>
input, select {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  border: 1px solid #aaaaaa;
  border-radius: 4px;
  margin-bottom: 10px;
}

/* Mark input boxes that get an error on validation: */
input.invalid, select.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

/* Mark the active step: */
.step.active {
  opacity: 1;
}

.step.finish {
  background-color: #04AA6D;
}

/* Additional Styles */
.form-heading {
  background-color: #f8f9fa;
  padding: 10px;
  margin-bottom: 20px;
  border-radius: 4px;
}

.tab h4 {
  margin-bottom: 20px;
}

.button-container {
  margin-top: 20px;
  text-align: right;
}

.btn-custom {
  padding: 10px 20px;
  border-radius: 4px;
}

.btn-primary-custom {
  background-color: #007bff;
  border: none;
}

.btn-primary-custom:hover {
  background-color: #0056b3;
}

.btn-secondary-custom {
  background-color: #6c757d;
  border: none;
}

.btn-secondary-custom:hover {
  background-color: #5a6268;
}

.steps-indicator {
  text-align: center;
  margin-top: 30px;
}
</style>
<body class="template-color-1">

    <div class="main-wrapper">
        <?php include('../include/header.php'); ?>
        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <h2>List Your Car</h2>
                </div>
            </div>
        </div>
        <div class="uren-login-register_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <form id="carSubmissionForm" class="login-form" action="../controller/list_car.php" method="post" enctype="multipart/form-data">
                            <div class="tab">
                                <div class="form-heading">
                                    <h4>Vehicle Details</h4>
                                </div>
                                <label for="make">Make</label>
                                <input type="text" id="make" name="make" placeholder="Make" class="form-control mb-2" required>
                                
                                <label for="model">Model</label>
                                <input type="text" id="model" name="model" placeholder="Model" class="form-control mb-2" required>
                                
                                <label for="year">Year</label>
                                <input type="number" id="year" name="year" placeholder="Year" class="form-control mb-2" required>
                                
                                <label for="variant">Variant</label>
                                <input type="text" id="variant" name="variant" placeholder="Variant" class="form-control mb-2">
                                
                                <label for="color">Color</label>
                                <input type="text" id="color" name="color" placeholder="Color" class="form-control mb-2">
                            </div>

                            <div class="tab">
                                <div class="form-heading">
                                    <h4>Car Condition</h4>
                                </div>
                                <label for="plate_number">Plate Number</label>
                                <input type="text" id="plate_number" name="plate_number" placeholder="Plate Number" class="form-control mb-2">
                                
                                <label for="car_color">Car Color</label>
                                <input type="text" id="car_color" name="car_color" placeholder="Car Color" class="form-control mb-2">
                                
                                <label for="mileage">Mileage</label>
                                <input type="number" id="mileage" name="mileage" placeholder="Mileage" class="form-control mb-2">
                                
                                <label for="condition">Condition</label>
                                <select id="condition" name="condition" class="form-control mb-2" required>
                                    <option value="">Select Condition</option>
                                    <option value="new">New</option>
                                    <option value="used">Used</option>
                                    <option value="certified_pre_owned">Certified Pre-Owned</option>
                                </select>
                            </div>

                            <div class="tab">
                                <div class="form-heading">
                                    <h4>Pricing and Images</h4>
                                </div>
                                <label for="price">Price</label>
                                <input type="number" id="price" name="price" placeholder="Price" class="form-control mb-2" required>

                                <label for="car_images">Car Images</label>
                                <input type="file" id="car_images" name="car_images[]" multiple class="form-control mb-2">
                            </div>
                            <div class="button-container">
                                <button type="button" id="prevBtn" class="btn btn-secondary-custom btn-custom" onclick="nextPrev(-1)">Previous</button>
                                <button type="button" id="nextBtn" class="btn btn-primary-custom btn-custom" onclick="nextPrev(1)">Next</button>
                            </div>

                            <!-- Circles which indicate the steps of the form: -->
                            <div class="steps-indicator">
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </div>
    </div>

<?php include('../include/foot.php'); ?>
<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    //...the form gets submitted:
    document.getElementById("carSubmissionForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false:
      valid = false;
    }
  }
  // Validate the select field if it is in the current tab
  if (currentTab == 1) {
    var conditionSelect = document.getElementById("condition");
    if (conditionSelect.value == "") {
      conditionSelect.className += " invalid";
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}
</script>
</body>
</html>
