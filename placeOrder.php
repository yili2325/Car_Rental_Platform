<?php

// Function to read the JSON file and decode it into an array


header('Content-Type: application/json');
if ($_POST['quantity'] < $currentCar['quantity']){
    echo json_encode(["isSuccess" => false, "message" => "Quantity is not enough any more."]);
}  else {
    $conn = new mysqli("localhost", "root", "", "assignment2");
    $sql = "insert into orders(user_email,rent_start_date,rent_end_date, price, status, quantity, car_id) values (?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $status = 'unconfirmed';
    $stmt->bind_param("sssisii", $_POST['email'], $_POST['startDate'], $_POST['endDate'], $_POST['price'], $status, $_POST['quantity'], $_POST['id'] );
    $stmt->execute();
    $newOrderId = $conn->insert_id;
    echo json_encode(["isSuccess" => true, "orderId" => $newOrderId]);
}
?>
