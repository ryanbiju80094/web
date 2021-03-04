<?php
    include_once 'includes/dbh.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Categorize</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="30" >
</head>

<body>
    <div>
        <a class="home" href="indexloggedin.html">Home |</a>
    </div>
    <div class="box">
        <div class="heading">
            <h1><b><u>Charitable</u></b></h1>
        </div>
    </div>

    <?php 
        if(isset($_GET['error'])) {
            if($_GET['error'] == "emptyfields") {
                echo '<p class="errormsg">*Fill in all fields!*</p>';             
            }
        }
    ?>

    <a class="open-button" onclick="openFormNew()">| New Entry</a>
    <div class="form-popup" id="myFormNew">
        <form action="includes/newcharitable.php" method="post">
            <label for="title"><b>Title:</b></label>
            <input type="text" placeholder="Enter title.." name="name" id="msg1">

            <label for="des"><b>Description:</b></label>
            <input type="text" placeholder="Enter description.." name="des" id="msg1">

            <button type="submit" class="btn" onclick="closeFormNew()" name="submit">Submit</button>
            <button type="submit " class="btn cancel " onclick="closeFormNew()">Close</button>
        </form>
    </div>

    <a class="open-button" onclick="openFormDelete()">| Delete Entry</a>
    <div class="form-popup" id="myFormDelete">
        <form action="includes/deletecharitable.php" method="post">
            <label for="deletetitle"><b>Post title to be deleted: (Case Sensitive)</b></label>
            <input type="text" placeholder="Enter title.." name="deletetitle" id="msg1">

            <button type="submit" class="btn" onclick="closeFormDelete()" name="delete">DELETE</button>
            <button type="submit " class="btn cancel " onclick="closeFormDelete()">Close</button>
        </form>
    </div>

    <?php 
        $sql = "SELECT * FROM charitable;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if($resultCheck > 0){
            while($row = mysqli_fetch_assoc($result)){
    ?>
    <div class="outline">
        <div class="words">
            <div class="line">
                <?php echo  "#"; ?> 
                <?php echo $row['title'] ."<br>"; ?> 
            </div> 
            <br>
            <?php echo $row['information']; ?> 
        </div>
    </div>
    <?php 
            }
        }
    ?>

    <script src="script.js "></script>
</body>

</html> 