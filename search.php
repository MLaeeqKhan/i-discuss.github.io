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
        }
        @media(max-width:425px){
            html{
                font-size: 45%;
            }
        }
        .container h2{
            margin-left:6rem;
        }
        .jumbotron{
           
            display: flex;
            flex-direction: column;
            margin: 6rem;
            padding: 2rem;
            background-color: rgb(217, 212, 212);
            width: 36rem;
        }
        .result{
            margin: 6rem;
        }
    </style>
    <title>Welcome to iDiscuss - Coding Forums</title>
</head>

<body>
<?php include '_dbConnect.php';?>
<?php include '_header.php';?>

<div class="container">
    <h2>Search results for <em>"<?php echo $_GET['search']?>"</em>  </h2>


    <?php 
    $get=$_GET["search"];
$sq="SELECT * FROM threads where Match (thread_title, thread_desc) AGAINST ('$get')";

$result = $conn->query($sq); 
$numResut=0;


// if($result){
//     echo $get;
// }

while($row=$result->fetch_assoc())
{
//  echo"search";
 $title=$row['thread_title'];
 $desc=$row['thread_desc'];
 $thread_id=$row['thread_id'];
 $url="thread.php?threadid=".$thread_id;

 echo'<div class="result">
        <h3><a href="'.$url.'" class="text">'.$title.'</a></h3>
        <p>'.substr($desc,0,100).'</p>
    </div>';

    $numResut++;
}

if($numResut===0){
    echo '<div class="jumbotron">
                    <div class="container">
                        <p class="display">No Results Found</p>
                        <p class="lead"> Suggestions: <ul>
                                <li>Make sure that all words are spelled correctly.</li>
                                <li>Try different keywords.</li>
                                <li>Try more general keywords. </li></ul>
                        </p>
                    </div>
                 </div>';
}
?>
</div>
<!-- <div class="footer">
    <?php include '_footer.php';?>
    </div> -->
</body>

</html>