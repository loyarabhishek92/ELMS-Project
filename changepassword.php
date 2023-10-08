<!-- header start  -->
<?php 
if(!isset($_SESSION)){
    session_start();
}

include('../admin/header.php');
include('../dbconnection.php');


if(isset($_SESSION['is_admin_login'])){
    $adminEmail=$_SESSION['adminLogEmail'];

}
else{
    echo "<script> location.href='../index.php';</script>";
}

// header end 

$adminEmail=$_SESSION['adminLogEmail'];
if(isset($_REQUEST['adminPassUpdatebtn'])){
    if(($_REQUEST['adminpassword']=="")){
        // msg displayed if required field missing 
        $passwordmsg='<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
    }
    else{
        $sql="SELECT * FROM admin WHERE admin_email='$adminEmail'";
        $result=$conn->query($sql);
        if($result->num_rows==1){
            $adminpassword=$_REQUEST['adminpassword'];
            $sql="UPDATE admin SET admin_password='$adminpassword' WHERE admin_email='$adminEmail'";
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
                    <input type="email" class="form-control" id="inputEmail" value="<?php echo $adminEmail ?>" readonly>
                </div><br>
                <div class="form-group">
                    <label for="inputnewpassword">New Password</label><br>
                    <input type="text" class="form-control" id="inputnewpassword" placeholder="New Password" name="adminpassword">
                </div><br>
                <button type="submit" class="btn btn-danger mr-4 mt-4" name="adminPassUpdatebtn">Update</button>
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



<!-- footer start  -->
<?php
include('../admin/footer.php');
?>
<!-- footer end -->
