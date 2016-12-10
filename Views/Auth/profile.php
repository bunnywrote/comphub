<?php require_once(ROOT."/Views/Shared/header.php"); ?>
    <main>
        <section>
            <div>
                <?php if(isset($this->viewBag["user"])) : ?>
                    <div class="title">
                        <h3><?=Localizer::translate('My Profile')?></h3>
                    </div>
                    <div>
                        <ul>
                            <li><?= $this->viewBag["user"]->firstName ?></li>
                            <li><?= $this->viewBag["user"]->lastName ?></li>
                            <li><?= $this->viewBag["user"]->email ?></li>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </section>
        <aside>
            <?php
                if(isset($this->viewBag['cartItems']))
                    ShoppingCart::widget($this->viewBag['cartItems'])
            ?>
        </aside>
    </main>
<?php require_once(ROOT."/Views/Shared/footer.php") ?>