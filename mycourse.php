<!-- header start  -->
<?php 
if(!isset($_SESSION)){
    session_start();
}

include_once('../dbconnection.php');
include('./header.php');
if(isset($_SESSION['is_login'])){
    $stu_email=$_SESSION['stuLogEmail'];

}
else{
    echo "<script> location.href='../index.php';</script>";
}
?>




<h1>welcome to student course page</h1>













<?php
    include('./footer.php');
    ?>