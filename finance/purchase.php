<?php
//    include('purchaseConfirm.php');

//    var_dump($_GET);

    if(empty($_GET['price']) || empty($_GET['count'])){
        // go to previous page if GET is empty
        // TODO auch beim Reload sollte funktionieren
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    function getTotalPrice(){
        return $_GET['price'] * $_GET['count'];
    }

    $name = $address = $email = '';
    $nameErr = $addressErr = $emailErr = '';
    $success = false;

    /* validate name */
    if (empty($_POST['name'])) {
        $nameErr = 'Name is required';
    } else {
        $name = $_POST['name'];
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
        $success = true;
    }

    /* validate address */
    if (empty($_POST['address'])) {
        $addressErr = 'Please, input an address';
        $success = false;
    } else {
        $address = $_POST['address'];
        $success = true;
    }

    /* validate email */
    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $emailErr = 'Please, input a valid email';
        $success = false;
    } else {
        $email = $_POST['email'];
        $success = true;
    }

    /* show success alert */
//    if (!$success) {
//        echo "<p>Success validation</p>";
//        exit;
//    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Purchase</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="..\assets\stylesheets\purchase.css">
    </head>
    <body>
<!--        <form action=--><?php //echo htmlspecialchars($_SERVER["PHP_SELF"]);?>
<!--            method="post">-->
        <form action=<?php echo ('purchaseConfirm.php');?>
            method="post">
            <div>
                <p><h2>Bought Articles</h2></p>
                <p>Price:<?= ' '.$_GET['price'].'  CHF';?></p>
                <p><input type="hidden" name="price" value=<?= '"'.$_GET['price'].'"';?>></p>
                <p>Count:<?= ' '.$_GET['count'];?></p>
                <p><input type="hidden" name="count" value=<?= '"'.$_GET['count'].'"';?>></p>
                <p>Total price:<?= ' '.getTotalPrice();?></p>
                <p><input type="hidden" name="totalPrice" value=<?= '"'.getTotalPrice().'"';?>></p>
            </div>
            <div>
                <p><h2 id="shippingMethod">Shipping Method</h2></p>
                <!-- The same name attribute, so only 1 choice at the time -->
                <div class="radioText">
                    <input type="radio" name="shipping" value="avion">
                    <label>par Avion</label>
                </div>
                <div class="radioText">
                    <input type="radio" name="shipping" value="train">
                    <label>Train</label>Train
                </div>
                <div class="radioText">
                    <input type="radio" name="shipping" value="default">
                    <label>Default</label>
                </div>
            </div>

            <!-- Payment method -->
            <div>
                <p><h2 id="paymentMethod">Payment Method</h2></p>

                <div class="radioText">
                    <input type="radio" name="payment" value="paycheck">
                    <label>Paycheck</label>
                    <img class="maestro" src="..\assets\images\maestro.svg">
                </div>
                <div class="radioText">
                    <input type="radio" name="payment" value="visa">
                    <label>Visa</label>
                    <img class="visa" src="..\assets\images\visa.svg">
                </div>
                <div class="radioText">
                    <input type="radio" name="payment" value="mastercard">
                    <label>Mastercard</label>
                    <img class="mastercard" src="..\assets\images\mastercard.svg">
                </div>
            </div>

            <!-- Gift Box -->
            <div>
                <p><h3 id="giftBox">Gift Box</h3></p>

                <div class="giftBox">
                    <select name="selectGiftBox">
                        <option value="giftBox">Yes, please</option>
                        <option value="noGiftBox">No, thank you</option>
                    </select>
                </div>
            </div>

            <!-- User entries -->
            <div>
                <p><h2 id="dataEntry">Please enter your data</h2></p>

                <p class="dataEntry"><label>Name: </label>
                    <input name="name" value="<?= $name;?>"/>
                    <mark><?php echo $nameErr;?></mark>
                </p>
                <p class="dataEntry"><label>Address: </label>
                    <input name="address" value="<?php echo $address;?>"/>
                    <mark><?php echo $addressErr;?></mark>
                </p>
                <p class="dataEntry"><label>E-Mail: </label>
                    <input name="email" value="<?php echo $email;?>"/>
                    <mark><?php echo $emailErr;?></mark>
                </p>
            </div>

            <!-- Submit Button -->
            <div class="submitButton">
                <p><input type="submit" value="Submit"></p>
            </div>

        </form>

    </body>
</html>
