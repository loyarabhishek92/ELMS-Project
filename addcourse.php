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

if(isset($_REQUEST['courseSubmitBtn'])){
    // checking for empty field 
    if(($_REQUEST['course_name'] == "") || ($_REQUEST['course_desc'] == "") || ($_REQUEST['course_author'] == "") || 
    ($_REQUEST['course_duration'] == "")){
        $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
    }
    else{

        $course_name = $_REQUEST['course_name'];
        $course_desc = $_REQUEST['course_desc'];
        $course_author = $_REQUEST['course_author'];
        $course_duration = $_REQUEST['course_duration'];
        $course_image = $_FILES['course_img']['name'];
        $course_image_temp = $_FILES['course_img']['tmp_name'];
        $img_folder = '../img/courseimg/'.$course_image;
        move_uploaded_file($course_image_temp, $img_folder);

        $sql = "INSERT INTO courses (course_name, course_desc, course_author, course_duration, course_img) VALUES 
        ('$course_name','$course_desc','$course_author', '$course_duration','$img_folder')";

        if($conn->query($sql) == TRUE){
            $msg='<div class="alert alert-success col-sm-6 ml-5 mt-2">Course Added Successfully</div>';
        }
        else{
            $msg='<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Add Course</div>';

        }
    }
}
?>
<!-- header end  -->

<div class="col-sm-6 mt-5  mx-3 jumbotron">
    <h3 class="text-center">Add New Course</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" id="course_name" name="course_name">
        </div><br>
        <div class="form-group">
            <label for="course_desc">Course Description</label><br>
        <textarea class="form-control" id="course_desc" row=2 name="course_desc"></textarea>
        </div><br>
        <div class="form-group">
            <label for="course_author">Author</label>
            <input type="text" class="form-control" id="course_author" name="course_author">
        </div><br>
        <div class="form-group">
            <label for="course_duration">Course Duration</label>
            <input type="text" class="form-control" id="course_duration" name="course_duration">
        </div><br>
        <div class="form-group">
            <label for="course_img">Course Image</label><br>
            <input type="file" class="form-control-file" id="course_img" name="course_img">
        </div><br>
        <div class="text-center">
            <button type="submit" class="btn btn-primary"  id="courseSubmitBtn" name="courseSubmitBtn">Submit</button>
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
