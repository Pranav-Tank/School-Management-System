<?php 
$host = "localhost";
$user = "root";
$password = "";
$database = "tempdb";

$studentname = "";
$rollno = "";
$studentemail = "";
$phonenumber = "";
$percentage = "";
$password = "";

error_reporting(E_ERROR | E_PARSE);

try {
    $connect = mysqli_connect($host, $user, $password, $database);
} catch (Exception $ex) {
    echo "Error";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP INSERT UPDATE DELETE SEARCH</title>
    
    <style>
    body {
        background-image: url("https://d3bat55ebwjhsf.cloudfront.net/expert-article/user_sharmana/FutureTN.jpg");
        background-size: cover;/* Adjust the size as needed */
        background-repeat: no-repeat;
        font-family: cursive, Open Sans, Arial, sans-serif;
        padding-top: 50px;
        backdrop-filter: blur(15px);
        margin: 0;
    }
    
    
    #main {
        font-size: 30px;
    }
    
    .adminconnectcontainer {
        line-height: 20px;
    }
    
    .admincontainer {
        margin-left: auto;
        margin-right: auto;
        margin-top: 5%;
        margin-bottom: 10%;
    }
    
    .indexcontainer {
        line-height: 10px;
        margin-left: 40%;
        margin-right: auto;
        margin-top: 10%;
        margin-bottom: 15%;
    }
    
    .adminlogincontainer {
        line-height: 25px;
        max-width: 300px;
        margin-left: 10%;
        margin-right: auto;
        margin-top: 10%;
        margin-bottom: 15%;
    }
    
    .studentlogincontainer {
        line-height: 25px;
        max-width: 300px;
        margin-left: 37%;
        margin-right: auto;
        margin-top: 10%;
        margin-bottom: 15%;
    }
    
    .logincontainer {
        max-width: 300px;
        margin-left: auto;
        margin-right: auto;
    }
    
    h1 {
        padding: 10px;
        margin: auto;
        color: deeppink;
    }
    
    h2 {
        font-weight: 20px;
        font-size: 10px;
    }
    
    h3 {
        font-size: 10px;
        padding: 10px;
    }
    
    h4 {
        color: #292626;
        font-size: 16px;
        align: "center";
    }
    
    .buttons {
        font-size: 20px;
        background-color: rgb(218, 221, 223);
        color: black;
    }
    
    .btn.btn-primary {
        font-size: 200px;
    }
    
    .image {
        position: absolute;
        top: 22vh;
        left: 20vw;
        z-index: -1;
        opacity: 1;
        height: 87%;
    }
    
    .nav-link {
        line-height: 20px;
        color: #2a444d;
        font-size: 22px;
        text-decoration: none;
        align-items: center;
    }
    
   
    legend {
        text-decoration: underline;
        font-size: 20px;
        text-align: center;
        font-style: oblique;
        color: rgb(0, 0, 0);
        
    }
    
    label {
        text-align: left;
        font-size: 15px;
        color: rgb(0, 0, 0);
    }
    
    .btn:hover {
        color: red;
    }
    
    .contact-link {
        color: rgb(47, 62, 70);
    }
    
    .contact-link:hover {
        color: rgb(164, 165, 165);
    }
    
    .footer-link {
        color: rgb(47, 62, 70);
    }
    
    .footer-link:hover {
        color: rgb(172, 170, 170);
    }
    
    .footer-text {
        text-align: center;
    }
    
    .admin-connect {
        margin: 100px;
    }
    
    p {
        padding: 10px;
        text-align: left;
        font-size: 1rem;
        line-height: 0.5;
    }
    
    .section-header {
        font-size: 10px;
    }
    
    .title {
        font-size: 34px;
        font-weight: bold;
        margin-right: 900px;
        color: black;
    }
    
    .containerd {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
    }
    
    .box {
        display: flex;
        align-items: center;
        
    }
    
    .button {
        background-color: black;
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        font-size: 16px;
        border-radius: 12px;
        cursor: pointer;
        margin-left: 10px;
    }
    
    .button:hover {
        background-color: blue;
    }
    .container-box {
                border: 1px solid #000;
                padding: 3px;
                width: 25%;
                margin: 50px auto; 
                background-color: #f5f5dc; 
            }
            
            .box {
    display: flex;
    justify-content: center; /* Align the button in the center horizontally */
}
    </style>
</head>
<body>
<div class="containerd">
        <div class="title">School Management System</div>
        <div class="box">
          <button class="button" onclick="window.location.href='index.html'">Home</button><button class="button" onclick="window.location.href='adminlogin.html'">Logout</button>
    </div>
</div>

<br><br>
<br><br>
<br><br>
<div class=container-box>
    <ins><h2 align="center"><legend>Student Information</legend></h2></ins>
    <section class="adminconnect">
        <div class="adminconnectcontainer">
            <form action=" " method="post">
                <center>
                    
                    <label>Student Roll No:</label>
                    <input type="text" name="rollno" required value="<?php echo $rollno;?>" >
                    <br><br>
                    
                </center>
                <center>
                    <div>
                        <input class="buttons" type="submit" name="delete" value="Delete Student">
                    </div>
                </center>
            </form>
        </div>
    </section>

    <?php
        if(isset($_POST['delete'])) {
            $data = $_POST["rollno"];
            $delete_Query = "DELETE FROM students WHERE rollno = '$data'";
            try {
                $delete_result = mysqli_query($connect, $delete_Query);
                if($delete_result) {
                    if(mysqli_affected_rows($connect) > 0) {
                        echo '<h2><center>Data Deleted!!!</h2></center>';
                    } else {
                        echo '<h2><center>Data Not deleted...</h2></center>';
                    }
                }
            } catch (Exception $ex) {
                echo '<h2><center>Error Deleted...</h2></center>' . $ex->getMessage();
            }
        }
    ?>
</div>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>

<footer>
          <p class="footer-text">
            Copyright &copy; 2023. Designed By:
            <a href="#" class="footer-link">SCHOOL MANAGEMENT SYSTEM</a>
          </p>
        </footer>
   
</body>
</html>