<?php
    include('header.php');
?>
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
<?php 
    include('footer.php')
?>