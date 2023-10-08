$(document).ready(function(){

    //start ajax call from already exists email verification , kaam gara xaina,2
    $("#stuemail").on("keypress blur", function(){
        var stuemail = $("#stuemail").val();
        $.ajax({
            url: 'student/addstudent.php',
            method:'POST',
            data:{
                checkemail: "checkmail",
                stuemail: stuemail,
            },
            success: function(data){
                // console.log(data); 
                if(data!=0){
                    $("#statusMsg3") .html('<small style="color:red;"> Email Id Already Used !</small>');
                    $("#signup").attr("disabled", true);
                }
                else if(data==0 && reg.test(stuemail)){
                    $("#statusMsg3") .html('<small style="color:green;"> There You go!</small>');
                    $("#signup").attr("disabled", false);
                }
                else if(!reg.test(stuemail)){
                    $("#statusMsg3") .html('<small style="color:red;"> Please Enter Valid Email e.g.example@gmail.com</small>');
                    $("#signup").attr("disabled", false);
                }
                if(stuemail == ""){
                    $("#statusMsg3") .html('<small style="color:red;"> Please Enter Email !</small>');

                }
            },
        });
    });
});
    //end ajax call from already exists email verification   , kaam gara xaina,2






//start email format code
function addstu(){
    var reg= /^[A-Z0-9.%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;   
//End email format code

    // start yesla student ko data capture garaxa
    var stuname= $("#stuname").val();
    var stunumber= $("#stunumber").val();            
    var stuemail= $("#stuemail").val();
    var stupassword= $("#stupassword").val();
    // End yesla student ko data capture garaxa

// Start checking form fields on form submission 
   if(stuname.trim() == ""){
    $("#statusMsg1") .html('<small style="color:red;"> Please Enter Name !</small>');
    $("#stuname").focus();
    return false;
   }
   else if(stunumber.trim() == ""){
    $("#statusMsg2") .html('<small style="color:red;"> Please Enter Number !</small>');
    $("#stunumber").focus();
    return false;
   }
   else if(stuemail.trim() == ""){
    $("#statusMsg3") .html('<small style="color:red;"> Please Enter Email !</small>');
    $("#stuemail").focus();
    return false;
   }

      //    start checking email format  
   else if(stuemail.trim() !="" && !reg.test(stuemail)){
    $("#statusMsg3") .html('<small style="color:red;"> Please Enter Valid Email e.g.example@gmail.com</small>');
    $("#stuemail").focus();
    return false;
   }
   //    End checking email format 


   else if(stupassword.trim() == ""){
    $("#statusMsg4") .html('<small style="color:red;">  Please Enter Password !</small>');
    $("#stupassword").focus();
    return false;
   }  
   else{                           
   // End  checking form fields on form submission 


//start yesma request garaxa
   
    $.ajax({                                        
        url: 'student/addstudent.php',
        method:'POST',

        // kaam gara xaina ,1
         dataType:"json", 

        data:{
            stusignup:"stusignup", 
            stuname: stuname,
            stunumber: stunumber,
            stuemail: stuemail,
            stupassword: stupassword,
        },
        success: function (data) {
          console.log(data);
    
    // kaam gara xaina , 1
          if(data == "Ok") {
            $("#successMsg").html("<span class='alert alert-success'> Registration successful !</span>");
            clearStuRegField();
          }
          else if(data == "Failed"){
            $("#successMsg").html("<span class='alert alert-danger'> Unable to Register</span>");
    
          }
    
    
        }
       });
   }                    
}



//start Empty all data from form when press on submit button,        kaam gara xaina
function clearStuRegField(){
    $("#StuRegForm").trigger("reset");
    $("#statusMsg1").html(" ");
    $("#statusMsg2").html(" ");
    $("#statusMsg3").html(" ");
    $("#statusMsg4").html(" ");

}
//End Empty all form 




// ajax call for student login verification 
function CheckStuLogin(){
    var stuLogEmail=$("#stuLogemail").val();
    var stuLogPassword=$("#stuLogpassword").val();
    $.ajax({
        url:"student/addstudent.php",
        method:"POST",
        data:{
            checkLogemail:"checklogmail",
            stuLogEmail:stuLogEmail,
            stuLogPassword:stuLogPassword,
        },
        success:function(data){
            if(data == 0){
                $("#statusLogMsg").html("<small class='alert alert-danger'>Invalid Email ID or Password !</small>");
            }
            else if(data == 1){
                $("#statusLogMsg").html("<div class='spinner-border text-success' role='status'></div>");

                // $("#statusLogMsg").html("<small class='alert alert-success'>Login Successful !</small>");
                setTimeout(()=>{
                    window.location.href="index.php";
                },1000);
            }
        },
    });
}