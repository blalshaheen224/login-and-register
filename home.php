<?php
session_start();
 include('config.php');
 if(isset($_SESSION['id']) && isset($_SESSION['username']))
 {
    $id = $_SESSION['id'];
    $user = $_SESSION['username'];
    $info = mysqli_query( $conn,"SELECT * from basic where username = '$user' " );
  while($data = mysqli_fetch_array($info) ){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <style>
     a{
    text-decoration: none;
    border: 0;
    position: relative;
    top: 10px;
    padding: 5px;
    width: 80  px;
    background-color: red;
    color: white;
    font-size: 17px;
    border-radius: 15px;
    cursor: pointer;
    transform: 0,25s;
    
     }

     .photo img
     {
        position: relative;
        width: 70px;
        right: 16.7cm;
        top: -3cm
     }
    </style>
</head>
<body>
    <center>
<a href="logout.php">log out</a>
    <h1>hello , <?php echo $user?></h1>
    <img src="" >
    <div class="photo">
        <?php echo  " <img src='image/profile.png' > ";?>
    </div>
    

    <?php
  }
  } 
 else{
    header('location: login_basic.php');
    exit();
     }
    ?>
    </center>
</body>
</html>