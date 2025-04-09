<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Insert & Search User</title>
</head>
<body>
    <h2>Enter User Details</h2>
    <form action="store_data.php" method="POST">
        <label>Name:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Age:</label><br>
        <input type="number" name="age" required><br><br>

        <label>Gender:</label><br>
        <select name="gender" required>
            <option value="">Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select><br><br>

        <label>Department:</label><br>
        <input type="text" name="department" required><br><br>

        <button type="submit">Submit</button>
    </form>

    <hr>

    <h2>Search User by Name</h2>
    <form action="search.php" method="GET">
        <label>Name:</label><br>
        <input type="text" name="name" required><br><br>
        <button type="submit">Search</button>
    </form>

    <br>
    <a href="display.php">View All Data</a>
</body>
</html>
