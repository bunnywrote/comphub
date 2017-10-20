<?php
    require_once(ROOT."/Views/Shared/header.php");
    //Helper::varDebug($this->viewBag);
?>
<main class="row reverse-sm">
    <section class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
        <?php if(isset($this->viewBag['product'])):?>
            <div class="sectionOverview">
                <div class="productImage">
                    <img src="/assets/images/AppleMacBookPro.jpg">
                </div>
                <div class="shortSpecification">
                    <span><h2><?= $this->viewBag['product']->name ;?></h2></span>
                </div>
                <div class="shortSpecification">
                    <span><h3>Price: </h3><?= $this->viewBag['product']->price ;?> CHF</span>
                </div>
                <div class="article-buy">
                    <form action="/cart/add/<?=$this->viewBag['product']->id?>" method="post">
                        <p><label>Count</label></p>
                        <p>
                            <input type="number" name="count" min="1" value="1" required>
                        </p>
                        <input type="hidden" name="price" value="<?=$this->viewBag['product']->price?>">
                        <input type="hidden" name="id" value="<?=$this->viewBag['product']->id?>">
                        <input class="btn" type="submit" value="Buy">
                        <!--onclick="alert('submit');event.preventDefault();" -->
                    </form>
                </div>
            </div>
            <div class="longSpecification">
                <div>
                    <p>Specification:</p>
                </div>
                <div>
                    <p><?= $this->viewBag['product']->descrEN ;?></p>
                </div>
            </div>
            <div class="longSpecification">
                <div>
                    <p><?= $this->viewBag['product']->name;?></p>
                </div>
            </div>
        <?php endif;?>
    </section>
    <aside class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <?php
            if(isset($this->viewBag['cartItems']))
                ShoppingCart::widget($this->viewBag['cartItems'])
        ?>
    </aside>
</main>
<?php require_once(ROOT."/Views/Shared/footer.php")?>