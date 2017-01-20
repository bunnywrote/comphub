<!DOCTYPE html>
<html lang="<?=$_SESSION['lang']?>">
    <head>
        <title>CompHub</title>
        <meta charset="UTF-8">
        <meta name="theme-color" content="#ffffff">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--    Styles  -->
        <link rel="stylesheet" href="/assets/stylesheets/grid/flexboxgrid.css">
        <link rel="stylesheet" href="/assets/stylesheets/flags32.css">
        <link rel="stylesheet" href="/assets/stylesheets/flags16.css">
        <link rel="stylesheet" href="/assets/stylesheets/fonts/font-awesome.css">
        <link rel="stylesheet" href="/assets/stylesheets/styles.css">

        <!--    Icons   -->
        <link rel="apple-touch-icon" sizes="180x180" href="/assets/favicons/apple-touch-icon.png">
        <link rel="icon" type="image/png" href="/assets/favicons/favicon-32x32.png?v=11" sizes="32x32" />
        <link rel="icon" type="image/png" href="/assets/favicons/favicon-16x16.png?v=11" sizes="16x16">
        <link rel="manifest" href="/assets/favicons/manifest.json">
        <link rel="mask-icon" href="/assets/favicons/safari-pinned-tab.svg" color="#5bbad5">

        <!--    Scripts -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.0.min.js"></script>

    </head>

    <body class="wrap container-fluid">
        <header class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 start-xs">
                        <div>
                            <a class="logo" href="/">
                                <img src="/assets/images/logo2.svg">
                            </a>
                        </div>
                    </div>

                    <div class="user-data col-xs-6 col-sm-6 hidden-md">
                        <a href="/user/signin">
                            <span class="fa fa-user"></span>
                            <span>denis</span>
                        </a>
                        <a href="/cart/index">
                            <span class="fa fa-shopping-cart"></span>
                            <span>3</span>
                        </a>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 end-xs hidden-sm">

                        <div id="login" class="col-xs-6">
                            <ul class="list-unstyled">
                                <?php if(!isset($_SESSION['user'])):?>
                                    <a href="/user/login"
                                    <!--onclick="alert('login');event.preventDefault();-->
                                    "><?= Localizer::translate('Sign In')?></a>
                                    <a href="/user/signup"><?= Localizer::translate('Sign Up')?></a>
                                <?php else: ?>
                                    <a href="/user/login"><?=$_SESSION['user']?></a>
                                    <a href="/user/logout"
                                    <!--onclick="alert('login');event.preventDefault();-->
                                    "><?= Localizer::translate('Sign Out')?></a>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <div id="langs" class="col-xs-6">
                            <ul class="list-unstyled f16">
                                <?php foreach(CultureHelper::$supportedLangs as $key => $value):?>
                                    <?php if($key === $_SESSION['lang']):?>
                                        <li>
                                            <span class="flag <?=$key?>"></span><span><?=$key?></span>
                                        </li>
                                    <?php else:?>
                                        <li>
                                            <span class="flag <?=$key?>"></span><a href="/user/lang/<?=$key?>"><?=$key?></a></li>
                                        </li>
                                    <?php endif;?>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 hidden-md">
                <div class="row end-xs">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <span class="fa fa-bars"></span>
                    </div>
                    <div class="search col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <span class="fa fa-search"></span>
                        <input type="text" placeholder="Search"></div>
                </div>
            </div>
            </div>
        </header>

        <nav class="row">
            <div class="col-xs-12 hidden-xs">
                <ul class="nav-list list-unstyled">
                    <?php
                        if(isset($this->viewBag['menuItems']))
                            foreach($this->viewBag['menuItems'] as $key => $value){
                                echo '<li><a href="/category/show/'.$value->id.'">'.CultureHelper::getProperty($value, 'name').'</a></li>';
                            }
                    ?>
                </ul>
            </div>
            <div class="col-xs-12 hidden-xs">
                <?php
//                Helper::varDebug($this->viewBag);
                if(isset($this->viewBag['categories']))
                    Breadcrumbs::widget($this->viewBag['categories'])
                ?>
            </div>
        </nav>