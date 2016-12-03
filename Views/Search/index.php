<?php
    define("ROOT", realpath($_SERVER["DOCUMENT_ROOT"]));
//    require_once(ROOT."/search.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Search</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="..\assets\stylesheets\search.css">
    </head>
    <body>
        <form>
            <input type="text" name="search" id="searchWindow" placeholder="Search..">
            <input type="button" name="DO Search" id="searchWindow">
        </form>

        <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
        <script src="..\assets\scripts\search.js" async></script>
    </body>
</html>