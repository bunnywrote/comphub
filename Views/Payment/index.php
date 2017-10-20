<?php
require_once(ROOT."/Views/Shared/header.php");
?>

    <main class="row reverse-sm">
        <section class="col-xs-12 col-sm-12 col-md-8 col-lg-8" >
            <div class="user-cart">
                <div class="title">
                    <h3>
                        <span class="fa fa-shopping-cart"></span>
                        <?=Localizer::translate('Cart items')?>
                    </h3>
                </div>
                <?php if(isset($this->viewBag["cartItems"]) && count($this->viewBag["cartItems"]) > 0): ?>
                    <div>
                        <ul>
                            <?php //Helper::varDebug(ShoppingCart::$items)?>
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

                    <div>
                        <?php
                            $sum = 0;
                            foreach($this->viewBag["cartItems"] as $key => $value){
                                $sum += $value->price * $value->quantity;
                            }
                        ?>
                        <div class="total-price">
                            <?=Localizer::translate('Total price:')?>
                            <b><?=$sum?></b>CHF

                        </div>
                        <form action="/payment/shipping" method="post">
                            <div class="payment-options">
                                <h3>
                                    <span class="fa fa-money"></span>
                                    <?=Localizer::translate('Payment method')?>
                                </h3>

                                <input type="radio" name="payment" value="by delivery" /><?=Localizer::translate('By delivery')?><br />
                                <input type="radio" name="payment" value="credit card" /><?=Localizer::translate('Credit card')?><br />
                                <input type="radio" name="payment" value="pay pal" /><?=Localizer::translate('PayPal')?><br />

                                <h3>
                                    <span class="fa fa-gift"></span>
                                    <?=Localizer::translate('Other')?>
                                </h3>

                                <input type="checkbox" name="gift" value="true" /><?=Localizer::translate('Gift box')?><br />
                            </div>
                            <input class="btn" type="submit" value="<?=Localizer::translate('To Shipping')?>">
                        </form>
                    </div>

                <?php else:?>
                    <span><?=Localizer::translate("Add items to your cart")?></span>
                    <a href="/"><?=Localizer::translate("To shop")?></a>
                <?php endif;?>
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