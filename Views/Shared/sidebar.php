<aside>
    <?php
        if(isset($this->viewBag['cartItems']))
            ShoppingCart::widget($this->viewBag['cartItems'])
    ?>
</aside>