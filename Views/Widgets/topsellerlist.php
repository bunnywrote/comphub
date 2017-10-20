<div>
    <div class="title">
        <h3><?= Localizer::translate('Top Sellers')?></h3>
    </div>
        <?php foreach(TopSellerList::$items as $key => $value): ?>
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <article>
                    <div class="article-image">
                        <image src="/assets/images/placeholder.png">
                    </div>
                    <div class="article-description">
                    <span>
                        <a href="<?=UrlHelper::getProductUrl($value->id)?>">
                            <h4><?=$value->name?></h4>
                        </a>
                    </span>
                        <span><?=$value->price?> CHF</span>
                        <p><?=$value->descrEN?></p>
                    </div>
                </article>
            </div>
        </div>
    <?php endforeach;?>
</div>