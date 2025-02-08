<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
</head>
<body>
    <?php
    include("src/conn.php");
    
    session_destroy(); 
    echo '<script> window.location.href ="index.php" </script>';
  
     // Redirect to login page after logout
    ?>
</body>
</html>