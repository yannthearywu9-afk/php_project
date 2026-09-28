<!-- database connection -->
 <?php 
 $message=" ";
 $servername='localhost';
 $username='root';
 $password='';
 $dbname='wu';


$conn = new mysqli($servername,$username,$password,$dbname, 3336);

// Check connection
if($conn->connect_error){
    die("Connection failed: " .$conn->connect_error);
}else{
$message =" ";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
    *{
    box-sizing:border-box;
    }

    body{
        margin:0;
        height:100vh;
        display:flex;
        justify-content:center;
        align-items:center;
        font-family:time new romance;
        background: #e8fafa;
    }

    form{
        width:400px;
        padding:40px;
        background: white;
        border-radius:15px;
        box-shadow:0 5px 20px #bbb;
        height: 390px;

    }

    h1{
        text-align:center;
        color: #0b0e0e;
        margin-top:5px;
    }
    h4{
        color: #a29d9d;
        font-width: bold;
    }
    input{
        width:100%;
        padding:12px;
        margin:8px 0;
        border:1px solid #ccc;
        border-radius:7px;
    }

    button{
        width:100%;
        padding:12px;
        margin-top:50px;
        border:0;
        border-radius:7px;
        background: linear-gradient(135deg, #1d1ab3, #120a6b);
        color:white;
        font-weight:bold;
        cursor:pointer;
        transition: 0.4s;
    }

    button:hover{
        transform: translateY(-2px);
        background: #0e1010;
    }
</style>
</head>
<body>
    <form method="POST" action="">
          <h4> <?php echo $message ;?> </h4>
        <input type="text" name="stuname" placeholder=" Student name"><br>
        <input type="password" name="pss" placeholder="Password"><br>
        <button type="submit">Create Account</button>
    </form>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $studentname = $_POST['stuname'];
    $pss = $_POST['pss'];

    $sql ="insert into tbstudent(student_name,password)values('$studentname','$pss')";
    if($conn->query($sql)==True){
        echo"New record created sucessfully";
        
        header("Location:login.php");
        exit();
    }else{
        echo"Error: " .$conn->error;
    }

}




?>

</body>
</html>