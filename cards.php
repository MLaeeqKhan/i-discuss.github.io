<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- custom css file link  -->
    <link rel="stylesheet" href="cards.css">

</head>
<body>
    <?php include '_dbConnect.php'; 
    $sq="SELECT * FROM `categories`";
   $result = $conn->query($sq);
?>
  
  
<div class="container">

    <h1 class="heading">iDiscuss Categories</h1>

    <div class="box-container">
        <?php 
    while($row=$result->fetch_assoc())
   {
    $id=$row['category_id'];
    $cat=$row['category_name'];
    $desc=$row['category_discription'];
    // session_start();
    $_SESSION['catid']=$row['category_id'];

   echo ' <div class="box">
     <img src="img/icon-'.$id.'.png" alt="">
    <h3><a href="threadsList.php?catid='.$id.'">'.$cat.'</a></h3>
    <p>'.substr($desc,0, 100) .'...</p>
    <a href="threadsList.php?catid='.$id.'" class="btn">read more</a>
</div>';

    
   }
   ?>
    </div>

</div>

</body>
</html>