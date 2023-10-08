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

if(isset($_REQUEST['lessonSubmitBtn'])){
    // checking for empty field 
    if(($_REQUEST['lesson_name']==" ") || ($_REQUEST['lesson_desc']==" ") || ($_REQUEST['course_id']==" ") || 
    ($_REQUEST['course_name']==" ")){
        // msg displayed if required field missing 
        $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
    }
    else{
            //   assigning user values to variable 
        $lesson_name=$_REQUEST['lesson_name'];
        $lesson_desc=$_REQUEST['lesson_desc'];
        $course_id=$_REQUEST['course_id'];
        $course_name=$_REQUEST['course_name'];
        $lesson_link=$_FILES['lesson_link']['name'];
        $lesson_link_temp=$_FILES['lesson_link']['tmp_name'];
        $link_folder='../lessonvid/'.$lesson_link;
        move_uploaded_file($lesson_link_temp,$link_folder);

        $sql="INSERT INTO lesson (lesson_name, lesson_desc, lesson_link, course_id, course_name) VALUES 
        ('$lesson_name','$lesson_desc','$link_folder','$course_id','$course_name')";

        if($conn->query($sql) == TRUE){
            $msg='<div class="alert alert-success col-sm-6 ml-5 mt-2">lesson Added Successfully</div>';
        }
        else{
            $msg='<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Add lesson</div>';

        }
    }
}
?>
<!-- header end  -->

<div class="col-sm-6 mt-5  mx-3 jumbotron">
    <h3 class="text-center">Add New Lesson</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="course_id">course ID</label>
            <input type="text" class="form-control" id="course_id" name="course_id" 
            value="<?php if(isset($_SESSION['course_id'])){echo $_SESSION['course_id'];} ?>" readonly>
        </div><br>
        <div class="form-group">
            <label for="course_name">Course Name</label><br>
        <input type="text" class="form-control" id="course_name" rows="2"  name="course_name"
        value="<?php if(isset($_SESSION['course_name'])){echo $_SESSION['course_name'];} ?>" readonly>
        </div><br>
        <div class="form-group">
            <label for="lesson_name">Lesson Name</label>
            <input type="text" class="form-control" id="lesson_name" name="lesson_name">
        </div><br>
        <div class="form-group">
            <label for="lesson_desc">Lesson Description</label>
            <textarea class="form-control" id="lesson_desc" name="lesson_desc" row=2></textarea>
        </div><br>
        <div class="form-group">
            <label for="lesson_link">Lesson Video Link</label><br>
            <input type="file" class="form-control-file" id="lesson_link" name="lesson_link">
        </div><br>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="lessonSubmitBtn" name="lessonSubmitBtn">Submit</button>
            <a href="lesson.php" class="btn btn-secondary">Close</a>
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
