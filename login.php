<?php 
session_start();
$message="";

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
     $message = "Connected!"; 
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
    text-align: center;
}
form{
    width:400px;
    padding:40px;
    background: white;
    border-radius:15px;
    box-shadow:0 5px 20px #bbb;
    height: 390px;

}
h4{
    color: #7e7b7b;
    font-width: bolder;
}

h1{
    text-align:center;
    color: #0b0e0e;
    margin-top:5px;
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
        <h1>User login </h1>
        <input type="text" name="stuname" placeholder=" Student name"><br>
        <input type="password" name="pss" placeholder="Password"><br>
        <button type="submit">Login</button>
    </form>
<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $studentname = $_POST['stuname'];
    $pss= $_POST['pss'];

    $sql = " select * from tbstudent ";

    $result = $conn->query($sql);
    if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            if($row['student_name'] == $studentname && $row['password'] == $pss){

                    $_SESSION['studentname'] = $studentname;

                    header("Location:dashboard.php");
                    exit;
            }
        }
        echo"Invalid student name or password.";
    }else{
        echo"No student found!";
    }
}
?>
</body>
</html>