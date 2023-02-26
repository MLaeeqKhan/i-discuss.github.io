

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">

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
   .heading{
            padding:2rem;
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
            width: 50%;
            border-radius:7px;
            background-color: rgb(223, 238, 248);
            box-shadow: 0 1rem 1rem -0.7rem rgba(0, 0, 0, 0.4);
            
        }

        .btnUp {
                border: none;
                color: white;
                width:120px;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 20px 2px;
               background-color: #4CAF50;
                cursor: pointer;
               
               }
               .btnUp:hover{
                background-color: #75eb78;
                transition: 0.5s;
               }

       
      
</style>
<title>Update Question</title>
<?php

include '_dbConnect.php';
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    
  }
  
  $id=$_GET['id'];
  $q= "SELECT * FROM threads where thread_id='$id'";
  $queryResult= $conn->query($q);
  $result= $queryResult->fetch_assoc();
  
  $thread_title=$result['thread_title'];
    $thread_desc=$result['thread_desc'];

    $thread_title=str_replace("&lt","<","$thread_title");
    $thread_title=str_replace("&gt",">","$thread_title");
    $thread_title=str_replace("&ct","'","$thread_title");

    $thread_desc=str_replace("&lt","<", "$thread_desc");
    $thread_desc=str_replace("&gt",">", "$thread_desc");
    $thread_desc=str_replace("&ct","'", "$thread_desc");
  $conn->close();

?>

</head>
<body>


<form class="form" action="update.php" method="post">
<h1 class="heading">UPDATE</h1>
   <div class="input"> Problem Title: <input style="height: 40px;" type="text" name="thread_title" value="<?php echo $thread_title; ?>" required>
   <small>Keep your title short and crispy as posible</small></div>

   <div class="input">Elaborate your Question: <textarea name="thread_desc" rows="10"><?php echo $thread_desc; ?></textarea>
   <input type="hidden" name="id" value="<?php echo $result ["thread_id"]; ?>">

   <input class="btnUp"t type="submit" value="Update">
   <!-- <a href="update.php" style=" background-color: #4CAF50;" class="btnUp">Update</a> -->
</form>

</body>
</html>