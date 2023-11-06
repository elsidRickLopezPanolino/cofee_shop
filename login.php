<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>log-in</title>
</head>
<body>
    <h1>LOG IN</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required><br><br>
    <!-- <label for="username">Username:</label>
    <input type="text" name="username" id="username" required><br><br>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required><br><br> -->

    <input type="submit" name="submit" value="Log in">
    </form>

    <?php

    $hostname = "localhost";  // Replace with your database server's hostname or IP
    $username = "root"; // Replace with your database username
    $password = "1234"; // Replace with your database password
    $database = "coffee_shop"; // Replace with your database name


    // Create a new database connection
    $conn = new mysqli($hostname, $username, $password, $database);
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        // $username = $_POST["username"];
        // $password = $_POST["password"];

        $sql = "SELECT id FROM users WHERE email = '".$email."'";     

        $result = $conn->query($sql);

        if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo $row['id'];
            }
        }
        else{
            echo "no result";
        }

    }
    ?>
</body>
</html>