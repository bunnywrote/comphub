<div id="cart" class="user-cart">
    <div class="title">
        <h3><?=Localizer::translate('Cart items')?></h3>
    </div>
    <div>
        <ul>
            <?php foreach(ShoppingCart::$items as $key => $value): ?>
                <li class="cart-item">
                    <div class="cart-item-details">
                        <img class="thumbnail" src="/assets/images/placeholder.png">
                        <div>
                            <div class="item-name"><?=$value->name ?></div>
                            <div class="item-descr"><?=$value->descrEN ?></div>
                            <div class="item-count">
                                <p>
                                    <a class="item-quantity" href="#">-</a>
                                    <input type="number" value="<?=$value->quantity ?>">
                                    <a class="item-quantity" href="#">+</a>
                                    <?=$value->price ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div>
        <form action="?type=cart&action=pay" method="get">
            <input class="btn" type="submit" value="<?=Localizer::translate('To Payment')?>">
            <!--onclick="alert('submit');event.preventDefault();" -->
        </form>
    </div>
</div>