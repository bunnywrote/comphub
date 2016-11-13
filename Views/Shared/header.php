<?php
    include(ROOT.'/functions.php');
?>
<!DOCTYPE html>
<html lang="<?=$_SESSION['lang']?>">
    <head>
        <title>CompHub</title>
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
            <a class="logo" href="/">
                <img src="/assets/images/logo2.svg">
            </a>
            <div id="login">
                <?php if(!isset($_SESSION['logged'])):?>
                    <a href="login.php" 
                    <!--onclick="alert('login');event.preventDefault();-->
                    ">Login</a>
                    <a href="login.php">Registration</a>
                <?php else: ?>
                    <span>user name</span>
                <?php endif; ?>
            </div>
            <ul class="langs f32">
                <?php foreach(CultureHelper::$supportedLangs as $key => $value):?>
                    <?php if($key === $_SESSION['lang']):?>
                        <li>
                            <span class="flag <?=$key?>"></span><span><?=$value?></span>
                        </li>
                    <?php else:?>
                        <li>
                            <span class="flag <?=$key?>"></span><a href="/?type=lang&value=<?=$key?>"><?=$value?></a></li>
                        </li>
                    <?php endif;?>
                <?php endforeach; ?>
            </ul>
        </header>
        <nav>
            <ul>
                <?php
                    // Helper::varDebug($this->viewBag);
                   // exit();
                    if(isset($this->viewBag['categories']))
                        foreach($this->viewBag['categories'] as $key => $value){
                            echo '<li><a href="'.$value.'">'.$key.'</a></li>';
                        }
                ?>
            </ul>
        </nav>