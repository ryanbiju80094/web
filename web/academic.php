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
</head>

<body>
    <div>
        <a class="home" href="index.php">Home |</a>
    </div>
    <div class="box">
        <div class="heading">
            <h1><b><u>Academic</u></b></h1>
        </div>
    </div>

    <?php 
        $sql = "SELECT * FROM academic;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if($resultCheck > 0){
            while($row = mysqli_fetch_assoc($result)){
    ?>
    <div class="outline">
        <div class="words">
            <div class="line">
                <?php echo  "#"; ?> 
                <b><?php echo $row['title']; ?> </b>
                <?php if($row['charge'] != NULL){ ?>
                    <div class="sep">Student/Teacher in-charge: <?php echo $row['charge']; ?></div> 
                <?php    
                    }
                ?>
            </div> 
            <p><?php echo $row['information']; ?></p>
            <?php if($row['link'] != NULL){ ?>
                <p><b>Link: </b><?php echo $row['link']; ?></p>  
            <?php    
                }
            ?>
        </div>
    </div>
    <?php 
            }
        }
    ?>

    <script src="script.js "></script>
</body>

</html> 