<?php
    include ("connecttodatabase.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="insert_product_style.css">
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
    <center><h2>Insert Product</h2></center>

    <?php
        $sql = "SELECT productLine FROM productlines";
        $result = mysqli_query($koneksi, $sql);

        if($_SERVER['REQUEST_METHOD']=='POST'){
            $productCode = $_POST["productCode"];
            $productName = $_POST["productName"];
            $productLine = $_POST["productLine"];
            $productScale = $_POST["productScale"];
            $productVendor = $_POST["productVendor"];
            $productDescription = $_POST["productDescription"];
            $quantityInStock = $_POST["quantityInStock"];
            $buyPrice = $_POST["buyPrice"];
            $MSRP = $_POST["MSRP"];
            
        }

        $query = "INSERT INTO products (productCode, productName, productLine, productScale, productVendor, 
                  productDescription, quantityInStock, buyPrice, MSRP) 
                  VALUES ('$productCode', '$productName', '$productLine', '$productScale', '$productVendor', '$productDescription', '$quantityInStock', '$buyPrice', '$MSRP')";
        
        if(mysqli_query($koneksi, $query)){
            echo "<b>Product Berhasil Ditambahkan </b><br>";
        } else {
            echo "<b>!! Product Gagal Ditambahkan ke Database !!</b> <br>";
            echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
        }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <br><label>Product Code:</label>
            <input type="text" name="productCode"><br><br>
        <label>Product Name:</label>
            <input type="text" name="productName"><br><br>
        <label>Product Line:</label>
            <select name="productLine">
                <?php 
                    while($row = $result->fetch_assoc()){
                        echo "<option value ='".$row['productLine']."'>".$row['productLine']."</option>";
                    }
                ?>
            </select><br><br>
        <label>Product Scale:</label>
            <input type="text" name="productScale"><br><br>
        <label>Product Vendor:</label>
            <input type="text" name="productVendor"><br><br>
        <label>Product Description:</label>
            <input type="textarea" name="productDescription"><br><br>
        <label>Quantity In Stock:</label>
            <input type="number" name="quantityInStock"><br><br>
        <label>Buy Price:</label>
            <input type="text" name="buyPrice"><br><br>
        <label>MSRP:</label>
            <input type="text" name="MSRP"><br><br>

    <input type="submit" value="Submit"><br>
    </form>
</body>
</html>