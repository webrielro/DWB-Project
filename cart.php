<?php
session_start();
require_once('../Mcvshop/components/db.php');

if (isset($_GET['product_id'])) {
    $productID = $_GET['product_id'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    if (isset($_SESSION['cart'][$productID])) {
        $_SESSION['cart'][$productID]['quantity']++;
    } else {
        $_SESSION['cart'][$productID]['quantity'] = 1;
    }

    header("Location: cart.php");
    exit();
}

include('../Mcvshop/components/navbar.php');
include ('../Mcvshop/components/hero.php');

if (isset($_GET['action']) && $_GET['action'] === 'remove' && isset($_GET['product_id'])) {
    header("Location: remove_from_cart.php?action=remove&product_id=" . $_GET['product_id']);
    exit();
}

$cartItems = [];
if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $productID => $item) {
        $result = $mysqli->query("SELECT * FROM product WHERE ProductID = '$productID'");
        $product = $result->fetch_assoc();

        if ($product) {
            $cartItems[] = [
                'product' => $product,
                'quantity' => $item['quantity']
            ];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MCV Shop - Shopping Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" defer></script>
    <link href="./css/products.css" rel="stylesheet">
    <link href="./css/navbar.css" rel="stylesheet">
    <link href="./css/cart.css" rel="stylesheet">
    <link href="./css/hero.css" rel="stylesheet">
    <link href="./css/footer.css" rel="stylesheet">
</head>
<body>

<div class="cart-wrapper">
    <h2>Your Shopping Cart</h2>
    <div class="cart-items">
        <?php
        if (!empty($cartItems)) {
            foreach ($cartItems as $cartItem) {
                echo '<div class="cart-item">';
                echo '<img src="' . $cartItem['product']['ImagePath'] . '" alt="Product Image">';
                echo '<h3>' . $cartItem['product']['Name'] . '</h3>';
                echo '<p>Price: ' . $cartItem['product']['Price'] . ' DKK</p>';
                echo '<p>Quantity: ' . $cartItem['quantity'] . '</p>';
                echo '<div class="cart-buttons">';
                echo '<a href="remove_from_cart.php?action=remove&product_id=' . $cartItem['product']['ProductID'] . '">Remove</a>';
                echo '<a href="#">Checkout</a>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p class="emptytext">Your cart is empty.</p>';
        }
        ?>
    </div>
</div>

</body>
</html>

<?php
include('../Mcvshop/components/footer.php');
?>
