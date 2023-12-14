<?php
session_start();

if (isset($_GET['action']) && $_GET['action'] === 'remove' && isset($_GET['product_id'])) {
    $removeID = $_GET['product_id'];

    if (isset($_SESSION['cart'][$removeID])) {
        unset($_SESSION['cart'][$removeID]);
    }
}

header("Location: cart.php");
exit();
?>
