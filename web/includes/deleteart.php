<?php
if (isset($_POST['delete'])) {
    require 'dbh.php';

    $title = $_POST['deletetitle'];

    if(empty($title)) {
        header("Location: ../artloggedin.php?error=emptyfields&name=".$title);
        exit();
    }
    else { //sending ip to database 
        $sql = "DELETE FROM art WHERE title='$title'";
        if(mysqli_query($conn, $sql)){
            header("Location: ../artloggedin.php?delete=success");
            exit();
        } else{
            header("Location: ../artloggedin.php?delete=error");
            exit();
        }
        mysqli_close($conn);    
    }   
}   
else{
    header("Location: ../artloggedin.php");
    exit();
}