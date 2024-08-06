<?php
    $loginid =$_POST["loginid"];
    $adminpassword =$_POST["adminpassword"];
   //database connection
   $con =new mysqli("localhost","root","","tempdb");
   if ($con->connect_error){
       die("Failed to connect : " ($con->connect_error));
   }else{
       $stmt = $con->prepare("select * from admin where loginid = ?");
       $stmt->bind_param("s",$loginid);
       $stmt->execute();
       $stmt_result = $stmt->get_result();
       if($stmt_result->num_rows > 0) {
           $data = $stmt_result->fetch_assoc();
           if($data['adminpassword'] === $adminpassword){
               echo "<h1><center>LOGIN SUCCESFUL!!!</center></h1>";
               header('Location:admin.html');
           } else{
               echo "<script>alert('INVALID PASSWORD...');</script>";
               header('Location:adminlogin.html');
           }
       }
       else{
            echo "<script>alert('INVALID LOGIN ID...');</script>";
            header('Location:adminlogin.html');
       }
   }
?>