<?php
session_start();

require_once('config.php');

if(isset($_POST['change-button'])) {
    $_SESSION['tap_num'] = $_POST['change-button'];
    header("Location: change-tap.php");
}


?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Database</title>
</head>
<body>
    <div class="header">
        <h1>Sir Giles Brewing Co.</h1>

        <ul class="navigation">
            <li><a href="index.php">Home</a></li>
            <li><a href="calendar.html">Calendar</a></li>
            <li><a href="database.html">Database</a></li>
        </ul>
    </div>

    <div class="delete-tap">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="change-tap">
            <?php
                $sql = "SELECT * FROM on_tap";

                if($stmt = $pdo->prepare($sql)) {
                    if($stmt->execute()) {
                        for($i=0;$i < $stmt->rowCount();$i++) {
                            $row = $stmt->fetch();
                            echo "
                            <button type=\"submit\" name=\"change-button\" value=\"" . $row['tap_num'] . "\">Change</button>
                            <p>" . $row['tap_num'] . "</p>
                            <p>" . $row['beer_name'] . "</p>";
                        }
                    }
                }
                
            ?>
            
        </form>
    </div>

    
    
</body>
</html>