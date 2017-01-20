<ul class="nav-list list-unstyled">
    <?php
        //Helper::varDebug(Breadcrumbs::$items);
        //exit();
        foreach(Breadcrumbs::$items as $key => $value){
            echo '<li><a href="'.UrlHelper::getCategoryUrl($value->id).'">'.CultureHelper::getProperty($value, 'name').'</a></li>';
        }
    ?>
</ul>