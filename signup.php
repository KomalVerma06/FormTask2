<?php
    include 'connection.php';
    if($_SERVER['REQUEST_METHOD']=='POST'){
    $name = $_POST['name'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $email = $_POST['email'];
    $hashedpassword = password_hash($password, PASSWORD_BCRYPT);
    

    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || $password != $confirm_password) {

        echo"Invalid email format or password does not match";
    }
    else{
        $sql = "INSERT INTO `sing_up` (`name`, `email` ,`password`) VALUES ('$name', '$email' ,'$hashedpassword')";
        $result = mysqli_query($conn, $sql);
        if(!$result){
            die('insertion failed');//. mysqli_error($conn));
        }
        else{
            //echo "insertion successful";
            header("Location: login_html.php");
            exit();
        }
    }
}


?>