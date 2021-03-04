<?php
if (isset($_POST['delete'])) {
    require 'dbh.php';

    $title = $_POST['deletetitle'];

    if(empty($title)) {
        header("Location: ../mentalloggedin.php?error=emptyfields&name=".$title);
        exit();
    }
    else { //sending ip to database 
        $sql = "DELETE FROM mental WHERE title='$title'";
        if(mysqli_query($conn, $sql)){
            header("Location: ../mentalloggedin.php?delete=success");
            exit();
        } else{
            header("Location: ../mentalloggedin.php?delete=error");
            exit();
        }
        mysqli_close($conn);    
    }   
}   
else{
    header("Location: ../mentalloggedin.php");
    exit();
}