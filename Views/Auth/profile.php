<?php require_once(ROOT."/Views/Shared/header.php"); ?>
    <main class="row reverse-sm">
        <section class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <div class="section-content">
                <?php if(isset($this->viewBag["user"])) : ?>
                    <div class="title">
                        <h3><?=Localizer::translate('My Profile')?></h3>
                    </div>
                    <div>
                        <ul class="list-unstyled">
                            <li><?= $this->viewBag["user"]->firstName ?></li>
                            <li><?= $this->viewBag["user"]->lastName ?></li>
                            <li><?= $this->viewBag["user"]->email ?></li>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </section>
        <aside class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <?php
                if(isset($this->viewBag['cartItems']))
                    ShoppingCart::widget($this->viewBag['cartItems'])
            ?>
        </aside>
    </main>
<?php require_once(ROOT."/Views/Shared/footer.php") ?>