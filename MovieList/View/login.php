<?php

?>

<html>
    <head>
        <link href="main.css" rel="stylesheet" type="text/css"/>
        <meta charset="UTF-8">
        <title>Login</title>
    </head>
    <header>
    <h1>Login</h1>
    <nav>
        <span id="button"><a href="index.php?action=register">Register</a></span>
    </nav>
    </header>
    <body>
        <div id="wrapper">
            
            <form action="index.php" method="post">
                <input type="hidden" name="action" value="login_submit">
                <label>Enter Email:</label>
                <input type="text" class="input" name="email_login"  
                       value = "<?php echo htmlspecialchars($email); ?>">
                            <?php if (!empty($error_message_email)) { ?>
                                <p class="error"> <?php echo ($error_message_email); ?></p>
                            <?php } ?><br><br>
            
                <label>Enter Password:</label>
                <input type="password" class="input" name="password_login">                    
                            <?php if (!empty($error_message_password)) { ?>
                                <p class="error"> <?php echo ($error_message_password); ?></p>
                            <?php } ?><br><br><br>
                
                <input type="submit" class="subButton" value="Submit"><br>
        
            </form>
            
        </div>
    </body>
</html>

