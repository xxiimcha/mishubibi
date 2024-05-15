<?php
include('../include/head.php');?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<style>
input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
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

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #04AA6D;
}
</style>
<body class="template-color-1">

    <div class="main-wrapper">
        <?php include('../include/header.php');?>
        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <h2>List Your Car</h2>
                </div>
            </div>
        </div>
        <div class="uren-login-register_area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-8">
                    <form id="carSubmissionForm" class="login-form" action="../controller/list_car.php" method="post" enctype="multipart/form-data">
                        
                        <div class="tab"><h4>Vehicle Details</h4>
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
                            <h4>Car Condition</h4>
                            <input type="text" name="plate_number" placeholder="Plate Number" class="form-control mb-2">
                            <input type="text" name="car_color" placeholder="Car Color" class="form-control mb-2">
                            <input type="number" name="mileage" placeholder="Mileage" class="form-control mb-2">
                        </div>

                        <div class="tab">
                            <label for="listingType">Listing Type:</label>
                            <select id="listingType" name="listingType" class="form-control mb-2">
                                <option value="1">For Sale</option>
                                <option value="2">For Rent</option>
                            </select>

                            <h4>Car Images</h4>
                            <input type="file" name="car_images[]" multiple class="form-control mb-2">
                        </div>
                        <div style="overflow:auto;">
                            <div style="float:right;">
                                <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                            </div>
                        </div>

                        <!-- Circles which indicates the steps of the form: -->
                        <div style="text-align:center;margin-top:40px;">
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        </div>

                        </form>
                    </div>
                    <div class="col-md-2">
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include('../include/foot.php');?>
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