<?php
    if(empty($_POST['name']) || empty($_POST['password'])){
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    else{
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }