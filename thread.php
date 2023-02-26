<!doctype html>
<html lang="en">

<head>
   
    
    <style>
           html{
            font-size: 100%;
        }
        @media(max-width:320px){
            html{
                font-size: 45%;
            }
            .form{
                width:80vw;
                
        }
        
        }
        @media(max-width:425px){
            html{
                font-size: 45%;
            }
            .form{
            width:70%;
            height:70%
        }

        }
        #reply{
            min-height: 43px;
            margin: 2rem;
        }
        .media  {
            /* display: inline; */
            display:flex;
            flex-direction:column;
            
           margin: 6rem;
           border-radius:7px;
           background-color: rgb(217, 212, 212);
           /* width: 70vw; */
           box-shadow: 0 1rem 1rem -0.7rem rgba(0, 0, 0, 0.4);
            /* z-index: -1; */
            /* opacity: 0.2; */
        }
        .cont{
            /* opacity: 0.9; */
        }
        .cont,.form,.input{
            display: flex;
            flex-direction: column;
            margin: 2rem;
          
        }
        .form{
            display: flex;
            flex-direction: column;
            margin: 6rem;
            padding:2rem;
            /* border:2px solid grey; */
            width: 80%;
            border-radius:7px;
            background-color: rgb(223, 238, 248);
            box-shadow: 0 1rem 1rem -0.7rem rgba(0, 0, 0, 0.4);
        }
            
            textarea{
            /* border:2px solid grey; */
            border: none;
            box-shadow: 0 1rem 1rem -0.7rem rgba(0, 0, 0, 0.4);
            border-radius: 7px;
            
        }

        .btn {
                border: none;
                color: white;
                width:10rem;
                border-radius:0.6rem;
                padding: 1rem 3rem;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 1.2rem;
                margin: 0.2rem 0.1rem;
                margin-left:-0rem;
                cursor: pointer;
                background-color: #4CAF50;
               }
               .btn:hover{
                background-color: #75eb78;
                transition: 0.5s;
               }
       

        .jumbotron{
            display: flex;
            text-align: center;
            flex-direction: column;
            margin: 6rem;
            padding: 2rem;
            border-radius:7px;
            border-bottom-right-radius: 12rem;
            background-color: rgb(217, 212, 212);
            box-shadow: 0 1rem 1rem -0.7rem rgba(0, 0, 0, 0.4);

        }
        .scroll{
            overflow: scroll;
            text-align: left;
            height: 20rem;
            padding:1rem;
            background-color:white;
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

 $title=str_replace("<","&lt","$title");
    $title=str_replace(">","&gt","$title");
    $title=str_replace("&ct","'","$title");

    $desc=str_replace("<","&lt", "$desc");
    $desc=str_replace(">","&gt", "$desc");
    $desc=str_replace("&ct","'","$desc");

 $Usersql="SELECT user_email FROM `usersignup` WHERE user_id=' $thread_user_id'";
 $UserResult=$conn->query($Usersql);
 $UserRow=mysqli_fetch_assoc($UserResult);
 $postedBy= $UserRow['user_email'];

}

?>

  <?php echo'<div class="jumbotron">
    <h2>'.$title.'</h2>      
   <pre class="scroll"> '.$desc.'</pre>
    <hr>
    <p class="p">This is a peer to peer forum. No Spam / Advertising / Self-promote in the forums is not allowed. Do not post copyright-infringing material. Do not post “offensive” posts, links or images. Do not cross post questions. Remain respectful of other members at all times.</p> 

    <p class="user"><h2>Posted by: '.$postedBy.'</h2></p>

  
  </div>';
  ?>

<?php
if(isset($_SESSION["loggedin"]) && $_SESSION["logged"]=true){
  echo' <form class="form" action="'.$_SERVER['REQUEST_URI'].'" method="post">
     <h1>Post a Reply</h1>
   
    <div class="input">Type your Reply: <textarea name="reply" rows="10" required></textarea>
   
    </div>

    <input  type="hidden" name="user_id" value="'.$_SESSION["userid"].'">

    <div class="input"> <input class="btn" type="submit" value="submit">
   </div>

  </form>';
 
  
}
else{
    echo'<center><div class="media" style="width:40rem;padding-top: 0.8rem;border-radius: 1.6rem;"><p>You are not logged in. Please login to be able to start a discussion.</p></div></center>';
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
    $reply=str_replace("'","&ct","$reply");



    $user_id= $_SESSION["userid"];

     $sq="INSERT INTO `replies` (`reply_content`, `thread_id`, `user_id`, `reply_time`) VALUES ('$reply', '$id','$user_id', current_timestamp())";
     $conn->query($sq);
  }
  ?>

  <div style="margin:6rem;" id="reply"><h1>Replies</h1></div>
  <?php

include '_dbConnect.php'; 
$sq="SELECT * FROM `replies` where thread_id='$id' order by reply_id desc";
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
 
 $reply=str_replace("&ct","'","$reply");
 
 echo'<div class="media">
 <div class="imge" >
     <img style="width: 4rem;" src="img/profile.png" alt="profile img" >
 </div>
 <div class="name" ><p >'.$UserRow['user_email'].'</p> </div>
 <div class="cont">
     <div><pre>'.$reply.'</pre></div>
     <div class="dateTime"><p>'.$replyTime.'</p></div>
 </div>
 
 </div>';

}

if($Noresult)
{
    echo' <center><div class="media" style="width: 26rem;padding-top: 1.6rem;border-radius: 1.6rem;">
    <p >Be the first person to give reply</p>
    
    </div></center>';
}

 



?>

    <?php include '_footer.php';?>
   
</body>

</html>