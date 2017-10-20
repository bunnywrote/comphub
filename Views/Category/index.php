<?php
    require_once(ROOT."/Views/Shared/header.php");
?>

<main class="row reverse-sm">
    <section class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
        <div class="section-content">
            <?php if(isset($this->viewBag["products"])):?>
                <?php foreach($this->viewBag["products"] as $key=>$value): ?>
                    <article>
                        <div class="article-image">
                            <image src="/assets/images/placeholder.png">
                        </div>
                        <div class="article-description">
                            <span>
                                <a href="<?=UrlHelper::getProductUrl($value->id)?>">
                                    <h2><?=$value->name?></h2>
                                </a>
                            </span>
                            <span>Price:<?=$value->price?> CHF</span>
                            <p>Specification: <?=$value->descrEN?></p>
                        </div>
                        <div class="article-buy">
                            <form action="/cart/add/" method="post">
                                <p><label>Count</label></p>
                                <p>
                                    <input type="number" name="count" min="1" value="1" required>
                                </p>
                                <input type="hidden" name="price" value="<?=$value->price?>">
                                <input type="hidden" name="id" value="<?=$value->id?>">
                                <input class="btn" type="submit" value="Buy">
                                <!--onclick="alert('submit');event.preventDefault();" -->
                            </form>
                        </div>
                    </article>
                <?php endforeach; ?>
            <?php endif;?>
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