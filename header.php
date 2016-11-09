<?php
    include('functions.php');
    $language = get_param('lang', 'en');
    $pageId = get_param('id', 0);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Web Shop</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/stylesheets/flags32.css">
        <link rel="stylesheet" href="assets/stylesheets/styles.css">
        <link rel="apple-touch-icon" sizes="180x180" href="/assets/favicons/apple-touch-icon.png">
        <link rel="icon" type="image/png" href="/assets/favicons/favicon-32x32.png?v=11" sizes="32x32" />
        <link rel="icon" type="image/png" href="/assets/favicons/favicon-16x16.png?v=11" sizes="16x16">
        <link rel="manifest" href="/assets/favicons/manifest.json">
        <link rel="mask-icon" href="/assets/favicons/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="theme-color" content="#ffffff">
    </head>
    <body>
        <header>
            <img class="logo" src="/assets/images/logo2.svg">
            <ul class="langs f32">
                <?php getLanguages($language)?>
            </ul>
        </header>
        <nav>
            <ul>
                <li>
                    <ul>
                        <?php navigation($language, null)?>
                    </ul>
                </li>
            </ul>
        </nav>