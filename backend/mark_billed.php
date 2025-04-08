<?php
$conn = new mysqli("localhost", "root", "", "sky_cafe");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id'];
$conn->query("UPDATE orders SET billed='Yes' WHERE id=$id");
$conn->close();
header("Location: ../frontend/billing.html");
?>
