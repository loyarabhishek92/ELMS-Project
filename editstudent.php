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

// update 
if(isset($_REQUEST['requpdate'])){
    // chicking for empty fields 
    if(($_REQUEST['stu_id']=="") || ($_REQUEST['stu_name']==" ") || ($_REQUEST['stu_number']==" ") || ($_REQUEST['stu_email']==" ") || 
    ($_REQUEST['stu_password']==" ") || ($_REQUEST['stu_occ']==" ")){
        // msg displayed if required field missing 
        $msg=' <div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fields </div> ';
    }
    else{
        // Assigning user values to variable 
        $sid=$_REQUEST['stu_id'];
        $sname=$_REQUEST['stu_name'];
        $snumber=$_REQUEST['stu_number'];
        $semail=$_REQUEST['stu_email'];
        $spassword=$_REQUEST['stu_password'];
        $socc=$_REQUEST['stu_occ'];
      

        $sql="UPDATE student SET stu_id= '$sid', stu_name='$sname', stu_number='$snumber', 
        stu_email='$semail', stu_password='$spassword', stu_occ='$socc' WHERE stu_id='$sid' ";

        if($conn->query($sql)==TRUE){
            // below msg display on form submit success 
            $msg='<div class="alert alert-success col-sm-6 ml-5 mt-2">Update Successfully</div>';
        }
        else{
            $msg='<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Update </div>';
        }
    }
}

?>



    
<?php
if(isset($_REQUEST['view'])){
    $sql="SELECT * FROM student WHERE stu_id={$_REQUEST['id']}";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
}

?>

<div class="col-sm-6 mt-5  mx-3 jumbotron">
<h3 class="text-center">Update student Details</h3>
    <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
            <label for="stu_id">Student ID</label>
            <input type="text" class="form-control" id="stu_id" name="stu_id" 
            value="<?php if(isset($row['stu_id'])) {echo $row['stu_id'];} ?>" readonly>
        </div><br>
        <div class="form-group">
            <label for="stu_name"> Name</label>
            <input type="text" class="form-control" id="stu_name" name="stu_name" 
            value="<?php if(isset($row['stu_name'])) {echo $row['stu_name'];} ?>">
        </div><br>
        <div class="form-group">
            <label for="stu_number">Number</label>
            <input type="number" class="form-control" id="stu_number" name="stu_number" 
            value="<?php if(isset($row['stu_number'])) {echo $row['stu_number'];} ?>">
        </div><br>
        <div class="form-group">
            <label for="stu_email">Email</label><br>
            <input type="text" class="form-control" id="stu_email" name="stu_email" 
            value="<?php if(isset($row['stu_email'])) {echo $row['stu_email'];} ?>">
        </div><br>
        <div class="form-group">
            <label for="stu_password">Password</label><br>
            <input type="text" class="form-control" id="stu_password" name="stu_password" 
            value="<?php if(isset($row['stu_password'])) {echo $row['stu_password'];} ?>">
        </div><br>
        <div class="form-group">
            <label for="stu_occ">Occuption</label><br>
            <input type="text" class="form-control" id="stu_occ" name="stu_occ" 
            value="<?php if(isset($row['stu_occ'])) {echo $row['stu_occ'];} ?>">
        </div><br>
        
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="requpdate" name="requpdate">Update</button>
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