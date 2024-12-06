<?php
// Database configuration
$server = "localhost";
$username = "root";
$password = "";
$db = "aayush";

// Connect to the database
$conn = mysqli_connect($server, $username, $password, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle Create
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['create'])) {
        $firstName = $_POST['FirstName'];
        $lastName = $_POST['LastName'];
        $rollNo = $_POST['ROll'];

        $createSql = "INSERT INTO tbl_students (FirstName, LastName, ROll) VALUES ('$firstName', '$lastName', '$rollNo')";
        mysqli_query($conn, $createSql);
    }

    // Handle Update
    if (isset($_POST['update'])) {
        $firstName = $_POST['FirstName'];
        $lastName = $_POST['LastName'];
        $rollNo = $_POST['ROll'];

        // The form doesn't include an ID, so we use a unique identifier to update rows
        $updateSql = "UPDATE tbl_students SET FirstName='$firstName', LastName='$lastName', ROll='$rollNo' WHERE FirstName='$firstName' AND LastName='$lastName' AND ROll='$rollNo'";
        mysqli_query($conn, $updateSql);
    }

    // Handle Delete
    if (isset($_POST['delete'])) {
        $firstName = $_POST['FirstName'];
        $lastName = $_POST['LastName'];
        $rollNo = $_POST['ROll'];

        $deleteSql = "DELETE FROM tbl_students WHERE FirstName='$firstName' AND LastName='$lastName' AND ROll='$rollNo'";
        mysqli_query($conn, $deleteSql);
    }
}

// Retrieve all records from the tbl_students table
$sql = "SELECT * FROM tbl_students";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operations</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        form {
            margin-bottom: 20px;
        }
        input, button {
            margin: 5px;
        }
    </style>
</head>
<body>
    <h1>Student Management</h1>

    <!-- Create New Record -->
    <h2>Create New Student</h2>
    <form method="POST">
        <input type="text" name="FirstName" placeholder="First Name" required>
        <input type="text" name="LastName" placeholder="Last Name" required>
        <input type="text" name="RollNo" placeholder="Roll No" required>
        <button type="submit" name="create">Create</button>
    </form>

    <!-- Display Records -->
    <h2>Student List</h2>
    <?php if (mysqli_num_rows($result) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Roll No</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <form method="POST">
                            <td>
                                <input type="text" name="FirstName" value="<?= htmlspecialchars($row['FirstName']); ?>" required>
                            </td>
                            <td>
                                <input type="text" name="LastName" value="<?= htmlspecialchars($row['LastName']); ?>" required>
                            </td>
                            <td>
                                <input type="text" name="RollNo" value="<?= htmlspecialchars($row['ROll']); ?>" required>
                            </td>
                            <td>
                                <button type="submit" name="update">Update</button>
                                <button type="submit" name="delete">Delete</button>
                            </td>
                        </form>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No students found.</p>
    <?php endif; ?>

    <?php
    // Close the database connection
    mysqli_close($conn);
    ?>
</body>
</html>
