<?php
// Initialize the session

require_once("config.php");

$BEER_NAME = $BEER_TYPE = $DATE_CREATED = $ORIGINAL_GRAVITY = $DATE_SECOND = "";
$SECONDARY_GRAVITY = $DATE_FINISHED = $FINAL_GRAVITY = $BREW_NOTES = $RECIPE_LINK = $BOTTLED = "";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(empty(trim($_POST['beer_name']))) {
        echo 'You need to fill out this field';
    } else {
        $BEER_NAME = trim($_POST['beer_name']);
        $BEER_TYPE = trim($_POST['beer_type']);
        $DATE_CREATED = trim($_POST['date_created']);
        $ORIGINAL_GRAVITY = trim($_POST['original_gravity']);
        $DATE_SECOND = trim($_POST['date_second']);
        $SECONDARY_GRAVITY = trim($_POST['secondary_gravity']);
        $DATE_FINISHED = trim($_POST['date_finished']);
        $FINAL_GRAVITY = trim($_POST['final_gravity']);
        $BREW_NOTES = trim($_POST['brew_notes']);
        $RECIPE_LINK = trim($_POST['recipe_link']);
        $BOTTLED = trim($_POST['bottled']);
        $ABBREVIATION = trim($_POST['abbreviation']);
        $ABV = trim($_POST['abv']);


        //$sql = "INSERT INTO beer (beer_name) VALUES (:beer_name)";
        $sql = "INSERT INTO beer (beer_name, date_created, date_second, date_finished,
         beer_type, original_gravity, second_gravity, final_gravity, brew_notes,
         recipe_link, bottled, abbreviation, abv) VALUES (:beer_name, :date_created, :date_second, :date_finished,
         :beer_type, :original_gravity, :second_gravity, :final_gravity, :brew_notes,
         :recipe_link, :bottled, :abbreviation, :abv)";

        if($stmt = $pdo->prepare($sql)) {
            // Bind the parameters
            $stmt->bindParam(":beer_name", $PARAM_BEER_NAME, PDO::PARAM_STR);
            $stmt->bindParam(":date_created", $PARAM_DATE_CREATED, PDO::PARAM_STR);
            $stmt->bindParam(":date_second", $PARAM_DATE_SECOND, PDO::PARAM_STR);
            $stmt->bindParam(":date_finished", $PARAM_DATE_FINISHED, PDO::PARAM_STR);
            $stmt->bindParam(":beer_type", $PARAM_BEER_TYPE, PDO::PARAM_STR);
            $stmt->bindParam(":original_gravity", $PARAM_ORIGINAL_GRAVITY, PDO::PARAM_STR);
            $stmt->bindParam(":second_gravity", $PARAM_SECONDARY_GRAVITY, PDO::PARAM_STR);
            $stmt->bindParam("final_gravity", $PARAM_FINAL_GRAVITY, PDO::PARAM_STR);
            $stmt->bindParam(":brew_notes", $PARAM_BREW_NOTES, PDO::PARAM_STR);
            $stmt->bindParam(":recipe_link", $PARAM_RECIPE_LINK, PDO::PARAM_STR);
            $stmt->bindParam(":bottled", $PARAM_BOTTLED, PDO::PARAM_STR);
            $stmt->bindParam(":abbreviation", $PARAM_ABBREVIATION, PDO::PARAM_STR);
            $stmt->bindParam(":abv", $PARAM_ABV, PDO::PARAM_STR);

            // Set the parameter values
            $PARAM_BEER_NAME = $BEER_NAME;
            $PARAM_DATE_CREATED = $DATE_CREATED;
            $PARAM_DATE_SECOND = $DATE_SECOND;
            $PARAM_DATE_FINISHED = $DATE_FINISHED;
            $PARAM_BEER_TYPE = $BEER_TYPE;
            $PARAM_ORIGINAL_GRAVITY = $ORIGINAL_GRAVITY;
            $PARAM_SECONDARY_GRAVITY = $SECONDARY_GRAVITY;
            $PARAM_FINAL_GRAVITY = $FINAL_GRAVITY;
            $PARAM_BREW_NOTES = $BREW_NOTES;
            $PARAM_RECIPE_LINK = $RECIPE_LINK;
            $PARAM_BOTTLED = $BOTTLED;
            $PARAM_ABV = $ABV;
            $PARAM_ABBREVIATION = $ABBREVIATION;

            if($stmt->execute()) {
                header("Location: database.html");
            }
        }
        unset($stmt);
    }
    unset($pdo);
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

    <div class="create-beer-container">

        <h1>Create A Beer</h1>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="create-beer">
            <label>Beer Name:</label>
            <input type="text" name="beer_name">
            <label>Recipe Link</label>
            <input type="text" name="recipe_link">
            <label>Beer Type</label>
            <input type="text" name="beer_type">
            <label>Date Created:</label>
            <input type="date" name="date_created">
            <label>Original Gravity</label>
            <input type="text" name="original_gravity">
            <label>Secondary Date</label>
            <input type="date" name="date_second">
            <label>Secondary Gravity</label>
            <input type="text" name="secondary_gravity">
            <label>Date Finished</label>
            <input type="date" name="date_finished">
            <label>Final Gravity</label>
            <input type="text" name="final_gravity">
            <label>Alcohol By Volume</label>
            <input type="text" name="abv">
            <label>Bottled</label>
            <input type="text" name="bottled">
            <label>Abbreviation</label>
            <input type="text" name="abbreviation">
            <label>Brew Notes</label>
            <textarea name="brew_notes" rows="10" cols="40"></textarea>
            <a href="database.html">Back</a>
            <input type="submit" value="submit">
        </form>
    </div>
        
</body>
</html>
