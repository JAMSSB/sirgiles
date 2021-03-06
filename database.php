<?php
session_start();

require_once("require_php/check_login.php");
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Staatliches" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Database</title>
</head>
<body>
    <div class="header">
        <h1>Sir Giles Brewing Co.</h1>

        <ul class="navigation">
            <li><a href="index.php">Home</a></li>
            <li><a href="calendar.php">Calendar</a></li>
            <?php
            require_once('require_php/login_display.php');
            ?>
        </ul>
    </div>

    <div class="container_database">
        <div class="database-choices">
            <div class="button_container">
                <a href="create-beer.php">Create A Beer</a>
                <a href="search-beer.php">Search For A Beer</a>
                <a href="on-tap.php">Change On Tap</a>
            </div>
        </div>
    </div>
    
</body>
</html>