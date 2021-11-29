<?php
?>

<html>
    <head>
        <link href="main.css" rel="stylesheet" type="text/css"/>
        <meta charset="UTF-8">
        <title>Master List</title>
    </head>
    <header>
    <h1>Master List</h1>
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
            <p>this page contains the Main list of movies from here you can add a movie to the list or add a movie from this list to another.</p>
            <table>                
                <tr>             
                    <th>Movie Number</th>
                    <th>Movie Title</th>
                    <th>Movie Type</th>
                    <th>Where to Watch</th>
                    <th>Year Made</th>
                </tr>
                <?php foreach ($movies as $movie) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($movie->getMovieNum()); ?></td>
                    <td><?php echo htmlspecialchars($movie->getMovieTitle()); ?></td>
                    <td><?php echo htmlspecialchars($movie->getMovieType()); ?></td>
                    <td><?php echo htmlspecialchars($movie->getWhere()); ?></td>
                    <td><?php echo htmlspecialchars($movie->getWhen()); ?></td>
                    
                </tr>               
                <?php endforeach; ?>               
            </table>
        </div>
    </body>
</html>
