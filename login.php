<?php
session_start();
include('config.php');
if(isset($_POST['username']) && isset($_POST['password']) )
{

    $username = stripcslashes(strtolower($_POST['username']));
    $md5_pass = md5($_POST['password']);
    $password = stripcslashes(strtolower($_POST['password']));

    $username =htmlentities(mysqli_real_escape_string($conn,$_POST['username']));
    $password =htmlentities(mysqli_real_escape_string($conn,$_POST['password']));


    if(empty($username))
    {
      $user_error = '<p id ="error"> please enter username<p>';
      $err_s = 1 ;
    }

    if(empty($password))
    {
      $pass_error = '<p id ="error"> please insert password <p> ';
      $err_s = 1 ;
      include('login_basic.php');
    }
  
  
    if(!isset($err_s ))
    {
        $sql = "SELECT * FROM basic where username ='$username' AND md5_pass = '$md5_pass'limit 1 ";
        $result = mysqli_query($conn,$sql);
        $num_rows = mysqli_num_rows($result);
        if($num_rows !=0){
            $row = mysqli_fetch_assoc($result);
            if($row['username'] === $username && $row['password'] === $password )
            {
               $_SESSION['username'] = $row['username'];
               $_SESSION['id'] = $row['id'];
               header('location:home.php');
               exit();
            }
                
        }
            else{
                 $user_error = '<p id ="error"> username or password are incorrect <p>';
                 include('login_basic.php');
                 exit();
                }

        
      

         
    }
           

}






// $sql ="SELECT * FROM basic where username =$username AND password = $password ";
// $result = mysqli_query($conn,$sql);
// $row = mysqli_fetch_assoc($result);
// echo"
// $row[id]

// $row[username]

// $row[password]
// ";