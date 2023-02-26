<?php
$showAlert="false";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    include '_dbConnect.php';

    $userEmail=$_POST["email"];
    $userPass=$_POST["pass"];
    $Cpass=$_POST["Cpass"];

    $existSq="SELECT * FROM `usersignup` where user_email= '$userEmail'";

    $result=$conn->query($existSq);
    $numRows=mysqli_num_rows($result);


    if($numRows>0)
    {
      header("location:signup.php?signupSucess=true");
       }
    else{
        if($userPass===$Cpass)
        {
          $hash=password_hash($userPass,PASSWORD_DEFAULT);
          
          $sq="insert into usersignup (user_email, user_pass,timestamp) values( '$userEmail','$hash',current_timestamp())";
          $result=$conn->query($sq);
          if($result){
            // $showElert=false;
            header("location:login.php");
            exit();
          }
        }
        else{
          header("location: signup.php?showAlert=true");
        }
    }
// header("location:login.php?signupSucess=false&error=$showError");



}

?>

