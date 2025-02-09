<?php
session_start();
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
<!--        The checkout page must display the total and simulate 
            payment with a credit card. -->
        <?php
        echo 'Total to be paid: $'.$_SESSION['total']."<br><br>";
        ?>
<form action="validation.php" method="POST">
    Card Number: <input type="text" name="cardNumber"><br>
    Expiry: <input type="text" name="expiry"><br>
    CVV: <input type="text" name="CVV"><br>
<input type="submit">
</form>
        
    </body>
</html>
