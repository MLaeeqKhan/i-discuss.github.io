<!doctype html>
<html lang="en">

<head>

   <link rel="stylesheet" href="slider.css">
    
    <style>
        .maindiv{
            position: relative;
        }
        .container1{
     
           position: relative;

        }
        .footer{
            position: relative;
           
        }
    </style>
    <title>Welcome to iDiscuss - Coding Forums</title>
</head>

<body>

<?php include '_header.php';?>

<div class="maindiv"></div>

<div class="container1" style="margin-bottom:1rem">
    
    <?php include'cards.php'; ?>

</div>
   <div class="footer"><?php include '_footer.php';?></div> 
</body>

</html>