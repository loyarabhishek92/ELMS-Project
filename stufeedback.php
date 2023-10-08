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

$sql="SELECT * FROM student WHERE stu_email='$stu_email'";
$result=$conn->query($sql);
if($result->num_rows==1){
    $row=$result->fetch_assoc();
    $stu_id=$row["stu_id"];
}

if(isset($_REQUEST['submitFeedbackBtn'])){
    if(($_REQUEST['f_content']=="")){
        // msg displayed if required field missing 
        $passmsg='<div class="alert alert-warning col-sm-6 ml-5 mt-2 role="alert">Fill All Fields</div>';
    }
    else{
        $f_content=$_REQUEST["f_content"];
        $sql="INSERT INTO feedback (f_content, stu_id) VALUES ('$f_content','$stu_id')";
        if($conn->query($sql)==TRUE){
            $passmsg='<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Submited Successfully</div>';
        }
        else{
            $passmsg='<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Submit</div>';

        } 
    }
}
?>

<div class="col-sm-6 mt-5">
<!-- <h3 class="text-center">My Profile Details</h3>  -->
    <form class="mx-5" method="POST" entype="multipart/form-data">
    <div class="form-group">
            <label for="stu_id">Student ID</label>
            <input type="text" class="form-control" id="stu_id" name="stu_id" 
            value="<?php if(isset($row['stu_id'])) {echo $stu_id;} ?>" readonly>
        </div><br>
        <div class="form-group">
            <label for="f_content">Write Feedback</label>
            <textarea class="form-control" id="f_content" name="f_content" row=2></textarea>
        </div><br>
        <!-- <div class="text-center"> -->
            <button type="submit" class="btn btn-primary" id="submitFeedbackBtn" name="submitFeedbackBtn">Submit</button>
            <a href="stufeedback.php" class="btn btn-secondary">Reset</a>
        <!-- </div> -->
        <?php if(isset($passmsg)){
           echo $passmsg;
        }  ?>
    </form>
    </div>














<?php
    include('./footer.php');
    ?>