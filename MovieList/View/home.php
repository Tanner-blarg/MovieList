<html>
    <head>
        <link href="main.css" rel="stylesheet" type="text/css"/>
        <meta charset="UTF-8">
        <title>Home</title>
    </head>
    <header>
    <h1>Home</h1>
    <nav>
        <span id="button"><a href="index.php?action=home">Home</a></span>
        <span id="button"><a href="index.php?action=master">MasterList</a></span>
        <span id="button"><a href="index.php?action=watch">Watchlist</a></span>
        <span id="button"><a href="index.php?action=wish">Wishlist</a></span>
        <span id="button"><a href="index.php?action=hate">Hatelist</a></span>
        <span id="button"><a href="index.php?action=login">Login</a></span>
        <span id="button"><a href="index.php?action=register">Register</a></span>
         
        <?php if ($_SESSION['email'] = ''){ ?>
            <?php echo '?><span id="button"><a href="index.php?action=login">Login</a></span>';?>
        <?php } ?>
            
    </nav>
    </header>
    <body>
        <div id="wrapper">
            <main>
                <h2>Welcome</h2>
                <p></p>
            </main>
        </div>
    </body>
</html>
