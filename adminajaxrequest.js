// ajax call for admin login verification 
function checkAdminLogin(){
    console.log("button clicked");
    var adminLogEmail=$("#adminLogemail").val();
    var adminLogPassword=$("#adminLogpassword").val();
    $.ajax({
        url:"admin/admin.php",
        method:"POST",
        data:{
            checkLogemail:"checklogmail",
            adminLogEmail:adminLogEmail,
            adminLogPassword:adminLogPassword,
        },
        success:function(data){
            if(data == 0){
                $("#statusadminLogMsg").html("<small class='alert alert-danger'>Invalid Email ID or Password !</small>");
            }
            else if(data == 1){
                // $("#statusadminLogMsg").html("<div class='spinner-border text-success' role='status'></div>");

                $("#statusadminLogMsg").html("<small class='alert alert-success'>success Loading...</small>");
                setTimeout(()=>{
                    window.location.href="admin/admindashboard.php";
                },1000);
            }
        },
    });
}