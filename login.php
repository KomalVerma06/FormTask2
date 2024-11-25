<?php
    session_start();
    include 'connection.php';
    //$_SESSION['loggedIn'] == false;
   
    //fetching data from login form
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $Email_login = $_POST['email_login'];
        $Password_login = $_POST['password_login'];
       
       //retrieving data from database
        $sql = "SELECT `Name` , `Email` , `Password` FROM sing_up WHERE `Email` = '$Email_login'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) { 
          $row = mysqli_fetch_assoc($result);
          $Name_signup = $row["Name"];
          $Email_signup = $row["Email"];
          $password_signup = $row["Password"];
        }
        else {
          echo "Email does not exist";
          //exit();
        }    
      }

     
                //verifying password
                $verify = password_verify($Password_login , $password_signup);
                if($verify){
                  //echo "<div class ='container my-3'><h1 class='text-center'>welcome ". $Name_signup ."</h1></div>"; 
                  if(isset($_POST['remember_me'])){
                    setcookie('username_login', $Email_login, time() + (86400 * 30));
                    setcookie('email_login', $Email_login, time() + (86400 * 30));
                    setcookie('password_login', $Password_login, time() + (86400 * 30));
                    $_SESSION['loggedIn'] = true;
                    $_SESSION['Username'] = $Name_signup;
                    header("location: welcome.php");
                    exit();
                  
                  }
                  else{
                    //setcookie('email_login', $Email_login, time() - (86400 * 30));
                    //setcookie('password_login', $Password_login, time() - (86400 * 30));
                    $_SESSION['loggedIn'] = true;
                    $_SESSION['Username'] = $Name_signup;
                    header("location: welcome.php");
                    exit();
                  
                  }
                  
                }
              
      
    
   /* else if(isset($_COOKIE['email_login']) && isset($_COOKIE['password_login'])) {
      $_SESSION['loggedIn'] = true;
      $_SESSION['Username'] = $Name_signup;
      header("location: welcome.php");
      exit();
    }
    else{
      echo "something is wrong". mysqli_error($con);
    }
    /*else if(isset($_COOKIE['email_login']) && isset($_COOKIE['password_login'])){
      $_SESSION['loggedIn'] = true;
      $_SESSION['Username'] = $Name_signup;
      header("location: welcome.php");
      exit();
    }else{
    $_SESSION['loggedIn'] = false;
    }*/
   
?>

    
