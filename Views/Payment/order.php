<?php
require_once(ROOT."/Views/Shared/header.php");
?>

    <main class="row reverse-sm">
        <section class="col-xs-12 col-sm-12 col-md-8 col-lg-8" >
            <div class="title">
                <h3>
                    <span class="fa fa-send"></span>
                    <?=Localizer::translate('Your order will be shipped')?>
                </h3>
            </div>
        </section>
        <aside class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <?php
                if(isset($this->viewBag['topSeller']))
                    TopSellerList::widget($this->viewBag['topSeller']);
            ?>
        </aside>
    </main>

<?php require_once(ROOT."/Views/Shared/footer.php") ?>