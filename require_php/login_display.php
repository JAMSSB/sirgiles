<?php
    // If session variable is not set it will redirect to login page
    if(!isset($_SESSION['username']) || empty($_SESSION['username'])) {
        echo "<li><a href=\"login.php\">Login</a></li>";
    } else {
        echo "<li><a href=\"database.php\">Database</a>";
    }
?> 