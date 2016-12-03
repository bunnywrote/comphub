<?php require_once(ROOT."/Views/Shared/header.php"); ?>
<main>
<!--    <link rel="stylesheet" href="/assets/stylesheets/styles.css">-->
    <link rel="stylesheet" href="/assets/stylesheets/search.css">

    <section>
        Home
    </section>
    <aside>
        <div>
            <form>
                <div>
                    <input type="text" id="searchWindow" placeholder="Search..">
                </div>
                <div>
                    <input type="button" name="search" id="searchItem" value="search">
                </div>
            </form>
        </div>
        <div>
            <ul id="items">
            </ul>
        </div>
    </aside>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
    <script src="/assets/scripts/search.js" async></script>
    <!--<aside>
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
    </aside>-->
<?php //require_once(ROOT."/Views/Shared/sidebar.php") ?>
</main>

<?php require_once(ROOT."/Views/Shared/footer.php") ?>