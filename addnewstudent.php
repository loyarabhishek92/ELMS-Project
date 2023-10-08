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

if(isset($_REQUEST['newStuSubmitBtn'])){
    // checking for empty field 
    if(($_REQUEST['stu_name']=="") || ($_REQUEST['stu_number']=="") || ($_REQUEST['stu_email']=="") || 
    ($_REQUEST['stu_password']=="") || ($_REQUEST['stu_occ']=="")){
        $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
    }
    else{

        $stu_name=$_REQUEST['stu_name'];
        $stu_number=$_REQUEST['stu_number'];
        $stu_email=$_REQUEST['stu_email'];
        $stu_password=$_REQUEST['stu_password'];
        $stu_occ=$_REQUEST['stu_occ'];
        

        $sql="INSERT INTO student (stu_name, stu_number, stu_email, stu_password,stu_occ) VALUES 
        ('$stu_name','$stu_number','$stu_email','$stu_password','$stu_occ')";

        if($conn->query($sql) == TRUE){
            $msg='<div class="alert alert-success col-sm-6 ml-5 mt-2"> Added Successfully</div>';
        }
        else{
            $msg='<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Add student</div>';

        }
    }
}
?>
<!-- header end  -->

<div class="col-sm-6 mt-5  mx-3 jumbotron" style="background-color:#F2F5F5;">
    <h3 class="text-center">Add New Student</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="stu_name">Name</label>
            <input type="text" class="form-control" id="stu_name" name="stu_name">
        </div><br>
        <div class="form-group">
            <label for="stu_number">Number</label>
            <input type="number" class="form-control" id="stu_number" name="stu_number">
        </div><br>
        <div class="form-group">
            <label for="stu_email">Email</label><br>
            <input type="text" class="form-control" id="stu_email" name="stu_email">
        </div><br>
        <div class="form-group">
            <label for="stu_password">Password</label>
            <input type="password" class="form-control" id="stu_password" name="stu_password">
        </div><br>
        <div class="form-group">
            <label for="stu_occ">Occupation</label>
            <input type="text" class="form-control" id="stu_occ" name="stu_occ">
        </div><br>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="newStuSubmitBtn" name="newStuSubmitBtn">Submit</button>
            <a href="student.php" class="btn btn-secondary">Close</a>
        </div>
        <?php if(isset($msg)){
           echo $msg;
        }  ?>
    </form>
</div>

</div>  <!--div Row close from header--> 
</div>   <!--div container-fluid close from header--> 


<!-- footer start  -->
<?php
include('../admin/footer.php');
?>
<!-- footer end -->
