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