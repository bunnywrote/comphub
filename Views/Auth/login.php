<?php require_once(ROOT."/Views/Shared/header.php"); ?>
<main>
    <section>
        <div class="user-login">
            <?php //Helper::varDebug($_POST)?>

            <?php if(isset($this->viewBag["errors"])) : ?>
                <ul>
                    <?php foreach ($this->viewBag["errors"] as $key => $value) : ?>
                        <?php if($value !== null) :?>
                            <li><?= $value ?></li>
                        <?php endif;?>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <form action="?type=signin" method="post">
                <div class="login-input">      
                    <input name="email" type="email" placeholder="<?=Localizer::translate('Email')?>" value="<?= isset($_POST['email']) ? $_POST['email'] : ''?>" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                </div>
                <div class="login-input">      
                    <input name="password" type="password" placeholder="<?=Localizer::translate('Password')?>" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                </div>
                <input class="btn" type="submit" name="Send" value="<?=Localizer::translate('Send')?>">
            </form>
        </div>
    </section>
    <aside>
        aside content
    </aside>
</main>
<?php require_once(ROOT."/Views/Shared/footer.php") ?>