<?php
    include ('connecttodatabase.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="select_customer_style.css">
    </head>
    <body>
    <div class="menu">
        <ul class="ul-menu">
            <li class="li-menu">
                <a href="index.php" class="a-menu"><?php echo"Home"?></a></li>
            <li class="li-menu">
                <a href="select_customer.php" class="a-menu" ><?php echo"Customers Data"?></a> </li>
            <li class="li-menu">
                <a href="select_product.php" class="a-menu" ><?php echo"Products Data"?></a></li>
            <li class="li-menu">
                <a href="insert_customers.php" class="a-menu" ><?php echo"Insert Customer"?></a></li>
            <li class="li-menu">
                <a href="insert_product.php" class="a-menu" ><?php echo"Insert Product"?></a></li>
        </ul>
    </div><br>
    
    <?php
        $query = "SELECT * FROM customers";
        $result_query = mysqli_query($koneksi, $query);

        echo "<center><h2>Data Customers</h2></center><br>";

        if (mysqli_num_rows($result_query) > 0) {
            echo "<table border ='2'>
            <tr>
            <th> Customer Number </th>
            <th> Customer Name </th>
            <th> Contact Last Name </th>
            <th> Contact First Name </th>
            <th> Phone </th>
            <th> Address Line 1 </th>
            <th> Address Line 2 </th>
            <th> City </th>
            <th> State </th>
            <th> Postal Code </th>
            <th> Country </th>
            <th> Sales Rep Employee Number </th>
            <th> Credit Limit </th>
            </tr>";
            while($row = mysqli_fetch_assoc($result_query)) {
                echo "<tr>";
                echo "<td>".$row["customerNumber"]."</td>";
                echo "<td>".$row["customerName"]."</td>";
                echo "<td>".$row["contactLastName"]."</td>";
                echo "<td>".$row["contactFirstName"]."</td>";
                echo "<td>".$row["phone"]."</td>";
                echo "<td>".$row["addressLine1"]."</td>";
                echo "<td>".$row["addressLine2"]."</td>";
                echo "<td>".$row["city"]."</td>";
                echo "<td>".$row["state"]."</td>";
                echo "<td>".$row["postalCode"]."</td>";
                echo "<td>".$row["country"]."</td>";
                echo "<td>".$row["salesRepEmployeeNumber"]."</td>";
                echo "<td>".$row["creditLimit"]."</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Tidak ada data customer.";
        }
    ?>
        
    </body>
</html>