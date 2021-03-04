<?php
if (isset($_POST['submit'])) {
    require 'dbh.php';

    $title = $_POST['name'];
    $charge = $_POST['charge'];
    $information = $_POST['des'];
    $link = $_POST['link'];

    if(empty($title) || empty($information)) {
        header("Location: ../academicloggedin.php?error=emptyfields&name=".$title."&des=".$information);
        exit();
    }
    
    else { //sending ip to database
        $sql = "INSERT INTO academic (title, charge, information, link) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../academicloggedin.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "ssss", $title, $charge, $information, $link);
            mysqli_stmt_execute($stmt);
            header("Location: ../academicloggedin.php?entry=success");
            exit();
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else{
    header("Location: ../academicloggedin.php");
    exit();
}
