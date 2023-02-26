<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <style>
           html{
            font-size: 100%;
        }
        @media(max-width:320px){
            html{
                font-size: 45%;
            }
            .form{
                width:100vw;
        }
        
        }
        @media(max-width:425px){
            html{
                font-size: 45%;
            }
            .form{
            /* width:100vw; */
        }

        }
        #ques{
            min-height: 43px;
            margin: 6rem;
            background-color: rgb(217, 212, 212);

        }
        .media  {
           display: flex;
           flex-direction: column;
           margin: 6rem;
           background-color: rgb(217, 212, 212);
           width: 70vw;
           box-shadow: 0 1rem 1rem -0.7rem rgba(0, 0, 0, 0.4);
           
            
        }
        .input{
            display: flex;
            flex-direction: column;
            margin: 2rem;
           
            
        }
        input,textarea{
            box-shadow: 0 1rem 1rem -0.7rem rgba(0, 0, 0, 0.4);
            border:none;
            border-radius: 7px;
            
        }
        .form{
            display: flex;
            flex-direction: column;
            margin: 6rem;
            width: 40rem;
            width: 80%;
            border-radius:7px;
            background-color: rgb(223, 238, 248);
            box-shadow: 0 1rem 1rem -0.7rem rgba(0, 0, 0, 0.4);
            
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
                margin-left:-2rem;
                cursor: pointer;
                background-color: #4CAF50;
               }
               .btn:hover{
                background-color: #75eb78;
                transition: 0.5s;
               }
        .heading{
            padding:2rem;
        }
      
       

        .jumbotron{
            display: flex;
            text-align: center;
            flex-direction: column;
            margin: 6rem;
            padding: 2rem;
            border-radius:0.7rem;
            border-bottom-right-radius: 10rem;
            background-color: rgb(217, 212, 212);
            box-shadow: 0 1rem 1rem -0.7rem rgba(0, 0, 0, 0.4);

        }
    </style>
    <title>Welcome to iDiscuss - Coding Forums</title>
</head>

<body>
<?php include '_header.php';?>
<?php include '_dbConnect.php';?>
<?php
$id=$_GET['catid'];
  include '_dbConnect.php'; 
 $sq="SELECT * FROM `categories` where category_id=$id";
$result = $conn->query($sq);

while($row=$result->fetch_assoc())
{
 $id=$row['category_id'];
 $cat=$row['category_name'];
 $desc=$row['category_discription'];
}
?>

  <?php echo'<div class="jumbotron">
    <h1>Welcome to '.$cat.' - Coding Forums</h1>      
    <p>'.$desc.'</p>
    <hr>
    <p class="p">This is a peer to peer forum. No Spam / Advertising / Self-promote in the forums is not allowed. Do not post copyright-infringing material. Do not post “offensive” posts, links or images. Do not cross post questions. Remain respectful of other members at all times.</p>   
  
  </div>';
  ?>



  <?php 
   if(isset($_SESSION["loggedin"]) && $_SESSION["logged"]=true){
  echo'<div><form class="form"  action="'. $_SERVER['REQUEST_URI'].'" method="post">
  <h1 class="heading">Start a Discussions</h1>
    <div class="input"> Problem Title: <input style="height: 40px;" type="text" name="thread_title" required>
    <small>Keep your title short and crispy as posible</small></div>

    <div class="input">Elaborate your Question: <textarea type="text" name="thread_desc" rows="10" required></textarea>

    <input  type="hidden" name="user_id" value="'.$_SESSION["userid"].'">

    <div class="input"> <input class="btn" type="submit" value="submit">
   </div>

  </form></div>';
  
   }

   else{
    echo'<center><div class="media" style="width: 40rem;padding-top: 15px;border-radius: 1.6rem;"><p>You are not logged in. Please login to be able to post a Question.</p></div></center>';
   }
  ?>



  <?php 
  $method=$_SERVER['REQUEST_METHOD'];

  if($method=='POST')
  {

    $thread_title=$_POST['thread_title'];
    $thread_desc=$_POST['thread_desc'];

    $thread_title=str_replace("<","&lt"," $thread_title");
    $thread_title=str_replace(">","&gt","$thread_title");
    $thread_title=str_replace("'","&ct","$thread_title");

    $thread_desc=str_replace("<","&lt", "$thread_desc");
    $thread_desc=str_replace(">","&gt", "$thread_desc");
    $thread_desc=str_replace("'","&ct", "$thread_desc");




    $user_id= $_POST["user_id"];

     $sq="INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, timestamp) VALUES ('$thread_title', '$thread_desc', '$id', '$user_id',current_timestamp());";

    //  echo $sq;

     $conn->query($sq);
  }
 
  ?>
  
  <div  style="margin:2rem;"><h1>Browse Questions</h1></div>
  <?php
$id=$_GET['catid'];
include '_dbConnect.php'; 
$sq="SELECT * FROM `threads` where thread_cat_id='$id' order by thread_id desc";
$result = $conn->query($sq);
$Noresult=true;
while($row=$result->fetch_assoc())
{
 $Noresult=false;
 $id=$row['thread_id'];
 $title=$row['thread_title'];
 $desc=$row['thread_desc'];
 $dateTime=$row['timestamp'];
 $thread_user_id=$row['thread_user_id'];

    $title=str_replace("<","&lt","$title");
    $title=str_replace(">","&gt","$title");
    $title=str_replace("&ct","'","$title");

    $desc=str_replace("<","&lt", "$desc");
    $desc=str_replace(">","&gt", "$desc");
    $desc=str_replace("&ct","'", "$desc");

 $Usersql="SELECT user_email FROM `usersignup` WHERE user_id='$thread_user_id';";
 $UserResult=$conn->query($Usersql);
 $UserRow=mysqli_fetch_assoc($UserResult);

 echo'<div  class="media">
 <div class="imge" >
     <img style="width: 4rem;" src="img/profile.png" alt="profile img" >
 </div>
 <div class="name" ><p >'.$UserRow['user_email'].'</p> </div>
 <div class="cont">
     <div class="title"><a href="thread.php?threadid='.$id.'"><p style=" padding-left:2rem;">'.$title.'</a></p></div>
 
     <div class="desc"><p style=" padding-left:2rem;">'.substr($desc,0, 100) .'</p></div>
     <div class="dateTime"><p style=" padding-left:2rem;">'.$dateTime.'</p></div>
 </div>
 
 </div>';
 }

 if($Noresult)
 {
    echo'<center><div class="media" style="width: 26rem;padding-top: 1.6rem;border-radius: 1.6rem;" >
    <p>Be the first person to ask the question</p>
 
 </div></center>';
 }



?>
    <?php include '_footer.php';?>
   
</body>

</html>