<?php
require_once('../Mcvshop/components/db.php');

?>

<div class="productswrapper">
    <h2>Recommended Products</h2>
    <div class="productscontainer" id="recommendedProductsContainer">
        <?php
        
        $result = $mysqli->query("SELECT * FROM product WHERE IsRecommended = TRUE");
        $recommendedProducts = $result->fetch_all(MYSQLI_ASSOC);

        foreach ($recommendedProducts as $product) {
            echo '<div class="card" style="width: 18rem;">';
            echo '<img class="card-img-top" src="' . $product['ImagePath'] . '" alt="Card image cap">';
            echo '<div class="card-body" id="changed-card-body">';
            echo '<h5 class="card-title">' . $product['Name'] . '</h5>';
            echo '<p class="card-text">' . $product['Price'] . ' DKK</p>';
            echo '<a href="cart.php?product_id=' . $product['ProductID'] . '" class="buyproductsbtn">Add to cart</a>';
            echo '</div>';
            echo '</div>';
        }

        ?>
    </div>
</div>
