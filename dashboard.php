<?php
session_start();
$message=" ";

 $servername='localhost';
 $username='root';
 $password='';
 $dbname='wu';

//  create connection
$conn = new mysqli($servername,$username,$password,$dbname, 3336);

// Check connection
if($conn->connect_error){
    die("Connection failed: " .$conn->connect_error);
}else{
    $message ="Connection sucessfull.";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
<style>
    body {
        font-family: "Times New Roman";
        text-align: center;
        background: #f2f2f2;
        padding-top: 100px;
    }

    .container {
        width: 400px;
        padding: 35px;
        margin: auto;
        background: white;
        border-radius: 15px;
        box-shadow: 0 5px 18px #ccc;
        position: relative;
    }

    h1 {
        color: #333;
        margin: 10px;
    }

    h4 {
        color: #777;
        margin: 5px;
    }

    .button1 {
        display: block;
        width: 180px;
        margin: 15px auto;
        padding: 12px;
        background: #112aa7;
        color: white;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: 0.4s;
    }
    .button2 {
        display: block;
        width: 180px;
        margin: 15px auto;
        padding: 12px;
        background: #a00606;
        color: white;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: 0.4s;
    }

    .button1:hover {
        background: #110f0f;
        transform: translateY(-2px);
    }
    .button2:hover {
        background: #060607;
        transform: translateY(-2px);
    }

</style>
</head>
<body style="text-align: center;">
    
    <div class="container">
        <h4> <?php echo $message ;?> </h4>
        <h1>Welcome User <?php echo $_SESSION['studentname']; ?></h1>
        <button onclick="window.location.href='Science.php'"  class="button1">Science</button>
        <button onclick="window.location.href='Social_Science.php' " class="button2">Social Science</button>
    </div>
</body>
</html>

 
    
