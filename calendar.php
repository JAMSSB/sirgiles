<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Staatliches" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sir Giles Brewing Company: Calendar</title>
</head>

<body>
    <div class="header">
        <h1>Sir Giles Brewing Co.</h1>
        
        <ul class="navigation">
            <li><a href="index.php">Home</a></li>
            <li><a class="highlight" href="calendar.php">Calendar</a></li>
            <?php
            require_once('require_php/login_display.php');
            ?> 
        </ul>
    </div>

    <div class="calendar">
        <iframe src="https://calendar.google.com/calendar/embed?src=sirgilesbrewingcompany%40gmail.com&ctz=America%2FChicago"
        frameborder="0" scrolling="no"></iframe>
    </div>
</body>
</html>