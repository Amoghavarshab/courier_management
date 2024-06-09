<?php

session_start();
if(isset($_SESSION['uid'])){
    echo "";
    }else{
    header('location: ../index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <style>
        body
        {
        background-image:url('../images/truck.jpg');
        background-repeat: no-repeat;
        background-size: 100%;
        background-position: center  ;
        margin: 0;
        padding-bottom: 300px;
    
        }
        h2,h3{
            padding-left:550px;
        }
        .gradient-text {
            background: linear-gradient(270deg, #d63031, #3d3d3d);
            -webkit-background-clip: text; /* For Safari and old versions of Chrome */
            background-clip: text;
            color: transparent;
            font-size: 30px;
        }
       h1{
         padding-left: 700px;
       }
       .text{
            background: linear-gradient(270deg, #ff4d4d, #0c2461);
            -webkit-background-clip: text; /* For Safari and old versions of Chrome */
            background-clip: text;
            color: transparent;

       }
        
    </style>
</head>
<body>
    <?php include('header.php'); ?>
    <div style="font-weight: bold;font-family:'ARIAL'"><br><br><br><br>
        <h2 class="gradient-text"><b>Welcome To Need For Speed Courier Management Service</b></h2>
        <h3  class="gradient-text" style="font-family:consolas">“Where speed meets excellence”</h3><br><br>
        <h1 class="text" style="font-family:verdana"><b> DBMS MINI PROJECT</b></h1>
        <h6></h6>
    </div>
</body>
</html>