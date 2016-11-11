<?php
//    var_dump($_POST);

    /* show success alert */
//    if (!$success) {
//        echo "<p>Success validation</p>";
//        exit;
//    }

    $success = true;
    $price = $count = '';
    // define variables
    $name = $address = $email = $e_name = $e_address = $e_email = '';

    /* validate name */
    if (empty($_POST['name'])) {
        $e_name = 'Name is required';
//        $success = false;
    } else {
        $name = $_POST['name'];
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    /* validate address */
    if (empty($_POST['address'])) {
        $e_address = 'Please, input an address';
        $success = false;
    } else
        $email = $_POST['address'];

    /* validate email */
    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $e_email = 'Please, input an email';
        $success = false;
    } else
        $email = $_POST['email'];

    /* show success alert */
//    if ($success) {
//        echo "<p>Success validation</p>";
//        exit;
//    }
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
<!--            <p>Name: --><?//=$name;?><!--</p>-->
            <p>Name: <?=$_POST['name'];?></p>
<!--            <p>Address: --><?//=$address;?><!--</p>-->
<!--            <p>E-Mail: --><?//=$email;?><!--</p>-->
            <p>Address: <?=$_POST['address'];?></p>
            <p>E-Mail: <?=$_POST['email'];?></p>
        </div>

        <div>
            <p><h2>Purchased Items</h2></p>
<!--            <p>Price: --><?//=$_POST['price'];?><!--</p>-->
            <p>Count: <?=$_POST['count'];?></p>
            <p>Total: <?=$_POST['totalPrice'];?></p>
        </div>

        <div>
            <p><h2>Payment & Shipping methods</h2></p>
            <p>Payment :<?=$_POST['payment'];?></p>
            <p>Shipment: <?=$_POST['shipping'];?></p>
            <p>Gift Box: <?=$_POST['selectGiftBox'];?></p>
        </div>

        <div class="submitButton">
            <button onclick="alertWindow()">Send</button>
        </div>

        <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
        <script src="..\assets\scripts\alertWindow.js" async></script>
    </body>
</html>


