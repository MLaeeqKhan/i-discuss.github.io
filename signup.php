<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup.css">
    <title>Signup</title>
</head>

<body>

    <form action="signupConnect.php" method="POST">
    <?php
       if(!isset($_GET['signupSucess']) && isset($_GET['loginSucess']) && $_GET['loginSucess']=='true')
        echo "<small style='color:red;'>Please signup !*</small>";
       ?>
        <h2>Signup To iDiscuss</h2>
        <div class="inputBox">
            <input type="text" name="email" required>
            <span>Email Address</span> 
        </div>
        <?php
          if(isset($_GET['signupSucess']) && $_GET['signupSucess']=='true')
          echo ' <small style="color:red;">Email already in use!*</small>';
        ?>
      

        <div class="inputBox">
            <input type="password" name="pass" required>
            <span>Password</span>
        </div>

        <div class="inputBox">
            <input type="password" name="Cpass" required>
            <span>Confirm Password</span>
        </div>

        <?php
       if(!isset($_GET['signupSucess']) && isset($_GET['showAlert']) && $_GET['showAlert']=='true')
        echo "<small style='color:red;'>Password do not match!*</small>";
       ?>

        <?php include 'signupConnect.php'; ?>
        
        <div><button class="signup" type="submit">Sign up</button></div>

    </form>
</body>

</html>