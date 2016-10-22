<?php
    include('purchaseConfirm.php');
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
        <form action="purchaseConfirm.php"
            method="post">
            <div>
                <p><h2>Shipping Method</h2></p>
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
                    <img src="">
                </div>
                <div class="radioText">
                    <input type="radio" name="payment" value="visa">
                    <label>Visa</label>
                    <img src="">
                </div>
                <div class="radioText">
                    <input type="radio" name="payment" value="mastercard">
                    <label>Mastercard</label>
                    <img src="">
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
                    <input name="name" value="<?php echo $name;?>"/>
                    <mark><?php echo $e_name;?></mark>
                </p>
                <p class="dataEntry"><label>Address: </label>
                    <input name="address" value="<?php echo $address;?>"/>
                    <mark><?php echo $e_address;?></mark>
                </p>
                <p class="dataEntry"><label>E-Mail: </label>
                    <input name="email" value="<?php echo $email;?>"/>
                    <mark><?php echo $e_email;?></mark>
                </p>
            </div>

            <!-- Submit Button -->
            <div class="submitButton">
                <p><input type="submit" value="Submit"></p>
            </div>

        </form>

    </body>
</html>


