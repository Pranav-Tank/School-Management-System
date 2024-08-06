<?php 
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "tempdb";

    $rollno = "";
    $maths = "";
    $science = "";
    $english = "";
    $social_science = "";

    error_reporting(E_ERROR | E_PARSE);

    $connect = mysqli_connect($host, $user, $password, $database);
    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }

    function getPosts()
    {
        $posts = array();
        $posts[0] = $_POST["rollno"];
        $posts[1] = $_POST["maths"];
        $posts[2] = $_POST["science"];
        $posts[3] = $_POST["english"];
        $posts[4] = $_POST["social_science"];
        return $posts;
    }

    if(isset($_POST['insert'])) {
        $data = getPosts();
        $rollno = mysqli_real_escape_string($connect, $data[0]);
        $maths = mysqli_real_escape_string($connect, $data[1]);
        $science = mysqli_real_escape_string($connect, $data[2]);
        $english = mysqli_real_escape_string($connect, $data[3]);
        $social_science = mysqli_real_escape_string($connect, $data[4]);
        
        $insert_Query = "INSERT INTO subject_marks (rollno, maths, science, english, social_science) VALUES ('$rollno', '$maths', '$science', '$english', '$social_science')";
        
        try {
            $insert_result = mysqli_query($connect, $insert_Query);
            if($insert_result) {
                echo '<h2><center>Data Inserted!!!</h2></center>';
            } else {
                echo '<h2><center>Data Not Inserted...</h2></center>';
            }
        } catch (Exception $ex) {
            echo '<h2><center>Error Inserting...</h2></center>' . $ex->getMessage();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Marks Entry</title>
     
</head>
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
        color: black;
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
<body>
<div class="containerd">
        <div class="title">School Management System</div>
        <div class="box">
          <button class="button" onclick="window.location.href='index.html'">Home</button><button class="button" onclick="window.location.href='adminlogin.html'">Logout</button>
    </div>
</div>
    
    <div class="container-box">
        <section>
            
            <div>
                <form action="" method="post">
                <h1 align="center">Student Marks Entry</h1>
                <center>
                    <label>Roll No:</label>
                    <input type="text" name="rollno" required value="<?php echo $rollno;?>" >
                    <br><br>
                    <label>Maths:</label>
                    <input type="text" name="maths" required value="<?php echo $maths;?>">
                    <br><br>
                    <label>Science:</label>
                    <input type="text" name="science" required value="<?php echo $science;?>">
                    <br><br>
                    <label>English:</label>
                    <input type="text" name="english" required value="<?php echo $english;?>">
                    <br><br>
                    <label>Social Science:</label>
                    <input type="text" name="social_science" required value="<?php echo $social_science;?>">
                    <br><br>
                </center>
                <center>
                    <div>
                        <input type="submit" name="insert" value="Add Marks">
                    </div>
                    <br>
                </center>
            </form>
        </section>
        </div>
    <br><br><br>
    <br><br><br>
    <br><br><br>
    <br><br><br>
</div>
</body>
</html>
