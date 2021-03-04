<?php
if (isset($_POST['delete'])) {
    require 'dbh.php';

    $title = $_POST['deletetitle'];

    if(empty($title)) {
        header("Location: ../susloggedin.php?error=emptyfields&name=".$title);
        exit();
    }
    else { //sending ip to database 
        $sql = "DELETE FROM sus WHERE title='$title'";
        if(mysqli_query($conn, $sql)){
            header("Location: ../susloggedin.php?delete=success");
            exit();
        } else{
            header("Location: ../susloggedin.php?delete=error");
            exit();
        }
        mysqli_close($conn);    
    }   
}   
else{
    header("Location: ../susloggedin.php");
    exit();
}