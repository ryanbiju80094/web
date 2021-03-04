<?php
    session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Categorize</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="signup">
        <form action="includes/login.php" method="post">
            <input type="text" name="uid" placeholder="Username*" required>
            <input type="password" name="pwd" placeholder="Password*" required>
            <button type="submit" name="login">Log In</button>
        </form>
    </div>

    <?php 
        if(isset($_GET['error'])) {
            if($_GET['error'] == "wrongpwd") {
                echo '<p class="errormsg">*Invalid username or password. Please try again!*</p>';             }
        }
    ?>

    <div class="box">
        <div class="heading">
            <h1><b><u>Events Categorized</u></b></h1>
        </div>
    </div>

    <div class="content">
        <ul>
            <li><a href="academic.php" name="academic">Academic</a></li>
            <li><a href="art.php">Art</a></li>
            <li><a href="charitable.php">Charitable</a></li>
            <li><a href="env.php">Environmental</a></li>
            <li><a href="mental.php">Mental Well-Being</a></li>
            <li><a href="music.php">Music, Dance & Drama</a></li>
            <li><a href="sports.php">Sports</a></li>
            <li><a href="sus.php">Sustainability</a></li>
            <li><a href="others.php">Others</a></li>
        </ul>
    </div>
</body>

</html>