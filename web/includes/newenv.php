<?php
if (isset($_POST['submit'])) {
    require 'dbh.php';

    $id = $_POST['id'];
    $title = $_POST['name'];
    $information = $_POST['des'];

    if(empty($title) || empty($information) || empty($id)) {
        header("Location: ../envloggedin.php?error=emptyfields&name=".$id.$title."&des=".$information);
        exit();
    }
    
    else { //sending ip to database
        $sql = "INSERT INTO env (id, title, information) VALUES (?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../envloggedin.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "sss", $id, $title, $information);
            mysqli_stmt_execute($stmt);
            header("Location: ../envloggedin.php?entry=success");
            exit();
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else{
    header("Location: ../envloggedin.php");
    exit();
}
