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
// header end 

$stu_email=$_SESSION['stuLogEmail'];
if(isset($_REQUEST['stuPassUpdatebtn'])){
    if(($_REQUEST['stu_password']=="")){
        // msg displayed if required field missing 
        $passwordmsg='<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
    }
    else{
        $sql="SELECT * FROM student WHERE stu_email='$stu_email'";
        $result=$conn->query($sql);
        if($result->num_rows==1){
            $stu_password=$_REQUEST['stu_password'];
            $sql="UPDATE student SET stu_password='$stu_password' WHERE stu_email='$stu_email'";
            if($conn->query($sql)==TRUE){
                // below msg display on form submit success 
                $passwordmsg='<div class="alert alert-success col-sm-6 ml-5 mt-2">Updated Successfully</div>';
            }
            else{
                // below msg display on form submit failed 
                $passwordmsg='<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Update</div>';
            }
        }
    }
}
    



?>

<div class="col-sm-9 mt-5">
    <div class="row">
        <div class="col-sm-6">
            <form class="mt-5 mx-5">
                <div class="form-group">
                    <label for="inputEmail">Email</label><br>
                    <input type="email" class="form-control" id="inputEmail" value="<?php echo $stu_email ?>" readonly>
                </div><br>
                <div class="form-group">
                    <label for="inputnewpassword">New Password</label><br>
                    <input type="text" class="form-control" id="inputnewpassword" placeholder="New Password" name="stu_password">
                </div><br>
                <button type="submit" class="btn btn-danger mr-4 mt-4" name="stuPassUpdatebtn">Update</button>
                <button type="reset" class="btn btn-secondary mt-4">Reset</button>
                <?php 
                if(isset($passwordmsg)){
                    echo $passwordmsg;
                }
                ?>
            </form>
        </div>
    </div>
</div>







 <!-- Jquery and bootstrap javascript  -->
 <script src="../js/jquery.min.js"></script>
<script src="../js/pooper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

<!-- Font awesome javascript  -->
<script src="../js/all.min.js"></script>

<!-- <!-- student ajax call javascript  -->
<!-- <script type="text/javascript" src="js/stuajaxrequest.js"></script> -->

<!-- admin ajax call javascript  -->
<!-- <script type="text/javascript" src="js/adminajaxrequest.js"></script> --> 

<!-- custom javascript  -->
<script type="text/javascript" src="../js/custom.js"></script>
</body>
</html>