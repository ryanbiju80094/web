<?php
if (isset($_POST['delete'])) {
    require 'dbh.php';

    $title = $_POST['deletetitle'];

    if(empty($title)) {
        header("Location: ../musicloggedin.php?error=emptyfields&name=".$title);
        exit();
    }
    else { //sending ip to database 
        $sql = "DELETE FROM music WHERE title='$title'";
        if(mysqli_query($conn, $sql)){
            header("Location: ../musicloggedin.php?delete=success");
            exit();
        } else{
            header("Location: ../musicloggedin.php?delete=error");
            exit();
        }
        mysqli_close($conn);    
    }   
}   
else{
    header("Location: ../musicloggedin.php");
    exit();
}