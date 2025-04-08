<?php
$conn = new mysqli("localhost", "root", "", "sky_cafe");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id'];
$status = $_POST['status'];

$conn->query("UPDATE orders SET status='$status' WHERE id=$id");
$conn->close();
header("Location: ../frontend/kitchen.html");
?>
