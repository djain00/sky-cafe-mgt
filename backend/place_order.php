<?php
// Show all errors for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Connect to MySQL
$conn = new mysqli("localhost", "root", "", "sky_cafe");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $table = $_POST['table_number'];
    $name = $_POST['customer_name'];
    $items = isset($_POST['food_items']) ? implode(", ", $_POST['food_items']) : "";

    // Save to database
    $stmt = $conn->prepare("INSERT INTO orders (table_number, customer_name, food_items) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $table, $name, $items);

    if ($stmt->execute()) {
        echo "✅ Order placed successfully!";
        echo "<br><a href='../frontend/index.html'>Place another order</a>";
    } else {
        echo "❌ Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "❌ Invalid request method.";
}

$conn->close();
?>
