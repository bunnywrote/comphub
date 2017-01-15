<?php require_once(ROOT."/Views/Shared/header.php"); ?>
    <main class="row reverse-sm">
        <section class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <div class="user-login">
                <?php //Helper::varDebug($_POST)?>
                <div>
                    <h3><?=Localizer::translate('Sign In')?></h3>
                </div>
                <?php if(isset($this->viewBag["errors"])) : ?>
                    <ul>
                        <?php foreach ($this->viewBag["errors"] as $key => $value) : ?>
                            <?php if($value !== null) :?>
                                <li><?= $value ?></li>
                            <?php endif;?>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <form action="/user/login" method="post">
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
        <aside class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            aside content
        </aside>
    </main>
<?php require_once(ROOT."/Views/Shared/footer.php") ?>