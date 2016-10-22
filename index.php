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
                <form action="functions.php" method="post">
                    <p>
                        <label>Name</label>
                        <input type="text" name="name">                
                    </p>
                    <p>
                        <label>Password</label>
                        <input type="password" name="password">                
                    </p>
                    <input type="submit" name="Send">
                </form>
            </aside>
        </main>

        <footer>footer</footer>
    </body>
</html>