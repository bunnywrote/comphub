<?php
    require_once(ROOT."/Views/Shared/header.php");

//    Helper::varDebug($this->viewBag);
?>

<main>
    <section>
        <?php
            if(isset($this->viewBag["products"])):
                foreach($this->viewBag["products"] as $key=>$value):
                    echo '
                            <article>
                                <div class="article-image">
                                    <image src="assets/images/placeholder.png">
                                </div>
                                <div class="article-description">
                                    <span><a href="'.Helper::getProductUrl($value->id).'"><h2>'.$value->name.'</h2></a></span>
                                    <span>Price: '.$value->price.' CHF</span>
                                    <p>Specification: '.$value->descrEN.'</p>
                                </div>
                                <div class="article-buy">
                                    <form action="/finance/purchase.php" method="get">
                                        <p><label>Count</label></p>
                                        <p>
                                            <input type="number" name="count" min="1" value="1" required>
                                        </p>
                                        <input type="hidden" name="price" value='.$value->price.'>
                                        <input type="hidden" name="id" value='.$value->name.'>
                                        <input class="btn" type="submit" value="Buy">
                                    </form>
                                </div>
                            </article>
                        ';
                endforeach;
            endif;
        ?>
    </section>
    <aside>
        <div class="user-login">
            <form action="login.php" method="post">
                <div class="login-input">
                    <input name="name" type="text" placeholder="Name" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                </div>
                <div class="login-input">
                    <input name="password" type="password" placeholder="Password" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                </div>
                <input class="btn" type="submit" name="Send">
            </form>
        </div>
    </aside>
</main>

<?php require_once(ROOT."/Views/Shared/footer.php") ?>