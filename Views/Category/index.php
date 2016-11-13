<?php
    require_once(ROOT."/Views/Shared/header.php");

//    Helper::varDebug($this->viewBag);
?>

<main>
<section>
    <?php if(isset($this->viewBag["products"])):?>
        <?php foreach($this->viewBag["products"] as $key=>$value): ?>
            <article>
                <div class="article-image">
                    <image src="assets/images/placeholder.png">
                </div>
                <div class="article-description">
                    <span>
                        <a href="<?=Helper::getProductUrl($value->id)?>">
                            <h2><?=$value->name?></h2>
                        </a>
                    </span>
                    <span>Price:<?=$value->price?> CHF</span>
                    <p>Specification: <?=$value->descrEN?>'</p>
                </div>
                <div class="article-buy">
                    <form action="?type=cart" method="post">
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
</section>

<?php require_once(ROOT."/Views/Shared/sidebar.php") ?>
</main>

<?php require_once(ROOT."/Views/Shared/footer.php") ?>