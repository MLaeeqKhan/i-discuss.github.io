<!doctype html>
<html lang="en">

<head>
   

    
    <style>
        #reply{
            min-height: 43px;
            margin: 2rem;
        }
        .media  {
            /* display: inline-block; */
            display:flex;
            flex-direction:column;
           margin: 2rem;
           background-color: rgb(217, 212, 212);
           width: 500px;
            
        }
        .cont,.form,.input{
            display: flex;
            flex-direction: column;
            margin: 2rem;
        }
        .btn {
                border: none;
                color: white;
                width:120px;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                /* margin-left:-30px; */
                cursor: pointer;
                background-color: #4CAF50;
               }

              
       

        .jumbotron{
            display: flex;
            text-align: center;
            flex-direction: column;
            margin: 2rem;
            padding: 2rem;
            background-color: rgb(217, 212, 212);

        }
    </style>
    <title>Welcome to iDiscuss - Coding Forums</title>
</head>

<body>
<?php include '_header.php';?>
<?php include '_dbConnect.php';?>
<?php
$id=$_GET['threadid'];
  include '_dbConnect.php'; 
 $sq="SELECT * FROM `threads` where thread_id=$id";
$result = $conn->query($sq);

while($row=$result->fetch_assoc())
{
 
 $title=$row['thread_title'];
 $desc=$row['thread_desc'];
 $thread_user_id=$row['thread_user_id'];

 $Usersql="SELECT user_email FROM `usersignup` WHERE user_id=' $thread_user_id'";
 $UserResult=$conn->query($Usersql);
 $UserRow=mysqli_fetch_assoc($UserResult);
 $postedBy= $UserRow['user_email'];

}
?>

  <?php echo'<div class="jumbotron">
    <h2>'.$title.'</h2>      
    <pre>'.$desc.'</pre>
    <hr>
    <p class="p">This is a peer to peer forum. No Spam / Advertising / Self-promote in the forums is not allowed. Do not post copyright-infringing material. Do not post “offensive” posts, links or images. Do not cross post questions. Remain respectful of other members at all times.</p> 

    <p class="user"><h2>Posted by: '.$postedBy.'</h2></p>

   
  
  </div>';
  ?>

<?php
if(isset($_SESSION["loggedin"]) && $_SESSION["logged"]=true){
  echo' <form class="form" action="'.$_SERVER['REQUEST_URI'].'" method="post">
     <h1>Post a Reply</h1>
   
    <div class="input">Type your Reply: <textarea name="reply" rows="5" required></textarea>
   
    </div>

    <input  type="hidden" name="user_id" value="'.$_SESSION["userid"].'">

    <div class="input"> <input class="btn" type="submit" value="submit">
   </div>

  </form>';
  echo'<div id="reply"><h1>Replies</h1></div>';
  
}
else{
    echo'<div id="reply"><p>You are not logged in. Pleas login to be able to start a discussion.</p></div>';
}
?>
  <?php 
  $method=$_SERVER['REQUEST_METHOD'];

  if($method=='POST')
  {

    $reply=$_POST["reply"];
    $id=$_GET['threadid'];

    $reply=str_replace("<","&lt"," $reply");
    $reply=str_replace(">","&gt","$reply");



    $user_id= $_SESSION["userid"];

     $sq="INSERT INTO `replies` (`reply_content`, `thread_id`, `user_id`, `reply_time`) VALUES ('$reply', '$id','$user_id', current_timestamp())";
     $conn->query($sq);
  }
 
  ?>
  

  
 

  <?php

include '_dbConnect.php'; 
$sq="SELECT * FROM `replies` where thread_id='$id'";
$result = $conn->query($sq);
$Noresult=true;
while($row=$result->fetch_assoc())
{
    $Noresult=false;
 $id=$row['thread_id'];
 $reply=$row['reply_content'];
 $replyTime=$row['reply_time'];
 $thread_user_id=$row['user_id'];

 $Usersql="SELECT user_email FROM `usersignup` WHERE user_id=' $thread_user_id'";
 $UserResult=$conn->query($Usersql);
 $UserRow=mysqli_fetch_assoc($UserResult);
 
 
 echo'<div class="media">
 <div class="imge" >
     <img style="width: 50px;" src="img/profile.png" alt="profile img" >
 </div>
 <div class="name" ><p >'.$UserRow['user_email'].'</p> </div>
 <div class="cont">
     <div class="title">'.$reply.'</p></div>
     <div class="dateTime"><p>'.$replyTime.'</p></div>
 </div>
 
 </div>';

}

if($Noresult)
{
    echo' <center><div class="media" style="width: 300px;padding-top: 10px;border-radius: 20px;">
    <p >Be the first person to give reply</p>
    
    </div></center>';
}

?>

    <?php include '_footer.php';?>
   
</body>

</html>