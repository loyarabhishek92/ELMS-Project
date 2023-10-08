<!-- start most popular course  -->
<div class="container mt-5">
  <h1 class="text-center">Popular Course</h1>
  <!-- start most popular course 1st card deck  -->
  <div class="row mt-4">
    <?php
    $sql="SELECT * FROM courses LIMIT 3";
    $result=$conn->query($sql);
    if($result->num_rows > 0){
      while($row=$result->fetch_assoc()){
        $course_id=$row['course_id'];
        echo '
        <div class="col-sm-4 mb-4">
        <a href="coursedetails.php?course_id='.$course_id.'" class="btn" style="text-align: left; padding:0px; margin:0px;">
        <div class="card">
          <img src="'. str_replace('..','.',$row['course_img']).'" class="card-img-top" alt="Course Image" />
             <div class="card-body">
                <h5 class="card-title">'.$row['course_name'].'</h5>
                <p class="card-text">'.$row['course_desc'].'</p>
             </div>
                  <div class="card-footer">
                      <a href="coursedetails.php?course_id='.$course_id.'" class="btn btn-primary 
                      text-white font-weight-bolder float-end">More</a>
                   </div>
         </div>
     </a>
     </div>';
      }
    }
    ?> 
  </div>
  <!-- end most popular course 1st card deck  -->


  <!-- start most popular course 2st card deck  -->
  <div class="row mt-4">
  <?php
    $sql="SELECT * FROM courses LIMIT 3,3";
    $result=$conn->query($sql);
    if($result->num_rows > 0){
      while($row=$result->fetch_assoc()){
        $course_id=$row['course_id'];
        echo '
        <div class="col-sm-4 mb-4">
        <a href="coursedetails.php?course_id='.$course_id.'" class="btn" style="text-align: left; padding:0px; margin:0px;">
        <div class="card">
          <img src="'. str_replace('..','.',$row['course_img']).'" class="card-img-top" alt="Course Image" />
             <div class="card-body">
                <h5 class="card-title">'.$row['course_name'].'</h5>
                <p class="card-text">'.$row['course_desc'].'</p>
             </div>
                  <div class="card-footer">
                      <a href="coursedetails.php?course_id='.$course_id.'" class="btn btn-primary text-white font-weight-bolder float-end">More</a>
                   </div>
         </div>
     </a>
     </div>';
      }
    }
    ?>
  </div>
    <!-- End most popular course 2st card deck  -->
      <div class="text-center m-2">
       <a href="courses.php" class="btn btn-danger btn-sm">View All Courses</a>
      </div>
</div>
<!-- end most popular course  -->