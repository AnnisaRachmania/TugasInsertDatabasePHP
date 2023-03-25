<?php
    include ('connecttodatabase.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="select_product_style.css">
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
            $query = "SELECT * FROM products";
            $result_query = mysqli_query($koneksi, $query);

            echo "<center><h2>Data Products</h2></center><br>";

            if (mysqli_num_rows($result_query)>0){
                echo "<table border = '1'>
                <th> Product Code </th>
                <th> Product Name </th>
                <th> Product Line </th>
                <th> Product Scale </th>
                <th> Product Vendor </th>
                <th> Product Description </th>
                <th> Quantity In Stock </th>
                <th> Buy Price </th>
                <th> MSRP </th>";
                while($row = mysqli_fetch_assoc($result_query)) {
                    echo "<tr>";
                    echo "<td>".$row["productCode"]."</td>";
                    echo "<td>".$row["productName"]."</td>";
                    echo "<td>".$row["productLine"]."</td>";
                    echo "<td>".$row["productScale"]."</td>";
                    echo "<td>".$row["productVendor"]."</td>";
                    echo "<td>".$row["productDescription"]."</td>";
                    echo "<td>".$row["quantityInStock"]."</td>";
                    echo "<td>".$row["buyPrice"]."</td>";
                    echo "<td>".$row["MSRP"]."</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "Tidak ada data customer.";
            }
        ?>
    </body>
</html>