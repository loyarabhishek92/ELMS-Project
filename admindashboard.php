<!-- header start  -->
<?php 
if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['is_admin_login'])){
    $adminEmail=$_SESSION['adminLogEmail'];

}
else{
    echo "<script> location.href='../index.php';</script>";
}
?>








<?php
include('../admin/header.php');
?>
        <div class="col-sm-9 mt-5">
            <div class="row max-5 text-center">
                <div class="col-sm-4 mt-5">
                    <div class="card text-white bg-danger mb-3" style="max-width:18rem;">
                    <div class="card-header">Courses</div>
                    <div class="card-body">
                        <h4 class="card-title">5</h4>
                        <a href="course.php" class="btn text-white">View</a>
                    </div>
                </div>
                </div>
                <div class="col-sm-4 mt-5">
                    <div class="card text-white bg-success mb-3" style="max-width:18rem;">
                    <div class="card-header">Students</div>
                    <div class="card-body">
                        <h4 class="card-title">25</h4>
                        <a href="student.php" class="btn text-white">View</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mt-5">
                    <div class="card text-white bg-danger mb-3" style="max-width:18rem;">
                    <div class="card-header">Sold</div>
                    <div class="card-body">
                        <h4 class="card-title">5</h4>
                        <a href="" class="btn text-white">View</a>
                    </div>
                </div>
        </div>
    </div>
    <div class="mx-5 mt-5 text-center">
        <!-- Table  -->
        <p class="bg-dark text-white p-2">Course Ordered</p>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Order Id</th>
                    <th scope="col">Course Id</th>
                    <th scope="col">Student Email</th>
                    <th scope="col">Order Date</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">22</th>
                    <th scope="row">22</th>
                    <td>abhishekrajrauniyar9800808899@gmail.com</td>
                    <td>20/10/2023</td>
                    <td>2000</td>
                    <td><button type="submit" class="btn btn-secondary" name="Delete" value="Delete"><i class="fa-solid fa-trash"></i>
                </button></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


<?php 
include('../admin/footer.php');
 ?>


