<?php
session_start();

require_once("config.php");

$sql = "SELECT * FROM beer ORDER BY date_created DESC";

if(isset($_POST['edit-button'])) {
    $_SESSION['beer_id'] = $_POST['edit-button'];
    header("Location: edit-beer.php");
}

if(isset($_POST['view-button'])) {
    $_SESSION['beer_id'] = $_POST['view-button'];
    header("Location: view-beer.php");
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

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="selection">
    <h5></h5>
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
                    "<button type=\"submit\" name=\"view-button\" value=\"" .
                    htmlspecialchars($row['beer_id']) . "\">View</button>
                    <button type=\"submit\" name=\"edit-button\" value=\"" . 
                    htmlspecialchars($row['beer_id']) . "\">Edit</button> 
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