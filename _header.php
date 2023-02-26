<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title> Navbar </title>
 
      <link rel="stylesheet" href="headNavBar.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
      
   </head>
   <body>
      <nav>
         <div class="menu-icon">
            <span class="fas fa-bars"></span>
         </div>
         <div class="logo">
            iDiscuss
         </div>
         <div class="nav-items">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
            
           <?php
            if(isset($_SESSION["loggedin"]) && $_SESSION["logged"]=true){
               
               echo '
               <li><a href="yourQ.php">yourQ</a></li>
               <li><button class="logout"><a href="logout.php" target="_blank">Logout</a></button></li>
              
               ';
               echo '<li style="color:white;"> '.$_SESSION['useremail'].'</li>';

            }
           else{
            echo '<li><button class="login"><a href="login.php" target="_blank">Login</a></button></li>
            <li><button class="signup"><a href="signup.php" target="_blank">Signup</a></button></li>
            <!-- <li><button type="submit" class="signup" id="trigger">Login</button></li>
            <li><button type="submit" class="signup">Signup</button></li> -->';
           }
            ?>
         </div>
         <div class="search-icon">
            <span class="fas fa-search"></span>
         </div>
         <div class="cancel-icon">
            <span class="fas fa-times"></span>
         </div>
         <form action="search.php" method="GET">
            <input style="width: 200px;" type="search" class="search-data" name="search" placeholder="Search" required>
            <button type="submit" class="fas fa-search"></button>
         </form>
         
         
         
      </nav>

   
      <?php


// if(isset($_GET['signupSucess']) && $_GET['signupSucess']=="true"){
//  echo'<script>
//  alert(`<div class="alert">
//  <strong>Error!</strong>You are already logedin
// </div>`);
// </script>';
// header("location:index.php?signupSucess=true");
// exit();
// }
// else{
//   echo'<script>
//      alert(`<div class="alert">
//      <strong>Error!</strong>You are already logedin
//   </div>`);
//   </script>';

//   header("location:index.php?signupSucess=false&error=$showError");
 
// }
 ?>


      <script>
         const menuBtn = document.querySelector(".menu-icon span");
         const searchBtn = document.querySelector(".search-icon");
         const cancelBtn = document.querySelector(".cancel-icon");
         const items = document.querySelector(".nav-items");
         const form = document.querySelector("form");
         menuBtn.onclick = ()=>{
           items.classList.add("active");
           menuBtn.classList.add("hide");
           searchBtn.classList.add("hide");
           cancelBtn.classList.add("show");
         }
         cancelBtn.onclick = ()=>{
           items.classList.remove("active");
           menuBtn.classList.remove("hide");
           searchBtn.classList.remove("hide");
           cancelBtn.classList.remove("show");
           form.classList.remove("active");
           cancelBtn.style.color = "#ff3d00";
         }
         searchBtn.onclick = ()=>{
           form.classList.add("active");
           searchBtn.classList.add("hide");
           cancelBtn.classList.add("show");
         }
      </script>
      <!-- <script src="login.js"></script> -->
   </body>
</html>