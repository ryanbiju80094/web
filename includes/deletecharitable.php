<?php
if (isset($_POST['delete'])) {
    require 'dbh.php';

    $title = $_POST['deletetitle'];

    if(empty($title)) {
        header("Location: ../charitableloggedin.php?error=emptyfields&name=".$title);
        exit();
    }
    else { //sending ip to database 
        $sql = "DELETE FROM charitable WHERE title='$title'";
        if(mysqli_query($conn, $sql)){
            header("Location: ../charitableloggedin.php?delete=success");
            exit();
        } else{
            header("Location: ../charitableloggedin.php?delete=error");
            exit();
        }
        mysqli_close($conn);    
    }   
}   
else{
    header("Location: ../charitableloggedin.php");
    exit();
}