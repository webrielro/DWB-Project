<?php 
require_once('../Mcvshop/components/db.php');
include('../Mcvshop/components/navbar.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MCV Shop - Welcome to DWB Project E-commerce!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" defer></script>
    <link href="./css/newssection.css" rel="stylesheet">
    <link href="./css/products.css" rel="stylesheet">
    <link href="./css/navbar.css" rel="stylesheet">
    <link href="./css/hero.css" rel="stylesheet">
    <link href="./css/footer.css" rel="stylesheet">
</head>
<body>

<div class="productswrapperd">
    <h2>All Products</h2>
    <div class="productspagectn" id="regularProductsContainer">
        <?php
        $result = $mysqli->query("SELECT * FROM product WHERE IsRecommended = FALSE");
        $regularProducts = $result->fetch_all(MYSQLI_ASSOC);

        foreach ($regularProducts as $product) {
            echo '<div class="card" style="width: 18rem;">';
            echo '<img class="card-img-top" src="' . $product['ImagePath'] . '" alt="Card image cap">';
            echo '<div class="card-body" id="changed-card-body">';
            echo '<h5 class="card-title">' . $product['Name'] . '</h5>';
            echo '<p class="card-text">' . $product['Price'] . ' DKK</p>';
            echo '<a href="cart.php?product_id=' . $product['ProductID'] . '" class="buyproductsbtn">Add to cart</a>';
            echo '</div>';
            echo '</div>';
        }

        $mysqli->close();
        ?>
    </div>
</div>

<?php 
include('../Mcvshop/components/footer.php');
?>
</body>
</html>
