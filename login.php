<?php
require_once('require_php/config.php');

$USERNAME = $PASSWORD = "";
$USERNAME_ERR = $PASSWORD_ERR = "";

if($_SERVER['REQUEST_METHOD'] == "POST") {
    // Check username
    if(empty(trim($_POST['username']))) {
        $USERNAME_ERR = "Please enter a username.";
    } else {
        $USERNAME = trim($_POST['username']);
    }
    
    if(empty(trim($_POST['password']))) {
        $PASSWORD_ERR = "Please enter a password";
    } else {
        $PASSWORD = trim($_POST['password']);
    }
    
    if(empty($USERNAME_ERR) && empty($PASSWORD_ERR)) {
        // Prepare select statement
        $sql = "SELECT username, password FROM users WHERE username = :username";


        if($stmt = $pdo->prepare($sql)) {

            // Bind the parameter
            $stmt->bindParam(":username", $USERNAME_PARAM, PDO::PARAM_STR);
            
            // Set the parameter
            $USERNAME_PARAM = trim($USERNAME);
            
            // Try to exectute
            if($stmt->execute()) {
                if($stmt->rowCount() == 1) {
                    if($row = $stmt->fetch()) {
                        if($PASSWORD = $row['password']) {
                            // Start the session
                            session_start();
                            $_SESSION['username'] = $USERNAME;
                            header("Location: index.php");
                        }
                    }
                } else {
                    $USERNAME_ERR = "Sorry this username doesn't exist";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
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
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <section class="section-login">
            <form class="login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
                <h2>Login</h2>
                <div class="form-row">
                    <label>Username: </label>
                    <input type="text" name="username" value="<?php echo $USERNAME; ?>"><br>
                </div>
                <span class="error"><?php echo $USERNAME_ERR; ?></span>
                <div class="form-row">
                    <label>Password: </label>
                    <input type="password" name="password" value="<?php echo $PASSWORD; ?>">
                </div>
                <span class="error"><?php echo $PASSWORD_ERR; ?></span>
                <div class="form-row">
                    <a href="index.php">Back</a>
                    <input type="submit" class="btn" value = "Submit">
                </div>
                
            </form>
        </section>
    </body>
</html>