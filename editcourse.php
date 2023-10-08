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
    if(($_REQUEST['course_id']=="") || ($_REQUEST['course_name']==" ") || ($_REQUEST['course_desc']==" ") || ($_REQUEST['course_author']==" ") || 
    ($_REQUEST['course_duration']==" ")){
        // msg displayed if required field missing 
        $msg=' <div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fields </div> ';
    }
    else{
        // Assigning user values to variable 
        $cid=$_REQUEST['course_id'];
        $cname=$_REQUEST['course_name'];
        $cdesc=$_REQUEST['course_desc'];
        $cauthor=$_REQUEST['course_author'];
        $cduration=$_REQUEST['course_duration'];
        $cimg='../img/courseimg/'.$_FILES['course_img']['name'];

        $sql="UPDATE courses SET course_id= '$cid', course_name='$cname', course_desc='$cdesc', 
        course_author='$cauthor', course_duration='$cduration', course_img='$cimg' WHERE course_id='$cid' ";

        if($conn->query($sql)==TRUE){
            // below msg display on form submit success 
            $msg='<div class="alert alert-success col-sm-6 ml-5 mt-2">Course Update Successfully</div>';
        }
        else{
            $msg='<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Update Course</div>';
        }
    }
}

?>


<div class="col-sm-6 mt-5  mx-3 jumbotron">
    <h3 class="text-center">Update Course Details</h3>
<?php
if(isset($_REQUEST['view'])){
    $sql="SELECT * FROM courses WHERE course_id={$_REQUEST['id']}";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
}

?>



    <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
            <label for="course_id">Course ID</label>
            <input type="text" class="form-control" id="course_id" name="course_id" 
            value="<?php if(isset($row['course_id'])) {echo $row['course_id'];} ?>" readonly>
        </div><br>
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" id="course_name" name="course_name" 
            value="<?php if(isset($row['course_name'])) {echo $row['course_name'];} ?>">
        </div><br>
        <div class="form-group">
            <label for="course_desc">Course Description</label><br>
        <textarea class="form-control" id="course_desc" rows="2"  name="course_desc">
            <?php if(isset($row['course_desc'])) {echo $row['course_desc'];} ?></textarea>
        </div><br>
        <div class="form-group">
            <label for="course_author">Author</label>
            <input type="text" class="form-control" id="course_author" name="course_author"
            value="<?php if(isset($row['course_author'])) {echo $row['course_author'];} ?>">
        </div><br>
        <div class="form-group">
            <label for="course_duration">Course Duration</label>
            <input type="text" class="form-control" id="course_duration" name="course_duration"
            value="<?php if(isset($row['course_duration'])) {echo $row['course_duration'];} ?>">
        </div><br>
        <div class="form-group">
            <label for="course_img">Course Image</label>
            <img src="<?php if(isset($row['course_img'])) {echo $row['course_img'];} ?>" alt="" class="img-thumbnail">
            <input type="file" class="form-control-file" id="course_img" name="course_img">
        </div><br>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="requpdate" name="requpdate">Update</button>
            <a href="course.php" class="btn btn-secondary">Close</a>
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