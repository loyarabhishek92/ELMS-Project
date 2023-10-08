<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Egyan</title>
    <!-- bootstrap css  -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

     <!-- custom css -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Font awesome css  -->
    <link rel="stylesheet" href="css/all.min.css">
</head>
<body>
    <!-- start navigation  -->
    <nav class="navbar navbar-expand-sm bg-body-tertiary  fixed-top">
    <div class="container-fluid">
    <a class="navbar-brand logo" href="index.php">E-Gyan</a>
    <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ">
        <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
        <li class="nav-item"><a href="#About_us" class="nav-link">About</a></li>
        <li class="nav-item"><a href="courses.php" class="nav-link">Courses</a></li>
        <?php
        session_start();
        if(isset($_SESSION['is_login'])){
          echo ' <li class="nav-item"><a href="student/studentprofile.php" class="nav-link">My profile</a></li>
          <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>';
        }
        else{
          echo '   <li class="nav-item"><a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#stuloginModalCenter">Login</a></li>
          <li class="nav-item"><a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#stuRegModalCenter">Signup</a></li>';
        }

        ?>

        <li class="nav-item"><a href="#" class="nav-link">Feedback</a></li>
        <li class="nav-item"><a href="#contact" class="nav-link">Contact</a></li>
        
      </ul>
    </div>
  </div>
</nav>
    <!-- end navigation  -->