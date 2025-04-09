<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "user_data";

// Connect
$conn = new mysqli($servername, $username, $password, $database);

// Check
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_GET['name'];

$sql = "SELECT * FROM users WHERE name LIKE ?";
$stmt = $conn->prepare($sql);
$searchName = "%" . $name . "%";
$stmt->bind_param("s", $searchName);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Results</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: auto;
        }
        th, td {
            padding: 10px;
            border: 1px solid #444;
            text-align: center;
        }
        th {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Search Results for "<?php echo htmlspecialchars($name); ?>"</h2>

    <?php
    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Department</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['age']}</td>
                    <td>{$row['gender']}</td>
                    <td>{$row['department']}</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p style='text-align: center;'>No users found with the name \"$name\".</p>";
    }

    $stmt->close();
    $conn->close();
    ?>

    <div style="text-align: center;">
        <br><a href="index.php">← Back to Form</a>
    </div>
</body>
</html>
