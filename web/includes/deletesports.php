<?php
if (isset($_POST['delete'])) {
    require 'dbh.php';

    $title = $_POST['deletetitle'];

    if(empty($title)) {
        header("Location: ../sportsloggedin.php?error=emptyfields&name=".$title);
        exit();
    }
    else { //sending ip to database 
        $sql = "DELETE FROM sports WHERE title='$title'";
        if(mysqli_query($conn, $sql)){
            header("Location: ../sportsloggedin.php?delete=success");
            exit();
        } else{
            header("Location: ../sportsloggedin.php?delete=error");
            exit();
        }
        mysqli_close($conn);    
    }   
}   
else{
    header("Location: ../sportsloggedin.php");
    exit();
}