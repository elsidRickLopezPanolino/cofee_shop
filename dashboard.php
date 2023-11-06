<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>DASHBOARD</h1>
    <?php
    $hostname = "localhost";  // Replace with your database server's hostname or IP
    $username = "root"; // Replace with your database username
    $password = "1234"; // Replace with your database password
    $database = "coffee_shop"; // Replace with your database name


    // Create a new database connection
    $conn = new mysqli($hostname, $username, $password, $database);

    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);
    
    if ($result) {
        echo "<table>";
        echo "<tr><th>Name</th><th>Price</th><th>Description</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>". $row['name']."</td>";
            echo "<td>".$row['price']."</td>";
            echo "<td>".$row['description']."</td>";
            echo "</tr>";
            
        }
        echo "</table>";
                    $result->free();
    } else {
        echo "Error: " . $connection->error;
    }

    ?>
    <?php 
        function order($product_id){
            $sql = "INSERT INTO `coffee_shop`.`orders` (`customer_id`, `product_id`, `quantity`, `price`, `total_price`) 
            VALUES ('1', $product_id, '1', (SELECT products.price FROM products WHERE id=$product_id), '1');";     
            mysqli_query($conn, $sql); 
        }    
    ?>
    
    <script>
        function addOrder(product_id){
            <?php order(product_id)?>
            alert("ordered"+product_id)
        }
    </script>

</body>
</html>