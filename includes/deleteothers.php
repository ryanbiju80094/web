<?php
if (isset($_POST['delete'])) {
    require 'dbh.php';

    $title = $_POST['deletetitle'];

    if(empty($title)) {
        header("Location: ../othersloggedin.php?error=emptyfields&name=".$title);
        exit();
    }
    else { //sending ip to database 
        $sql = "DELETE FROM others WHERE title='$title'";
        if(mysqli_query($conn, $sql)){
            header("Location: ../othersloggedin.php?delete=success");
            exit();
        } else{
            header("Location: ../othersloggedin.php?delete=error");
            exit();
        }
        mysqli_close($conn);    
    }   
}   
else{
    header("Location: ../othersloggedin.php");
    exit();
}