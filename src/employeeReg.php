<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Registration</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="logo"><img src="./images/newswave" alt="logo"></div>
            <ul class="nav-links">
                <li><a href="success.php" id="login">Admin</a></li>
                <li><a href="aboutUs.php">About Us</a></li>
                <li><a href="help.php" id="Help">Help</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <div class="login-container" id="login-container1">
            <form action="employee.php" method="post">
                <div class="login-box">
                    <img src="./images/newswave.png" alt="logo" class="login-logo">
                    <h2>Employee Registration</h2>
                    <input type="text" id="firstName" name="firstName" placeholder="First Name" required>
                    <input type="text" id="lastName" name="lastName" placeholder="Last Name" required>
                    <label for="gender">Gender</label>
                    <select id="gender" name="gender" required>
                        <option value="m">Male</option>
                        <option value="f">Female</option>
                    </select>
                    <input type="email" id="email" name="email" placeholder="Email" required>
                    <input type="text" id="username" name="username" placeholder="Username" required>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <input type="password" id="passwordConf" name="passwordConf" placeholder="Confirm Password" required>
                    <input type="text" id="phoneNumber" name="phoneNumber" placeholder="Phone Number" required>
                    <input type="text" id="area" name="area" placeholder="Usual Area" required>
                    <button type="submit" name="register">Register</button>
                </div>
            </form>
        </div>
    </div>

    <?php
    $conn = new mysqli('localhost', 'root', '', 'news');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["register"])) {
            $firstName = $_POST["firstName"];
            $lastName = $_POST["lastName"];
            $gender = $_POST["gender"];
            $email = $_POST["email"];
            $username = $_POST["username"];
            $password = $_POST["password"];
            $passwordConf = $_POST["passwordConf"];
            $phoneNumber = $_POST["phoneNumber"];
            $area = $_POST["area"];

            if ($password === $passwordConf) {
                $sql = "INSERT INTO employees (firstName, lastName, gender, email, username, password, phoneNumber, area) VALUES ('$firstName', '$lastName', '$gender', '$email', '$username', '$password', '$phoneNumber', '$area')";

                if ($conn->query($sql) === TRUE) {
                    echo "<script>alert('Registration successful');</script>";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "<script>alert('Passwords do not match');</script>";
            }
        }
    }

    $conn->close();
    ?>
</body>

</html>
