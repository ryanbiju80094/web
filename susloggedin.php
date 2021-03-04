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
            <h1><b><u>Sustainability</u></b></h1>
        </div>
    </div>

    <a class="open-button" onclick="openForm()">| New Entry</a>
    <div class="form-popup" id="myForm">
        <form action="includes/newsus.php" method="post">
            <label for="id"><b>Post #:</b></label>
            <input type="text" placeholder="Enter number.." name="id" id="msg">

            <label for="title"><b>Title:</b></label>
            <input type="text" placeholder="Enter title.." name="name" id="msg">

            <label for="des"><b>Description:</b></label>
            <input type="text" placeholder="Enter description.." name="des" id="msg">

            <button type="submit" class="btn" onclick="closeForm()" name="submit">Submit</button>
            <button type="submit " class="btn cancel " onclick="closeForm()">Close</button>
        </form>
    </div>

    <?php 
        if(isset($_GET['error'])) {
            if($_GET['error'] == "emptyfields") {
                echo '<p class="errormsg">*Fill in all fields!*</p>';             
            }
        }
    ?>

    <?php 
        $sql = "SELECT * FROM sus;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if($resultCheck > 0){
            while($row = mysqli_fetch_assoc($result)){
    ?>
    <div class="outline">
        <div class="words">
            <div class="line">
                <?php echo  "#" .$row['id']; ?> 
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