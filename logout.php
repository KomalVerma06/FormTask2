<?php
    
    include 'welcome.php';
   // echo "hello";
    session_unset();
    session_destroy();
    setcookie('username_login', $Email_login, time() - (86400 * 30));
    setcookie('email_login', $Email_login, time() - (86400 * 30));
    setcookie('password_login', $Password_login, time() - (86400 * 30));
    header("location: login_html.php");
    exit();
    
?>
