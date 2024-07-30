
<?php
include('config.php');

if(isset($_POST['insert']))
{
   $username = stripcslashes(strtolower( $_POST['username'])) ;
   $email    =stripcslashes(strtolower($_POST['email'])) ;
   $password =stripcslashes (strtolower($_POST['password']));

   if(isset($_POST['birthday_day']) && isset($_POST['birthday_month']) && isset($_POST['birthday_year']))
   {
    $birthday_day   = (int) $_POST['birthday_day'];
    $birthday_month = (int) $_POST['birthday_month'];
    $birthday_year  = (int) $_POST['birthday_year'];
    $birthday       = htmlentities(mysqli_real_escape_string($conn,$birthday_day.'-'.$birthday_month.'-'.$birthday_year) ) ;
   }
    $username =htmlentities(mysqli_real_escape_string($conn,$_POST['username']));
    $email    =htmlentities(mysqli_real_escape_string($conn,$_POST['email']));
    $password =htmlentities(mysqli_real_escape_string($conn,$_POST['password']));
    $mb5_pass = md5($password);

   if(isset($_POST['gender']))
   {
     $Gender = $_POST['gender'];
     $Gender =  htmlentities(mysqli_real_escape_string($conn,$_POST['gender']));
     if(!in_array($Gender,['male','female'] ))
     {
      $Gender_erreo = 'please choose gender not a text ! ';
      $err_s = 1 ;
     }

     $cheak_user = "SELECT * FROM basic WHERE username = '$username' ";
     $cheak_result = mysqli_query($conn,$cheak_user);
     $num_rows     = mysqli_num_rows($cheak_result);
     if($num_rows != 0)
     {
      $user_error = '<p id ="error"> username is aleardy used  <p>';
      $err_s = 1 ;
     }



   }
    if(empty($username))
    {
      $user_error = '<p id ="error"> please enter username<p>';
      $err_s = 1 ;
    }
    elseif(strlen ( $username < 6 )  )
    {
      $user_error = ' <p id ="error"> your username needs to have a minimum of 6 letters <p>';
    }

    elseif(filter_var($username,FILTER_VALIDATE_INT))
    {
      $user_error = ' <p id ="error"> please enter a vaild username not a number  <p>';
    }

    if(empty($email))
    {
      $email_error = '<p id ="error"> please insert email  <p>';
      $err_s = 1 ;
    }
    
    elseif (filter_var($email,FILTER_VALIDATE_EMAIL))
    {
      $email_error = '<p id ="error"> please insert valid email  <p>';
      $err_s = 1 ;
    }

    if(empty($Gender))
    {
      $Gender_erreo = '<p id ="error"> please choose gender  <p>';
      $err_s = 1 ;
    }

    if(empty($birthday))
    {
      $birthday_error ='<p id ="error"> please insert date of birthday  <p> ';
      $err_s = 1 ;
    }

    if(empty($password))
    {
      $pass_error = '<p id ="error"> please insert password  <p> ';
      $err_s = 1 ;
      include('Register_basic.php');
    }

    elseif(strlen($password < 6 ))
    {
      $pass_error = ' <p id ="error"> your password needs to have a minimum of 6 letters  <p>';
      $err_s = 1 ;
      include('Register_basic.php');
    }
       if($Gender == 'male')
       {
        $picture = 'profile.php';
       }
       elseif($Gender == 'female')
       {
        $picture = 'femele_profile.png';
       }

    if( ($err_s == 0) && ($num_rows == 0) )
    {
      $INSERT = "INSERT INTO basic (username,email,password,md5_pass,gender,birthday,profile_picture) VALUES ('$username', '$email','$password','$mb5_pass','$Gender','$birthday','$picture')";
      mysqli_query($conn,$INSERT);
      header('location: login_basic.php');

    }
    else 
    {
      header('location: Register_basic.php');
    }
   
}

?>