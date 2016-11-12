<?php
    require_once ("Models/Customer.php");

    $customer = new Customer();
//    Customer::get(1);
//    Customer::getAllCustomers();

    $customer->username = "bunnywrote";
    $customer->firstName = "Denis";
    $customer->lastName = "Schevchenko";
    $customer->email = "deniz@gmail.com";

    Customer::create($customer);
?>
