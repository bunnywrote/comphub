<?php
    var_dump($_POST);
    $success = true;
    $name = $address = $email = $e_name = $e_address = $e_email = '';

    /* validate name */
    if (empty($_POST['name'])) {
        $e_name = 'Please, input a name';
        $success = false;
    } else
        $name = $_POST['name'];

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
    if ($success) {
        echo "<p>Success validation</p>";
        exit;
    }
