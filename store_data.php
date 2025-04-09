<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "user_data";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch POST data
$name = $_POST['name'];
$email = $_POST['email'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$department = $_POST['department'];

// Prepare and bind
$sql = "INSERT INTO users (name, email, age, gender, department) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssiss", $name, $email, $age, $gender, $department);

// Execute
if ($stmt->execute()) {
    echo "Data inserted successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
