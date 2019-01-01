<?php
session_start();

require_once("config.php");

$sql = "SELECT * FROM beer WHERE beer_id=" . $_SESSION['beer_id'];

$BEER_NAME = $RECIPE_LINK = "";

if($stmt = $pdo->prepare($sql)) {
    if($stmt->execute()) {
        $row = $stmt->fetch();
    }
    
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql = "UPDATE beer SET beer_name=\"" . $_POST['beer_name'] . "\", recipe_link=\"" . $_POST['recipe_link'] . 
    "\", beer_type=\"" . $_POST['beer_type'] . "\", date_created=\"" . $_POST['date_created'] . "\", date_second=\"" . $_POST['date_second'] . 
    "\", date_finished=\"" . $_POST['date_finished'] . "\", original_gravity=\"" . $_POST['original_gravity'] .  "\", second_gravity=\"" . $_POST['secondary_gravity'] . 
    "\", final_gravity=\"" . $_POST['final_gravity'] . "\", brew_notes=\"" . $_POST['brew_notes'] . "\", bottled=\"" . $_POST['bottled'] . 
    "\", abbreviation=\"" . $_POST['abbreviation'] . "\", abv=\"" . $_POST['abv'] . "\" WHERE beer_ID=" . $_SESSION['beer_id']; 

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

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="create-beer">
        <label>Beer Name:</label>
        <input type="text" name="beer_name" value="<?php echo $row['beer_name']; ?>">
        <label>Recipe Link</label>
        <input type="text" name="recipe_link" value="<?php echo $row['recipe_link'] ?>">
        <label>Beer Type</label>
        <input type="text" name="beer_type" value="<?php echo $row['beer_type'] ?>">
        <label>Date Created:</label>
        <input type="date" name="date_created"  value="<?php echo $row['date_created'] ?>">
        <label>Original Gravity</label>
        <input type="text" name="original_gravity" value="<?php echo $row['original_gravity'] ?>">
        <label>Secondary Date</label>
        <input type="date" name="date_second" value="<?php echo $row['date_second'] ?>">
        <label>Secondary Gravity</label>
        <input type="text" name="secondary_gravity" value="<?php echo $row['second_gravity'] ?>">
        <label>Date Finished</label>
        <input type="date" name="date_finished" value="<?php echo $row['date_finished'] ?>">
        <label>Final Gravity</label>
        <input type="text" name="final_gravity" value="<?php echo $row['final_gravity'] ?>">
        <label>Alcohol By Volume</label>
        <input type="text" name="abv" value="<?php echo $row['abv'] ?>">
        <label>Bottled</label>
        <input type="text" name="bottled" value="<?php echo $row['bottled'] ?>">
        <label>Abbreviation</label>
        <input type="text" name="abbreviation" value="<?php echo $row['abbreviation'] ?>">
        <label>Brew Notes</label>
        <textarea name="brew_notes" rows="10" cols="40"><?php echo $row['brew_notes'] ?></textarea>
        <a href="search-beer.php">Back</a>
        <input type="submit" value="submit">
    </form>

</body>
</html>