<!DOCTYPE html>
<html lang="<?=$_SESSION['lang']?>">
<head>
    <title>CompHub</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/stylesheets/grid/flexboxgrid.css">
    <link rel="stylesheet" href="assets/stylesheets/flags32.css">
    <link rel="stylesheet" href="assets/stylesheets/flags16.css">
    <link rel="stylesheet" href="assets/stylesheets/fonts/font-awesome.css">
    <link rel="stylesheet" href="assets/stylesheets/styles2.css">
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="/assets/favicons/favicon-32x32.png?v=11" sizes="32x32" />
    <link rel="icon" type="image/png" href="/assets/favicons/favicon-16x16.png?v=11" sizes="16x16">
    <link rel="manifest" href="/assets/favicons/manifest.json">
    <link rel="mask-icon" href="/assets/favicons/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">
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
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 end-xs hidden-sm">

                    <div id="login" class="col-xs-6">
                        <ul class="list-unstyled">
                            <li>
                                <a href="?type=signin">denis</a>
                            </li>
                            <li>
                                <a href="?type=logout">se déconnecter</a>
                            </li>
                        </ul>
                    </div>
                    <div id="langs" class="col-xs-6">
                        <ul class="list-unstyled f16">
                            <li>
                                <span class="flag en"></span><a href="/?type=lang&amp;value=en">en</a></li>

                            <li>
                                <span class="flag de"></span><a href="/?type=lang&amp;value=de">de</a></li>

                            <li>
                                <span class="flag fr"></span><span>fr</span>
                            </li>
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
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <span class="fa fa-search"></span>
                </div>
            </div>
        </div>
    </header>

    <nav class="row">
        <div class="col-xs-12 hidden-xs">
            nav
        </div>
    </nav>

    <main class="row reverse-sm">
        <section class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            section
        </section>
        <aside class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            aside
        </aside>
    </main>

    <footer class="row">
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 start-xs">
            <h4>Contact</h4>
            <ul class="list-unstyled">
                <li>Bern, Laupenstrasse 77</li>
                <li> CH-3004</li>
                <li>info@comphub.store<li>
                <li>0794443322<li>
            </ul>
        </div>
    </footer>
</body>
</html>