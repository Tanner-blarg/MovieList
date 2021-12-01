<?php

?>

<html>
    <head>
        <link href="main.css" rel="stylesheet" type="text/css"/>
        <meta charset="UTF-8">
        <title>Register</title>
    </head>
    <header>
    <h1>Register</h1>
    <nav>
        <span id="button"><a href="index.php?action=login">Login</a></span>
    </nav>
    </header>
    <body>
        <div id="wrapper">
            <h2>Welcome</h2>
            <h3>You must have an account to proceed:</h3>
            
            <form action="index.php" method="post">
                <input type="hidden" name="action" value="registerConfirm">
                
                <label>First Name:</label>&nbsp;<span class="required">*</span>
                <input type="text" class="input" name="first_name"
                       value="<?php echo htmlspecialchars($firstName); ?>">
                <?php if (!empty($error_message_fname)) { ?>
                    <p class="error"> <?php echo ($error_message_fname); ?></p>
                <?php } ?><br>
            
                <label>Last Name:</label>&nbsp;<span class="required">*</span>
                <input type="text" class="input" name="last_name"
                       value="<?php echo htmlspecialchars($lastName); ?>">
                <?php if (!empty($error_message_lname)) { ?>
                    <p class="error"> <?php echo ($error_message_lname); ?></p>
                <?php } ?><br>
                
                <label>Email:</label>&nbsp;<span class="required">*</span>
                <input type="text" class="input" name="email"
                       value="<?php echo htmlspecialchars($email); ?>">
                <?php if (!empty($error_message_email)) { ?>
                    <p class="error"> <?php echo ($error_message_email); ?></p>
                <?php } ?><br>
            
                <label>Password:</label>&nbsp;<span class="required">*</span>
                <input type="text" class="input" name="password"
                       value="<?php echo htmlspecialchars($password); ?>">
                <?php if (!empty($error_message_password)) { ?>
                    <p class="error"> <?php echo ($error_message_password); ?></p>
                <?php } ?><br><br>
                
                <input type="submit" value="Submit"><br>
        
            </form>
            
        </div>
    </body>
</html>