<?php require_once(ROOT."/Views/Shared/header.php"); ?>
    <main class="row reverse-sm">
        <section class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <div class="user-login">
                <div>
                    <h3><?=Localizer::translate('Sign Up')?></h3>
                    <?php if(isset($this->viewBag["errors"])) : ?>
                        <ul>
                            <?php foreach ($this->viewBag["errors"] as $key => $value) : ?>
                                <?php if($value !== null) :?>
                                    <li><?=Localizer::translate($value)?></li>
                                <?php endif;?>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
                <form action="/user/signup" method="post">
                    <div class="login-input">
                        <input name="username" type="text" placeholder="<?=Localizer::translate('Login')?>" value="<?= isset($_POST['username']) ? $_POST['username'] : ''?>" required>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                    </div>
                    <div class="login-input">
                        <input name="email" type="email" placeholder="<?=Localizer::translate('Email')?>" value="<?= isset($_POST['email']) ? $_POST['email'] : ''?>" required>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                    </div>
                    <div class="login-input">
                        <input name="password" type="password" placeholder="<?=Localizer::translate('Password')?>" minlength="8" value="<?= isset($_POST['password']) ? $_POST['password'] : ''?>" required>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                    </div>
                    <div class="login-input">
                        <input name="firstName" type="text" placeholder="<?=Localizer::translate('First Name')?>" value="<?= isset($_POST['firstName']) ? $_POST['firstName'] : ''?>" required>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                    </div>
                    <div class="login-input">
                        <input name="lastName" type="text" placeholder="<?=Localizer::translate('Last Name')?>" value="<?= isset($_POST['lastName']) ? $_POST['lastName'] : ''?>" required>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                    </div>
                    <input class="btn" type="submit" name="Sign Up" value="<?=Localizer::translate('Sign Up')?>">
                </form>
            </div>
        </section>
        <aside class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            aside
        </aside>
    </main>
<?php require_once(ROOT."/Views/Shared/footer.php") ?>