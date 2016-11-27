<aside>
    <?php //Helper::varDebug($this->viewBag); ?>
    <?php if (isset($this->viewBag['cartItems'])): ?>
        <div id="cart" class="user-cart">
            <ul>
            <?php foreach($this->viewBag['cartItems'] as $key => $value): ?>
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
    <?php endif; ?>
</aside>