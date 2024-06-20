<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Employees</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        .container, .table-container {
            margin: 20px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            padding: 8px 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="logo"><img src="./images/newswave.png" alt="logo"></div>
            <ul class="nav-links">
                <li><a href="success.php" id="login">Admin</a></li>
                <li><a href="aboutUs.php">About Us</a></li>
                <li><a href="help.php" id="Help">Help</a></li>
            </ul>
        </nav>
    </header>

    <div class="table-container">
        <h2>Manage Employees</h2>
        <?php
        $conn = new mysqli('localhost', 'root', '', 'news');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["delete_employee"])) {
                $employeeId = $_POST["delete_employee"];
                $delete_sql = "DELETE FROM employees WHERE id = $employeeId";
                if ($conn->query($delete_sql) === TRUE) {
                    echo "Employee deleted successfully";
                } else {
                    echo "Error deleting employee: " . $conn->error;
                }
            }

            if (isset($_POST["edit_employee"])) {
                $employeeId = $_POST["edit_employee"];
                $edit_sql = "SELECT * FROM employees WHERE id = $employeeId";
                $result = $conn->query($edit_sql);

                if ($result->num_rows == 1) {
                    $row = $result->fetch_assoc();
                    echo '<form method="post" action="employeeManagement.php">';
                    echo '<input type="hidden" name="id" value="' . $employeeId . '">';
                    echo 'First Name:<br><input type="text" name="firstName" value="' . $row["firstName"] . '"><br>';
                    echo 'Last Name:<br><input type="text" name="lastName" value="' . $row["lastName"] . '"><br>';
                    echo 'Gender:<br><input type="text" name="gender" value="' . $row["gender"] . '"><br>';
                    echo 'Email:<br><input type="email" name="email" value="' . $row["email"] . '"><br>';
                    echo 'Username:<br><input type="text" name="username" value="' . $row["username"] . '"><br>';
                    echo 'Password:<br><input type="password" name="password" value="' . $row["password"] . '"><br>';
                    echo 'Phone Number:<br><input type="text" name="phoneNumber" value="' . $row["phoneNumber"] . '"><br>';
                    echo 'Usual Area:<br><input type="text" name="area" value="' . $row["area"] . '"><br>';
                    echo '<input type="submit" name="update_employee" value="Update">';
                    echo '</form>';
                } else {
                    echo "Error: Employee not found.";
                }
            }

            if (isset($_POST["update_employee"])) {
                $id = $_POST["id"];
                $firstName = $_POST["firstName"];
                $lastName = $_POST["lastName"];
                $gender = $_POST["gender"];
                $email = $_POST["email"];
                $username = $_POST["username"];
                $password = $_POST["password"];
                $phoneNumber = $_POST["phoneNumber"];
                $area = $_POST["area"];

                $update_sql = "UPDATE employees SET firstName='$firstName', lastName='$lastName', gender='$gender', email='$email', username='$username', password='$password', phoneNumber
