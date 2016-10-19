<!DOCTYPE html>
<html>
    <head>
        <title>Web Shop</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <header>
            <h1>CompHub</h1>
        </header>
        <nav>
            <ul>
                <li>
                    <ul>
                        <?php require_once('navigation.php');?>
                    </ul>
                </li>
            </ul>
        </nav>
        <section>
            <article>
                <div>
                    <h2>Article #1</h2>
                </div>
                <div>
                    <h2>Article #2</h2>
                </div>
                <div>
                    <h2>Article #3</h2>
                </div>
            </article>
            <aside>aside</aside>
        </section>
        <footer>footer</footer>
    </body>
</html>