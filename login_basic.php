<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <title>login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <center>
        <div class="title">
             <h1>Log in</h1>
             <p>Welcome</p>
        </div>

    <form action="login.php" method="post" class="box">
        <?php  
         if(isset($user_error))
         {
           echo $user_error;
         }
        ?>
       <input type="text" name="username" placeholder="username">
       <?php  
         if(isset($pass_error))
         {
           echo $pass_error;
         }
        ?>
       <input type="password" name="password" placeholder="password" >
       <input type="submit" value="log in" name="login" >
    </form>

        <div class="Register">
         <h2>or</h2>
         <a href="Register_basic.php">Register</a>
        </div>

    
    </center>
</body>
</html>