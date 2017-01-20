<?php
    require_once(ROOT."/Views/Shared/header.php");
?>
    <main class="row reverse-sm">
        <section class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <?php
                if(isset($this->viewBag['cartItems']))
                    ShoppingCart::widget($this->viewBag['cartItems'])
            ?>
        </section>
    </main>
    <aside>

    </aside>

<?php
    require_once(ROOT."/Views/Shared/footer.php");
?>