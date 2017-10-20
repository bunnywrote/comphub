<?php
require_once(ROOT."/Views/Shared/header.php");
?>

    <main class="row reverse-sm">
        <section class="col-xs-12 col-sm-12 col-md-8 col-lg-8" >
            <div class="user-cart">
                <div class="title">
                    <h3>
                        <span class="fa fa-send"></span>
                        <?=Localizer::translate('Your order')?>
                    </h3>
                </div>
                <?php if(isset($this->viewBag["cartItems"]) && count($this->viewBag["cartItems"]) > 0): ?>
                <div>
                    <ul class="list-unstyled">
                        <?php foreach($this->viewBag["cartItems"] as $key => $value): ?>
                            <li class="cart-item">
                                <div class="cart-item-details">
                                    <img class="thumbnail" src="/assets/images/placeholder.png">
                                    <div>
                                        <div class="item-name"><?=$value->name ?></div>
                                        <div class="item-descr"><?= CultureHelper::getProperty($value, "descr")?></div>
                                        <div class="item-count">
                                            <p>
                                                <a class="item-quantity" href="/cart/remove/<?=$value->id?>">
                                                    <span class="fa fa-minus-circle"></span>
                                                </a>
                                                <input type="number" value="<?=$value->quantity?>">
                                                <a class="item-quantity" href="/cart/add/<?=$value->id?>">
                                                    <span class="fa fa-plus-circle"></span>
                                                </a>
                                                <?=$value->price * $value->quantity?>
                                                <a class="item-quantity" href="/cart/delete/<?=$value->id?>">
                                                    <span class="fa fa-trash"></span>
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>
                <?php //Helper::varDebug($this->viewBag)?>
                <h3><?=Localizer::translate("Your address")?></h3>
                <?php foreach ($this->viewBag["address"] as $key => $value):?>
                    <p><?=$value?></p>
                <?php endforeach;?>
                <form action="/payment/order/" method="post">
                    <input class="btn" type="submit" value="<?=Localizer::translate('Confirm')?>">
                </form>
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