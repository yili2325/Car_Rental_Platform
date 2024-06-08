<?php
session_start();

?>
<html>
<head>
    <title>Yi Li Car Rent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
</head>
<body>
<?php require_once('header.php') ?>
<div class="container">
    <div class="row">
        <div class="col-6 col-md-5 col-lg-4">
            <div class="flex-shrink-0 mt-6">
                <img class="card-img-top productDetailPic" id="carDetailPic">
            </div>
        </div>
        <div class="col-6 col-md-7 col-lg-8">
            <table class="table detailTable">
                <tbody>
                <tr>
                    <th scope="row">Type</th>
                    <td id="carType"></td>
                </tr>
                <tr>
                    <th scope="row">Brand</th>
                    <td id="carBrand"></td>
                </tr>
                <tr>
                    <th scope="row">Name</th>
                    <td id="carName"></td>
                </tr>
                <tr>
                    <th scope="row">Price Per Day</th>
                    <td>$<span id="carPrice"></span></td>
                </tr>
                <tr>
                    <th scope="row">Availability</th>
                    <td id="carAvailability"></td>
                </tr>
                <tr>
                    <th scope="row">Rent Start Date</th>
                    <td>
                        <input type="date" class="form-control" id="startDate">
                    </td>
                </tr>
                <tr>
                    <th scope="row">Rent End Date</th>
                    <td>
                        <input type="date" class="form-control" id="endDate">
                    </td>
                </tr>
                <tr>
                    <th scope="row">Quantity</th>
                    <td>
                        <input type="number" class="form-control" min="1" value="1" id="quantity">
                    </td>
                </tr>
                <tr>
                    <th scope="row">Total Cost</th>
                    <td id="totalCost">$0</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>


</div>
</div>
<div id="orderSection">
    <h1 class="informationTitle mt-4 ">Information Table</h1>
    <div class="container emailPageTable mt-5 mb-5">
        <form class="needs-validation" novalidate action="emailPage.php" method="post" id="checkoutForm">
            <div class="form-floating mb-4">
                <input class="form-control" id="nameInput" required name="name" placeholder="Name">
                <label for="nameInput">Name *</label>
                <div class="invalid-feedback">Name is required.</div>
            </div>
            <div class="form-floating mb-4">
                <input type="tel" class="form-control" id="mobileInput" required pattern="\d{10}" name="mobile"
                       placeholder="Mobile">
                <label for="mobileInput">Mobile Number *</label>
                <div class="invalid-feedback">Enter a 10-digit mobile number.</div>
            </div>
            <div class="form-floating mb-4">
                <input type="email" class="form-control" id="emailInput" required name="email" placeholder="Email">
                <label for="emailInput">Email *</label>
                <div class="invalid-feedback">Please enter a valid email address.</div>
            </div>
            <div class="form-floating mb-4">
                <select class="form-select" id="licenseInput" required pattern="Yes" name="driverLicense">
                    <option value="">Please select Yes / No</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
                <label for="licenseInput">Do you have a valid driver license ? *</label>
                <div class="invalid-feedback">You must have a valid driver license before rent a car.</div>
            </div>
            <div class="d-grid gap-2 col-6 mx-auto mt-4">
                <div class="text-success" id="successMessage"></div>
                <div class="text-danger" id="failMessage"></div>
                <div id="hideButton">
                    <button class="btn btn-primary ms-5" type="submit">Submit Order</button>
                    <button class="btn btn-danger ms-5" onclick="handleCancel()" type="button">Cancel Order</button>
                </div>

            </div>
        </form>
    </div>
</div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
<script src="jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"
        integrity="sha512-3j3VU6WC5rPQB4Ld1jnLV7Kd5xr+cq9avvhwqzbH/taCRNURoeEpoPBK9pDyeukwSxwRPJ8fDgvYXd6SkaZ2TA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="detail.js"></script>
</body>
</html>
