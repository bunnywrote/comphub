<?php
//    var_dump($_POST);

    /* show success alert */
//    if (!$success) {
//        echo "<p>Success validation</p>";
//        exit;
//    }
session_start();
$_SESSION["firstName"] = $_POST["firstName"];
$_SESSION["lastName"] = $_POST["lastName"];
$_SESSION["street"] = $_POST["street"];
$_SESSION["city"] = $_POST["city"];
$_SESSION["state"] = $_POST["state"];
$_SESSION["zip"] = $_POST["zip"];

var_dump($_SESSION);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Purchase Confirmation</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="..\assets\stylesheets\purchase.css">
    </head>
    <body>
        <div>
            <p><h2>Purchase Summary</h2></p>

            <p>First Name: <?=$_POST['firstName'];?></p>
            <p>Last Name: <?=$_POST['lastName'];?></p>
            <p>Street: <?=$_POST['street'];?></p>
            <p>City: <?=$_POST['city'];?></p>
            <p>State: <?=$_POST['state'];?></p>
            <p>Zip: <?=$_POST['zip'];?></p>
<!--            <p>E-Mail: --><?//=$_POST['email'];?><!--</p>-->
        </div>

        <div>
            <p><h2>Purchased Items</h2></p>
            <p>Count: <?=$_POST['count'];?></p>
            <p>Total: <?=$_POST['totalPrice'];?></p>
        </div>

        <div>
            <p><h2>Payment & Shipping methods</h2></p>
            <p>Payment :<?=$_POST['payment'];?></p>
            <p>Shipment: <?=$_POST['shipping'];?></p>
            <p>Gift Box: <?=$_POST['selectGiftBox'];?></p>
        </div>

        <div class="buttons">
            <input type="button" class="buttons-child" id="backButton" value="Back" onclick="goBack()">
            <input type="button" class="buttons-child" id="submitButton" value="Submit" onclick="alertWindow()">
        </div>

        <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
        <script src="..\assets\scripts\alertWindow.js" async></script>
    </body>
</html>


