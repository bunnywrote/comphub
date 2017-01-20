<div id="cart" class="user-cart">
    <div class="title">
        <h3>
            <span class="fa fa-shopping-cart"></span>
            <?=Localizer::translate('Cart items')?>
        </h3>
    </div>
    <div>
        <ul>
            <?php //Helper::varDebug(ShoppingCart::$items)?>
            <?php foreach(ShoppingCart::$items as $key => $value): ?>
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
        <?php if(count(ShoppingCart::$items) > 0): ?>
            <form action="/payment/index" method="post">
                <input class="btn" type="submit" value="<?=Localizer::translate('To Payment')?>">
                <!--onclick="alert('submit');event.preventDefault();" -->
            </form>
        <?php else:?>
            <?=Localizer::translate("Your cart is empty")?>
        <?php endif;?>
    </div>
</div>