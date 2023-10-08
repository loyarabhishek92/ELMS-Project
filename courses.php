<!-- start including navheader -->
<?php
include('./navheader.php');
include('./dbconnection.php');
?>
<!-- End including navheader -->




<!-- start course page banner  -->
<div class="container-fluid bg-dark">
    <div class="row">
    <img src="img/b.jpg" alt="courses" style="height:500px; width:100%; object-fit:cover; box-shadow:10px;">
    </div>
</div>
<!-- End course page banner  -->




<!-- start most popular course  -->
<div class="container mt-5">
  <h1 class="text-center">All Course</h1>
  <div class="row mt-4">  <!--start all course-->
    <?php
    $sql="SELECT * FROM courses";
    $result=$conn->query($sql);
    if($result->num_rows > 0){
      while($row=$result->fetch_assoc()){
        $course_id=$row['course_id'];
        echo '
        <div class="col-sm-4 mb-4">
        <a href="coursedetails.php?course_id='.$course_id.'" class="btn" 
        style="text-align: left; padding:0px;">
        <div class="card">
          <img src="'. str_replace('..','.',$row['course_img']).'" class="card-img-top" 
          alt="Course Image" />
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
  </div>  <!--end all course row-->
</div>
<!-- end most popular course  -->





<!-- start including footer -->
<?php 
include('./footer.php');
?>
<!-- end including footer -->