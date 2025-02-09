<?php
session_start();
$_SESSION['cardNumber'] = $_POST['cardNumber'];
$_SESSION['expiry'] = $_POST['expiry'];
$_SESSION['CVV'] = $_POST['CVV'];

$card = $_SESSION['cardNumber'];
$expiry = $_SESSION['expiry'];
$CVV = $_SESSION['CVV'];
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
        <?php
        //echo $card;
validate($card);
        function validate($card) 
        {
            if (str_starts_with($card, "51") || str_starts_with($card, "52") ||
                    str_starts_with($card, "53") || str_starts_with($card, "54") ||
                    str_starts_with($card, "55")) 
            {
                    $length = strlen($card);
                    if ($length == 16) 
                    {
                        $endsWith = substr($card, -4);
                        echo "Your MASTERCARD ending ".$endsWith." has been"
                                . "charged $".$_SESSION['total'];
                    }
            }
            elseif (str_starts_with($card, "4"))
            {
                $length = strlen($card);
                if (($length == 13) || ($length == 16)) 
                    {
                    $endsWith = substr($card, -4);
                        echo "Your VISA ending ".$endsWith." has been"
                                . "charged $".$_SESSION['total'];
                    }
            }
            elseif(str_starts_with($card, "34") || str_starts_with($card, "37"))
            {
                $length = strlen($card);
                if ($length == 15) 
                    {
                        $endsWith = substr($card, -4);
                        echo "Your AMEX ending ".$endsWith." has been charged $".$_SESSION['total'];
                    }
            }
            else 
            {
                echo "Invalid card, your card has not been charged";
            }
        }
            ?>
    </body>
</html>
