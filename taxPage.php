<?php
session_start();
//$_SESSION['price'] = $_POST['price'];
//$price = $_POST['price'];
?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <!--        Calculate the tax based on the rate in Florence. 
                    Display the subtotal, tax, and total. Allow the 
                    user to proceed to the checkout or continue shopping.-->
        <?php
        $taxRate = 9.5;
        echo "Sub-total: ".$_SESSION['totalPrice']."<br>";
        $calTax = $_SESSION['totalPrice'] * ($taxRate / 100);
        echo "Tax: $calTax <br>";
        $_SESSION['total'] = $_SESSION['totalPrice'] + $calTax;
        echo "Total: $".$_SESSION['total']."<br>";
        ?>
        <form action="index.php" method="GET">
            <button type="submit">continue shopping</button>
        </form>
        <form action="checkout.php" method="POST">
            <button type="submit">Proceed to checkout</button>
        </form>
    </body>
</html>
