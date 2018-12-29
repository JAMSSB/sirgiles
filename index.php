<?php
session_start();

require_once("config.php");

$tap_sql = "SELECT * FROM on_tap";

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sir Giles Brewing Company</title>
</head>

<body>
    <div class="header">
        <h1>Sir Giles Brewing Co.</h1>

        <ul class="navigation">
            <li><a class="highlight" href="index.php">Home</a></li>
            <li><a href="calendar.html">Calendar</a></li>
            <li><a href="database.html">Database</a>
        </ul>
    </div>

    <div class="container">
        <div class="on_tap">
            <h2>On Tap</h2>
            <div class="tap_beer_list">
                <?php
                    if($stmt = $pdo->prepare($tap_sql)) {
                        if($stmt->execute()) {                             
                            for($i=0;$i<$stmt->rowCount();$i++) {
                                $row = $stmt->fetch();
                                echo "
                                <p>" . $row['beer_name'] . "</p>";
                            }
                        }
                    }
                ?>
            </div>
        </div>
    </div>

    <div class="container_info">
        <div class="info">
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
                    <p>Joe Stacy - Brew Master</p>
                    <p>Matthew Stacy - Brew Assistant</p>
                    <p>Erik Stacy - Sometimes Helps</p>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>