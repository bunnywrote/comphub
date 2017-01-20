<?php
    require_once(ROOT.'/Helpers/Helper.php');
    require_once(ROOT.'/Models/BaseEntity.php');
    require_once(ROOT.'/Models/Product.php');

class SearchResult extends BaseEntity
{
    public $name, $image, $url;

    public function __construct(Product $product)
    {
        $this->name = $product->name;
//        $this->image = $product->image;

        // to generate url use the helping method
        $this->url = UrlHelper::getProductUrl($product->id);
    }

}