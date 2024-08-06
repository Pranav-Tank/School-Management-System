<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "tempdb";

    // Establish database connection
    $connect = mysqli_connect($host, $user, $password, $database);
    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Fetch roll number from cookie
    $rollno = $_COOKIE['rollno'];
    // $rollno = "21bce296";

    // Query to fetch student result
    $query = "SELECT * FROM subject_marks WHERE rollno='$rollno'";
    $result = mysqli_query($connect, $query);

    // Check if query executed successfully
    if ($result) {
        // Fetch student details
        $row = mysqli_fetch_assoc($result);
        $maths = $row['maths'];
        $science = $row['science'];
        $english = $row['english'];
        $social_science = $row['social_science'];

        // Calculate percentage
        $total_marks = $maths + $science + $english + $social_science;
        $percentage = ($total_marks / 400) * 100;
    } else {
        echo "Error fetching student result: " . mysqli_error($connect);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Result</title><style>
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
         table {
            width: 50%;
            margin: 0 auto;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
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
    
    <div class="container-box">
    <h1 align="center">Student Result</h1>
    <h2 align="center">Roll No: <?php echo $rollno; ?></h2>

    <table>
        <tr>
            <th>Subject</th>
            <th>Obtained Marks</th>
            <th>Total Marks</th>
        </tr>
        <tr>
            <td>Maths</td>
            <td><?php echo $maths; ?></td>
            <td>100</td>
        </tr>
        <tr>
            <td>Science</td>
            <td><?php echo $science; ?></td>
            <td>100</td>
        </tr>
        <tr>
            <td>English</td>
            <td><?php echo $english; ?></td>
            <td>100</td>
        </tr>
        <tr>
            <td>Social Science</td>
            <td><?php echo $social_science; ?></td>
            <td>100</td>
        </tr>
        <tr>
            <th>Total Obtained Marks</th>
            <th><?php echo $total_marks; ?></th>
            <th>400</th>
        </tr>
        <tr>
            <th>Percentage</th>
            <th colspan="2"><?php echo $percentage; ?>%</th>
            
        </tr>
    </table>
    </div>
    <br><br><br>
    <br><br><br>
    <br><br><br>
    <br><br><br>
</body>
</html>
