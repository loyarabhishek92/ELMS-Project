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
    $stu_id=$row['stu_id'];
    $stu_name=$row['stu_name'];
    $stu_occ=$row['stu_occ'];
    $stu_img=$row['stu_img'];
}

if(isset($_REQUEST['updateStuNameBtn'])){
    // checking for empty field 
    if(($_REQUEST['stu_name']==" ")){
        $passmsg='<div class="alert alert-warning col-sm-6 ml-5 mt-2 role="alert">Fill All Fields</div>';
    }
    else{

        $stu_name=$_REQUEST['stu_name'];
        $stu_occ=$_REQUEST['stu_occ'];
        $stu_img=$_FILES['stu_img']['name'];
        $stu_img_temp=$_FILES['stu_img']['tmp_name'];
        $img_folder='../img/stu/'.$stu_img;
        move_uploaded_file($stu_img_temp,$img_folder);
        

        $sql="UPDATE student SET stu_name= '$stu_name', stu_occ='$stu_occ', stu_img='$img_folder' WHERE 
        stu_email='$stu_email' ";
        if($conn->query($sql) == TRUE){
            $passmsg='<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully</div>';
        }
        else{
            $passmsg='<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Update</div>';

        }
    }
}
?>

<div class="col-sm-6 mt-5">
<h3 class="text-center">My Profile Details</h3>
    <form class="mx-5" method="POST" enctype="multipart/form-data">
    <div class="form-group">
            <label for="stu_id">Student ID</label>
            <input type="text" class="form-control" id="stu_id" name="stu_id" 
            value="<?php if(isset($row['stu_id'])) {echo $stu_id;} ?>" readonly>
        </div><br>
        <div class="form-group">
            <label for="stu_email">Email</label>
            <input type="email" class="form-control" id="stu_email" name="stu_email"
            value="<?php echo $stu_email ?>" readonly>
        </div><br>
        <div class="form-group">
            <label for="stu_name">Name</label>
            <input type="text" class="form-control" id="stu_name" name="stu_name" 
            value="<?php if(isset($row['stu_name'])) {echo $stu_name;} ?>">
        </div><br>
        <div class="form-group">
        <!-- student doesnt mean school student it also mean learning  -->

            <label for="stu_occ">Occuption</label><br>
            <input type="text" class="form-control" id="stu_occ" name="stu_occ" 
            value="<?php if(isset($row['stu_occ'])) {echo $stu_occ;} ?>">
        </div><br>
        <div class="form-group">
            <label for="stu_img">Upload Image</label><br>
            <input type="file" class="form-control-file" id="stu_img" name="stu_img">
        </div><br>
        <div class="text-center">
            <button type="submit" class="btn btn-primary" id="updateStuNameBtn" name="updateStuNameBtn">Update</button>
            <a href="studentprofile.php" class="btn btn-secondary">Close</a>
            </div>
        <?php if(isset($passmsg)){
           echo $passmsg;
        }  ?>
    </form>
    </div>

    </div> <!--close row div from header file--> 


    <?php
    include('./footer.php');
    ?>