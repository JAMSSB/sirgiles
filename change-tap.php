<?php
session_start();

require_once("config.php");

$TAP_NUM = $_SESSION['tap_num'];

$BEER_ID = 0;

$sql = "SELECT * FROM beer";

if(isset($_POST['change-button'])) {
    $BEER_ID = $_POST['change-button'];
    $sql = "SELECT beer_name FROM beer WHERE beer_id=" . $BEER_ID;
    if($stmt = $pdo->prepare($sql)) {
        if($stmt->execute()) {
            $row = $stmt->fetch();
            $BEER_NAME = $row['beer_name'];
        }
    }

    $sql = "UPDATE on_tap SET beer_id=\"" . $BEER_ID . "\", beer_name=\"" . $BEER_NAME . "\" WHERE tap_num=\"" . $TAP_NUM . "\"";
    if($stmt = $pdo->prepare($sql)) {
        if($stmt->execute()) {
            header("Location: database.html");
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Staatliches" rel="stylesheet">
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

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="change-selection">
        <h5></h5>
        <h5>Beer Name</h5>
        <h5>Date Created</h5>
        <h5>Abbreviation</h5>
        <?php 

            if($stmt = $pdo->prepare($sql)) {
                if($stmt->execute()) {
                    for($i = 0; $i < $stmt->rowCount(); $i++) {
                        $row = $stmt->fetch();
                        echo 
                        "<button type=\"submit\" name=\"change-button\" value=\"" .
                        htmlspecialchars($row['beer_id']) . "\">Change</button> 
                        <p>" . htmlspecialchars($row['beer_name']) . "</p>
                        <p>" . htmlspecialchars($row['date_created']) . "</p>
                        <p>" . htmlspecialchars($row['abbreviation']) . "</p>";
                    }
                }
            }
        ?>
    </form>

</body>
</html>