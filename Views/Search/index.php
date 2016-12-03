<?php
    define("ROOT", realpath($_SERVER["DOCUMENT_ROOT"]));
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Search</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/assets/stylesheets/search.css">
    </head>
    <body>
        <div>
            <form>
                <div>
                    <input type="text" id="searchWindow" placeholder="Search..">
                </div>
                <div>
                    <input type="button" name="search" id="searchItem" value="search">
                </div>
            </form>

            <ul id="items">

            </ul>
        </div>


        <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
        <script src="/assets/scripts/search.js" async></script>
    </body>
</html>