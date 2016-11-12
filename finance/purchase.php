<?php

    if(empty($_GET['price']) || empty($_GET['count'])){
        // go to previous page if GET is empty
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    function getTotalPrice(){
        return $_GET['price'] * $_GET['count'];
    }

    $firstName = $lastName = $street = $email = $city = $state = $zip = '';
    $firstNameErr = $lastNameErr = $streetErr = $emailErr = $cityErr = $stateErr = $zipErr = '';
//    $success = false;

    /* validate first name */
    if (empty($_POST['firstName'])) {
        $firstNameErr = 'First name is required';
//        $success = false;
    } else {
        $firstName = $_POST['firstName'];
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $firstName)) {
            $firstNameErr = "Only letters and white space allowed";
        }
//        $success = true;
    }

    /* validate last name */
    if (empty($_POST['lastName'])) {
        $lastNameErr = 'Last name is required';
//        $success = false;
    } else {
        $lastName = $_POST['lastName'];
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $lastName)) {
            $lastNameErr = "Only letters and white space allowed";
        }
//        $success = true;
    }

    /* validate street */
    if (empty($_POST['street'])) {
        $streetErr = 'Street is required';
//        $success = false;
    } else {
        $street = $_POST['street'];
        if (!preg_match("/^[a-zA-Z ]*$/", $street)) {
            $streetErr = "Only letters and white space allowed";
        }
//        $success = true;
    }

    /* validate city */
    if (empty($_POST['city'])) {
        $cityErr = 'Please, input a city';
//        $success = false;
    } else {
        $city = $_POST['city'];
        if (!preg_match("/^[a-zA-Z ]*$/", $city)) {
            $cityErr = "Only letters and white space allowed";
        }
//        $success = true;
    }

    /* validate state */
    if (empty($_POST['state'])) {
        $stateErr = 'Please, input a state';
//        $success = false;
    } else {
        $state = $_POST['state'];
        if (!preg_match("/^[a-zA-Z ]*$/", $state)) {
            $stateErr = "Only letters and white space allowed";
        }
//        $success = true;
    }

    /* validate zip */
    if (empty($_POST['zip'])) {
        $zipErr = 'Please, input a ZIP';
//        $success = false;
    } else {
        $zip = $_POST['zip'];
        if (!preg_match("/^[a-zA-Z ]*$/", $zip)) {
            $zipErr = "Only letters and white space allowed";
        }
//        $success = true;
    }

    /* validate email */
    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $emailErr = 'Please, input a valid email';
//        $success = false;
    } else {
        $email = $_POST['email'];
//        $success = true;
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
        <form action=<?= ('purchaseConfirm.php');?>
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
                <p><h2 id="dataEntry">Please enter the shipping data</h2></p>

                <p class="dataEntry"><label>First Name: </label>
                    <input name="firstName" value="<?= $firstName;?>"/>
                    <mark><?= $firstNameErr;?></mark>
                </p>
                <p class="dataEntry"><label>Last Name: </label>
                    <input name="lastName" value="<?= $lastName;?>"/>
                    <mark><?= $lastNameErr;?></mark>
                </p>
                <p class="dataEntry"><label>Street: </label>
                    <input name="street" value="<?= $street;?>"/>
                    <mark><?= $streetErr;?></mark>
                </p>
                <p class="dataEntry"><label>City: </label>
                    <input name="city" value="<?= $city;?>"/>
                    <mark><?= $cityErr;?></mark>
                </p>
                <p class="dataEntry"><label>State: </label>
                    <input name="state" value="<?= $state;?>"/>
                    <mark><?= $stateErr;?></mark>
                </p>
                <p class="dataEntry"><label>Zip: </label>
                    <input name="zip" value="<?= $zip;?>"/>
                    <mark><?= $zipErr;?></mark>
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
<?php

?>