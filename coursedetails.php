<!-- start including navheader -->
<?php
include('./navheader.php');
include('./dbconnection.php');
?>
<!-- End including navheader -->


<!-- start course page banner  -->
<div class="container-fluid bg-dark">
    <div class="row">
        <img src="./img/books.jpg" alt="courses" 
        style="height:500px; width:100%; object-fit:cover; box-shadow:10px;"/>
    </div>
</div>
<!-- end course page banner  -->

<!-- start main content  -->
<div class="container mt-5">
    <?php
    if(isset($_GET['course_id'])){
        $course_id=$_GET['course_id'];
        $sql="SELECT * FROM courses WHERE course_id='$course_id'";
        $result=$conn->query($sql);
        $row=$result->fetch_assoc();
    }
    ?>
    <div class="row">
        <div class="col-md-4">
            <img src="<?php echo str_replace('..','.',$row['course_img']) ?>" alt="Course Image" class="card-img-top" />
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">Course Name: <?php echo $row['course_name'] ?></h5>
                <p class="card-text">Description: <?php echo $row['course_desc'] ?></p>
                <p class="card-text">Duration: <?php echo $row['course_duration'] ?></p>
                <form action="" method="POST">
                    <button type="submit" class="btn btn-primary text-white 
                    font-weight-bolder float-end" name="buy">Download</button>
                </form>
            </div>
        </div>
    </div><br>

    <div class="container">
        <div class="row">
        <table class="table table-bordered table-hover">
                <thead>
                   <tr>
                      <th scope="col">Lesson No.</th>
                      <th scope="col">Lesson Name</th>
                    </tr>
                </thead>
                <tbody>
            <?php
            $sql="SELECT * FROM lesson";
            $result=$conn->query($sql);
            if($result->num_rows > 0){
                $num=0;
                while($row=$result->fetch_assoc()){
                    if($course_id == $row['course_id']){
                        $num++;
                   echo  '<tr>
                    <th scope="row">'.$num.'</th>
                    <td>'.$row['lesson_name'].'</td>
                </tr>';
            }
                }
            }
            ?>
            
                
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- end main content  -->















<!-- start including footer -->
<?php 
include('./footer.php');
?>
<!-- end including footer -->