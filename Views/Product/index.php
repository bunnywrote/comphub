<?php
    require_once(ROOT."/Views/Shared/header.php");
?>
<main>
    <section>
        <?php if(isset($this->viewBag['product'])):?>
            <div class="sectionOverview">
                <div class="productImage">
                    <img src="assets/images/AppleMacBookPro.jpg">
                </div>
                <div class="shortSpecification">
                    <span><h2><?= $this->viewBag['product']->name ;?></h2></span>
                </div>
                <div class="shortSpecification">
                    <span><h3>Price: </h3><?= $this->viewBag['product']->price ;?> CHF</span>
                </div>
            </div>
            <div class="longSpecification">
<!--                <ul>-->
                <div>
                    <p>Specification:</p>
<!--                </ul>-->
                </div>
                <div>
                    <p><?= $this->viewBag['product']->descrEN ;?></p>
                </div>
            </div>
            <div class="longSpecification">
<!--                <ul>-->
                <div>
                    <p><?= $this->viewBag['product']->nameEN ;?></p>
<!--                </ul>-->
                </div>
            </div>
        <?php endif;?>
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
<?php require_once(ROOT."/Views/Shared/footer.php")?>