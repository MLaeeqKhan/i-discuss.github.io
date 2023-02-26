<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>

   <form action="loginConnect.php" method="POST">
    <h2>Login To iDiscuss</h2>
    <div class="inputBox">
    <input type="text" name="email" required>
    <span>Email Address</span>
    </div>
   
    <?php
   
   if(isset($_GET['passSucess']) && $_GET['passSucess']=='true')
     echo "<small style='color:red;'>Email or Password incorrect!*</small>";
    ?>
    <div class="inputBox">
    <input type="password" name="pass" required>
    <span>Password</span>
    </div>
   
    <?php include 'loginConnect.php'; ?>

    <div><input class="login" type="submit" value="Log in"></input></div>

   </form>
</body>

</html>