

<?php  
if(!isset($_SESSION)){
    session_start();
}     
include_once('../dbconnection.php'); 
// End dbconnection 

// start checking email already registerrd 
if(isset($_POST['checkemail']) && isset($_POST['stuemail'])){
    $stuemail=$_POST['stuemail'];
    $sql="SELECT stu_email FROM student WHERE stu_email ='".$stuemail."'";
    $result=$conn->query($sql);
    $row=$result->num_rows;
    echo json_encode($row);
}
// End checking email already registerrd 



// start inserting student 
if(isset($_POST['stusignup']) && isset($_POST['stuname']) && isset($_POST['stunumber']) 
&& isset($_POST['stuemail']) && isset($_POST['stupassword'])){

    $stuname=$_POST['stuname'];
    $stunumber=$_POST['stunumber'];
    $stuemail=$_POST['stuemail'];
    $stupassword=$_POST['stupassword'];
// end inserting student 


// start sql 
    $sql="INSERT INTO student(stu_name, stu_number, stu_email, stu_password) VALUES 
    ('$stuname', '$stunumber', '$stuemail', '$stupassword')";
// end sql 

// start checking connection successful
   if($conn->query($sql) == TRUE){
    echo json_encode("Ok");
   }
   else{
    echo json_encode("Failed");
   } 
// end checking connection successful
}

// student login verification
if(!isset($_SESSION['is_login'])) {
  if(isset($_POST['checkLogemail']) && isset($_POST['stuLogEmail']) && isset($_POST['stuLogPassword'])){
    $stuLogEmail=$_POST['stuLogEmail'];
    $stuLogPassword=$_POST['stuLogPassword'];
    $sql="SELECT stu_email, stu_password FROM student WHERE stu_email='".$stuLogEmail."' AND stu_password='".$stuLogPassword."'";

    $result=$conn->query($sql);

    $row=$result->num_rows;

    if($row === 1){
        $_SESSION['is_login']=true;
        $_SESSION['stuLogEmail']=$stuLogEmail;
        echo json_encode($row);
    }
    else if($row === 0){
        echo json_encode($row);

    }
  }
}
?>