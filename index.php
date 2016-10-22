<?php
    include('functions.php');
    $language = get_param('lang', 'en');
    $pageId = get_param('id', 0);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Web Shop</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/stylesheets/flags32.css">
        <link rel="stylesheet" href="assets/stylesheets/styles.css">
    </head>
    <body>
        <header>
            <h1>CompHub</h1>            
            <ul class="langs f32">
                <?php getLanguages($language)?>
            </ul>
        </header>
        <nav>
            <ul>
                <li>
                    <ul>
                        <?php navigation($language, null)?>
                    </ul>
                </li>
            </ul>
        </nav>
        <main>
            <section>
                <?php products();?>
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

        <footer>
            <div class="footer-block">
                <h4>Kontakt</h4>
                <ul>
                    
                </ul>
            </div>
            <div class="footer-block"></div>
        </footer>
    </body>
</html>