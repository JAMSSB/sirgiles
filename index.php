<?php
session_start();
//$_SESSION['username'] = "";

require_once('require_php/config.php');

$tap_sql = "SELECT * FROM on_tap";

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Staatliches" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sir Giles Brewing Company</title>
</head>

<body>
    <div class="header">
        <h1>Sir Giles Yellow Company</h1>

        <ul class="navigation">
            <li><a class="highlight" href="index.php">Home</a></li>
            <li><a href="calendar.php">Calendar</a></li>
            <?php
            require_once('require_php/login_display.php');
            ?>          
        </ul>
    </div>

    <div class="showcase">
        <div class="on_tap">
            <h2>On Tap</h2>
            <?php
            if($stmt = $pdo->prepare($tap_sql)) {
                if($stmt->execute()) {                             
                    for($i=0;$i<$stmt->rowCount();$i++) {
                        $row = $stmt->fetch();
                        echo "<p>{$row['beer_name']}</p>";
                    }
                }
            }
            ?>
        </div>
    </div>

    <div class="container_info">
        <div class="about_us">
            <h2>About Us</h2>
            <p>We're a home brewery from the suburbs of Chicago. Sir Giles
                is family owned and family made. We only craft the finest of
                beers.
            </p>
        </div>

        <div class="members">
            <h2>Members</h2>
            <div class="members_list">
                <b>Brew Master</b>
                <p>Joe Stacy</p>
                <b>Brew Assistant</b>
                <p>Matthew Stacy</p>
                <b>Sometimes Helps</b>
                <p>Erik Stacy</p>
            </div>
        </div>
    </div>
    
</body>
</html>