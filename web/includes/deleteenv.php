<?php
if (isset($_POST['delete'])) {
    require 'dbh.php';

    $title = $_POST['deletetitle'];

    if(empty($title)) {
        header("Location: ../envloggedin.php?error=emptyfields&name=".$title);
        exit();
    }
    else { //sending ip to database 
        $sql = "DELETE FROM env WHERE title='$title'";
        if(mysqli_query($conn, $sql)){
            header("Location: ../envloggedin.php?delete=success");
            exit();
        } else{
            header("Location: ../envloggedin.php?delete=error");
            exit();
        }
        mysqli_close($conn);    
    }   
}   
else{
    header("Location: ../envloggedin.php");
    exit();
}