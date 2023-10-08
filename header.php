<!-- header start  -->
<?php 
include_once('../dbconnection.php');
if(!isset($_SESSION)){
    session_start();
}
if(isset($_SESSION['is_login'])){
    $stuLogEmail=$_SESSION['stuLogEmail'];

}
// else{
//     echo "<script> location.href='../index.php';</script>";
// }
if(isset($stuLogEmail)){
    $sql="SELECT stu_img FROM student WHERE stu_email='$stuLogEmail'";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    $stu_img=$row['stu_img'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootstrap css  -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

     <!-- custom css -->
    <link rel="stylesheet" href="../css/stustyle.css">

    <!-- Font awesome css  -->
    <link rel="stylesheet" href="../css/all.min.css">
</head>
<body>
    <!-- top navbar  -->
    <nav class="navbar navbar-dark fixed-top flex-md-nowrap p-0 shadow" style="background-color:#225470;">
         <a href="studentprofile.php" class="navbar-brand col-sm-3 col-md-2 mr-0">E-learning</a>
    </nav>
    

    <!-- side bar  -->
    <div class="container-fluid mb-5" style="margin-top:40px;">
        <div class="row">
            <nav class="col-sm-2 bg-light sidebar py-5 d-print-none">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item mb-3">
                            <img src="<?php echo $stu_img; ?>" alt="studentimage" 
                            class="img-thumbnail rounded-circle">
                        </li>
                        <li class="nav-item">
                            <a href="studentprofile.php" class="nav-link">
                            <i class="fa-solid fa-user"></i> Profile <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="mycourse.php" class="nav-link"><i class="fa-brands fa-accessible-icon"></i>
                        My Courses</a>
                        </li>
                        <li class="nav-item">
                            <a href="stufeedback.php" class="nav-link"><i class="fa-brands fa-accessible-icon"></i>
                        Feedback</a>
                        </li>
                        <li class="nav-item">
                            <a href="studentchangepassword.php" class="nav-link"><i class="fa-solid fa-key"></i>
                        Change Password</a>
                        </li>
                        <li class="nav-item">
                            <a href="../logout.php" class="nav-link"><i class="fa-solid fa-right-from-bracket"></i>
                        Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
        <!-- </div>
    </div> -->



















   