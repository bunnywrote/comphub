<?php require_once(ROOT."/Views/Shared/header.php"); ?>

<main class="row reverse-sm">
    <section class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
        <?php
            if(isset($this->viewBag['lastItems']))
                Slider::widget($this->viewBag['lastItems']);

            if(isset($this->viewBag['topSeller']))
                TopSellerList::widget($this->viewBag['topSeller']);
        ?>
    </section>
    <aside class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <?php
            if(isset($this->viewBag['cartItems']))
                ShoppingCart::widget($this->viewBag['cartItems'])
        ?>
    </aside>
</main>

<?php require_once(ROOT."/Views/Shared/footer.php") ?>

<!--    <link rel="stylesheet" href="/assets/stylesheets/styles.css">-->
<!--    <link rel="stylesheet" href="/assets/stylesheets/search.css">-->
<!---->
<!--    <section>-->
<!--        Home-->
<!--    </section>-->
<!--    <aside>-->
<!--        <div>-->
<!--            <form>-->
<!--                <div>-->
<!--                    <input type="text" id="searchWindow" placeholder="Search..">-->
<!--                </div>-->
<!--                <div>-->
<!--                    <input type="button" name="search" id="searchItem" value="search">-->
<!--                </div>-->
<!--            </form>-->
<!--        </div>-->
<!--        <div>-->
<!--            <ul id="items">-->
<!--            </ul>-->
<!--        </div>-->
<!--    </aside>-->
<!---->
<!--    <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.0.min.js"></script>-->
<!--    <script src="/assets/scripts/search.js" async></script>-->
    <!--<aside>
        <div class="user-login">
            <form action="login.php" method="post">
                <div class="login-input">      
                    <input name="name" type="text" placeholder="Name" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                </div>
                <div class="login-input">      
                    <input name="password" type="password" placeholder="Password" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                </div>
                <input class="btn" type="submit" name="Send">
            </form>
        </div>
    </aside>-->
<?php //require_once(ROOT."/Views/Shared/sidebar.php") ?>

