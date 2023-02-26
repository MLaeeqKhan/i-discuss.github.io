<?php
$showElert="false";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    include '_dbConnect.php';

    $userEmail=$_POST["email"];
    $userPass=$_POST["pass"];

    $existSq="SELECT * FROM `usersignup` where user_email= '$userEmail'";

    $result=$conn->query($existSq);
    $numRows=mysqli_num_rows($result);
   

    if($numRows==1)
    {
        $row=mysqli_fetch_assoc($result);
        $abc= $row['user_pass'];
        if(password_verify($userPass, $abc)){
            // echo "Login";
            session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['useremail']=$userEmail;
            $_SESSION['userid']=$row['user_id'];
            header("location:index.php");
        }
        else{
            header("location:login.php?passSucess=true");
        }
        
    }
    else{
        header("location:signup.php?loginSucess=true");
    }
    // header("location:index.php");
}

?>