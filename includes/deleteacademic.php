<?php
if (isset($_POST['delete'])) {
    require 'dbh.php';

    $title = $_POST['deletetitle'];

    if(empty($title)) {
        header("Location: ../academicloggedin.php?error=emptyfields&name=".$title);
        exit();
    }
    else { //sending ip to database 
        $sql = "DELETE FROM academic WHERE title='$title'";
        if(mysqli_query($conn, $sql)){
            header("Location: ../academicloggedin.php?delete=success");
            exit();
        } else{
            header("Location: ../academicloggedin.php?delete=error");
            exit();
        }
        mysqli_close($conn);    
    }   
}   
else{
    header("Location: ../academicloggedin.php");
    exit();
}