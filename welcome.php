<?php
    session_start();       
    include 'connection.php';                            
   
    if(!isset($_COOKIE['email_login']) && $_COOKIE['password_login'] != true){ 
        header('Location: login_html.php');
        exit();
    }else{
      $sql = "SELECT * FROM sing_up WHERE email = '".$_COOKIE['email_login']."'";
      $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0) { 
          $row = mysqli_fetch_assoc($result);
          $Name_signup = $row["Name"];
        }else{
          echo "user not found";
        }
    }
   

   
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current= "page" href="welcome.php">Welcome</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current= "page" href="logout.php">logout</a>
          </li>
        
        </ul>
        <form class="d-flex" role="search">
         <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      
      </div>
    </div>
  </nav>
    
    <?php
         echo '<div class="container my-4"><h1 class="text-center">welcome '. $Name_signup . '</h1></div>';

    ?>
   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>