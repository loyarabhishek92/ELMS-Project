<!-- header start  -->
<?php 
if(!isset($_SESSION)){
    session_start();
}

include('../admin/header.php');
include_once('../dbconnection.php');

if(isset($_SESSION['is_admin_login'])){
    $adminEmail=$_SESSION['adminLogEmail'];

}
else{
    echo "<script> location.href='../index.php';</script>";
}
?>


<!-- header end  -->


<div class="col-sm-9 mt-5">
    <!-- table  -->
    <p class="bg-dark text-white p-2">List of Courses</p>
    <?php
      $sql="SELECT * FROM courses";
      $result=$conn->query($sql);
      if($result->num_rows > 0){

    echo '<table class="table">
        <thead>
            <tr>
                <th scope="col">Course ID</th>
                <th scope="col">Name</th>
                <th scope="col">Author</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>';
            while($row=$result->fetch_assoc()){
            echo '<tr>';
            echo '<th scope="row">'.$row['course_id'].'</th>';
            echo '<td>'.$row['course_name'].'</td>';
            echo '<td>'.$row['course_author'].'</td>';
            echo '<td>
            <form action="editcourse.php" method="POST" class="d-inline">
            <input type="hidden" name="id" value='.$row["course_id"].'>
            <button type="submit" class="btn btn-info mr-3" name="view" value="view"><i class="fa-solid fa-pen"></i></button>
            </form>

            <form action=" " method="POST" class="d-inline"> 
            <input type="hidden" name="id" value='.$row["course_id"].'>
            <button type="submit" class="btn btn-secondary" name="delete" value="delete"><i class="fa-solid fa-trash"></i>
            </button>
            </form>
            </td>
            </tr>';
            }
            
        echo '</tbody>
        </table>';
     }
    else{
        echo "0 Result";
    }

    if(isset($_REQUEST['delete'])){
        $sql="DELETE FROM courses WHERE course_id={$_REQUEST['id']}";
        if($conn->query($sql) == TRUE){
            echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
        }
        else{
            echo "Unable to Delete Data";
        }
    }
    ?>
</div>
<!-- </div> -->
<!-- div row close from header  -->
<div>
    <a href="./addcourse.php" class="btn btn-danger box"><i class="fa-solid fa-plus"></i></a>
</div>


<!-- div container-fluid close from header  -->




<!-- footer start  -->
<?php
include('../admin/footer.php');
?>
<!-- footer end -->
