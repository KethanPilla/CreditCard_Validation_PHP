<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

$product = array(
    'model'    => $_POST['model'],
    'storage'  => $_POST['storage'],
    'quantity' => $_POST['quantity']
);

if ($product['model'] == "16 Pro") {
    $_SESSION['Price'] = 999.00;
} elseif ($product['model'] == "16 Plus") {
    $_SESSION['Price'] = 899.00;
} else {
    $_SESSION['Price'] = 799.00;
}

if ($product['storage'] == "256GB") {
    $_SESSION['Price'] += 100;
} elseif ($product['storage'] == "512GB") {
    $_SESSION['Price'] += 200;
}

$product['price'] = $_SESSION['Price'] * $product['quantity'];

$_SESSION['cart'][] = $product;
?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
<head>
    <meta charset="UTF-8">
    <title>Order Summary</title>
</head>
<body>
    <h1>Order Summary</h1>
    <?php
    $_SESSION['totalPrice'] = 0;
    if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $index => $item) {
            echo "<h2>Item " . ($index + 1) . ":</h2>";
            echo "Model: " . $item['model'] . "<br>";
            echo "Storage: " . $item['storage'] . "<br>";
            echo "Quantity: " . $item['quantity'] . "<br>";
            echo "Sub Total: $" . number_format($item['price'], 2) . "<br><br>";
            $_SESSION['totalPrice'] = $item['price'] + $_SESSION['totalPrice'];
        }
    } else {
        echo "Your cart is empty.";
    }
    ?>
    <form action="index.php" method="POST">
        <button type="submit">Buy Another Product</button>
    </form>
    <form action="taxPage.php" method="POST">
        <button type="submit">Proceed</button>
    </form>
</body>
</html>
