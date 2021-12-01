<html>
    <head>
        <link href="main.css" rel="stylesheet" type="text/css"/>
        <meta charset="UTF-8">
        <title>Add Movie</title>
    </head>
    <header>
    <h1>Add a Movie to the Master list</h1>
    <nav>
        <span id="button"><a href="index.php?action=home">Home</a></span>
        <span id="button"><a href="index.php?action=master">MasterList</a></span>
        <span id="button"><a href="index.php?action=watch">Watchlist</a></span>
        <span id="button"><a href="index.php?action=wish">Wishlist</a></span>
        <span id="button"><a href="index.php?action=hate">Hatelist</a></span>
    </nav>
    </header>
    <body>
        <div id="wrapper">
            <form>
                <input type="hidden" name="action" value="movieValidation">
            
                <label>Movie Title</label>
                <input type="text" name="move_title" value=""><br>
                <label>Movie Type</label>
                <input type="text" name="movie_type" value=""><br>
                <label>Where to watch it</label>
                <input type="text" name="where_to_watch" value=""><br>
                <label>When it was made</label>
                <input type="text" name="when_was_made" value=""><br>
                
                <input type="submit" value="Submit"><br>
            
            </form>    
        </div>
    </body>
</html>

