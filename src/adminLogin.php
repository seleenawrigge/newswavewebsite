<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo"><img src="./images/newswave" alt="logo"></div>
            
       
        </nav>
    </header>
    <div class="background"></div>
    <div class="container">
        <div class="login-container" id="login-container1">
            <div class="login-box">
           
                <h2>Admin Login</h2>
                <form method="post" action="adminLogin.php">
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="password" name="password" placeholder="Password" maxlength="20" required>
                    <button type="submit">Login</button>
                </form>
                <?php
                if (isset($_POST['username']) && isset($_POST['password'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    // Check if the provided username and password are correct
                    if ($username === "uoc" && $password === "uoc") {
                        // Redirect to another web page (e.g., success.php)
                        header('Location: success.php');
                        exit();
                    } else {
                        // Display an error message
                        echo "Invalid username or password.";
                    }
                }
                ?>
            </div>
        </div>
    </div>
    
</body>
</html>
