<?php
session_start();


 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Welcome, 
        <?php 
            if(isset($_SESSION['user'])){

            $user = $_SESSION['user'];
            echo $user; 
            
            }
            
        ?>
    </h1>
    <p>This is your profile page.</p>
</body>

</html>