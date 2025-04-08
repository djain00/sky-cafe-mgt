<?php
$conn = new mysqli("localhost", "root", "", "sky_cafe");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM orders ORDER BY order_time DESC");

$orders = [];

while($row = $result->fetch_assoc()) {
    $orders[] = $row;
}

header('Content-Type: application/json');
echo json_encode($orders);
$conn->close();
?>
