<?php
$conn = new mysqli("localhost", "root", "", "assignment2");
$sql = "UPDATE orders SET status = 'confirmed' WHERE id = ? " ;
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_GET['id']);
$stmt->execute();

$sql = "SELECT car_id, quantity FROM orders WHERE id = ? ";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_GET['id']);
$stmt->execute();
$carId = 0;
$quantity = 0;
$stmt->bind_result($carId, $quantity);
$stmt->fetch();
$stmt->close();

function readCarsJson($filePath) {
    if (!file_exists($filePath)) {
        die("File not found.");
    }
    $jsonContent = file_get_contents($filePath);
    return json_decode($jsonContent, true);
}

// Function to save the modified array back to the JSON file
function saveCarsJson($filePath, $carsArray) {
    $jsonContent = json_encode($carsArray, JSON_PRETTY_PRINT);
    file_put_contents($filePath, $jsonContent);
}
$carsData = readCarsJson('cars.json');
$currentCar = null;
foreach ($carsData['cars'] as $key => $car) {
    if ($car['id'] == $carId) {
        $carsData['cars'][$key]['quantity'] -= $quantity ;
        if($carsData['cars'][$key]['quantity'] > 0){
            $carsData['cars'][$key]['availability'] = 'Yes';
        }else{
            $carsData['cars'][$key]['availability'] = 'No';
        }
        break;
    }
}
saveCarsJson('cars.json', $carsData);
?>

<html>
<head>
    <title>Yi Li Car Rent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <link href="./style.css" rel="stylesheet">
    <script src="jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js" integrity="sha512-3j3VU6WC5rPQB4Ld1jnLV7Kd5xr+cq9avvhwqzbH/taCRNURoeEpoPBK9pDyeukwSxwRPJ8fDgvYXd6SkaZ2TA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="index.js"></script>
</head>
<body>
<header class="my-header shadow-lg p-3 rounded d-block">
    <a class="btn btn-primary" type="button" href="carReservation.php">Reservation</a>
    <a href="index.php" class="text-decoration-none float-end">
        <img class="logo" href="index.php" src="images/logo.png" alt="Yi Li's Car Rent Shop"/>
        <span class="title fw-bold">Yi Li's Car Rent</span>
    </a>
</header>
<h1 class="fw-bolder fs-3 text-center mt-5">Your order has been confirmed, thanks for having the journey with us!</h1>

<script>
    $.cookie('currentCar', null);
</script>
</body>
</html>