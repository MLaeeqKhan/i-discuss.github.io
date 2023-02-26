<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <!-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->


    <style>
             html{
            font-size: 100%;
        }
        @media(max-width:320px){
            html{
                font-size: 45%;
            }
        }
        @media(max-width:425px){
            html{
                font-size: 45%;
            }
        }
    #ques {
        min-height: 43px;
        margin: 6rem;
        background-color: rgb(217, 212, 212);

    }

    .media {
        display: flex;
        flex-direction: column;
        margin: 6rem;
        width: 30rem;
        border-radius:0.6rem;
        background-color: rgb(217, 212, 212);
        box-shadow: 0 1rem 1rem -0.7rem rgba(0, 0, 0, 0.4);

    }
    .cont{
        margin-left:10px;
    }
    .heading {
        padding: 2rem;
    }

    .btnUp {
        border: none;
        color: white;
        width: 1orem;
        padding: 0.5rem 2rem;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 1.2rem;
        margin: 0.8rem 1.6rem;
        /* margin-left:-30px; */
        cursor: pointer;

    }
    .jumbotron {
        display: flex;
        text-align: center;
        flex-direction: column;
        margin: 6rem;
        padding: 2rem;
        border-radius:7px;
        background-color: rgb(217, 212, 212);
        box-shadow: 0 1rem 1rem -0.7rem rgba(0, 0, 0, 0.4);

    }
   
    </style>
    <title>Welcome to iDiscuss - Coding Forums</title>
</head>

<body>
    <?php include '_header.php';?>
    <?php include '_dbConnect.php';?>
    <?php include '_dbConnect.php'; ?>

    <?php echo'<div class="jumbotron">
    <h1>Notice</h1>      
   
    <hr>
    <p class="p">This is a peer to peer forum. No Spam / Advertising / Self-promote in the forums is not allowed. Do not post copyright-infringing material. Do not post “offensive” posts, links or images. Do not cross post questions. Remain respectful of other members at all times.</p>   
   

  </div>';
  ?>

    <div style=" margin: 6rem;">
        <h1>Browse Questions</h1>
    </div>

    <?php

  $id=$_SESSION['userid'];

include '_dbConnect.php'; 
$sq="SELECT * FROM `threads` where thread_user_id='$id' order by thread_id desc";
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

 echo'<div class="media" >
 <div class="imge" >
     <img style="width: 4rem;" src="img/profile.png" alt="profile img" >
 </div>
 <div class="name" ><p >'.$UserRow['user_email'].'</p> </div>
 <div class="cont">
     <div class="title"><a href="thread.php?threadid='.$id.'"><p>'.$title.'</a></p></div>
 
     <div class="desc"><p>'.substr($desc,0, 100) .'</p></div>
     <div class="dateTime"><p>'.$dateTime.'</p></div>

    <div>

     <a href="updateForm.php?id='.  $id. '" style=" background-color: #4CAF50;" class="btnUp">Update</a>

     <a href="delete.php?id='.  $id. '" style=" background-color: red;" class="btnUp">Delete</a>

     </div>

 </div>
 
 </div>';
 }

 if($Noresult)
 {
    echo'<center><div class="media" style="width: 40rem;padding-top: 0.7rem;border-radius: 1.6rem;">
    <p> Still You have not posted any question</p>
   </div></center>';
 }

?>
    <?php include '_footer.php';?>

</body>

</html>