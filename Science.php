<?php 

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

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bacll Grade Calculation</title>
<style>
    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        padding: 40px 20px;
        font-family: Arial, sans-serif;
        background: linear-gradient(135deg, #e0f7fa, #f5f7fa);
        color: #333;
    }

   
    .container {
        width: 450px;
        max-width: 100%;
        margin: 0 auto;
        padding: 30px;
        background: white;
        border-radius: 18px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        position: relative;

    }
    h1 {
        text-align: center;
        color: #1d069e;
        margin-bottom: 25px;
        font-size: 30px;
    }
    input {
        width: 100%;
        padding: 12px 14px;
        margin: 8px 0;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 15px;
        outline: none;
        transition: 0.3s;
    }
    input:focus {
        border-color: #1fbfc0;
        box-shadow: 0 0 5px rgba(31, 208, 208, 0.4);
    }
    
    input::placeholder {
        color: #999;
    }
    button {
        width: 100%;
        margin-top: 15px;
        padding: 12px;
        border: none;
        border-radius: 8px;
        background: linear-gradient(135deg, #1fd0d0, #038585);
        color: white;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s;
        
    }
    button:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 12px rgba(0, 153, 153, 0.3);
    }

    h2 {
        text-align: center;
        margin-top: 40px;
        color: #0b1111;
    }

    table {
        width: 95%;
        margin: 20px auto;
        border-collapse: collapse;
        background-color: white;
        box-shadow: 0 5px 18px rgba(0, 0, 0, 0.12);
        border-radius: 10px;
        overflow: hidden;
    }
    table th,
    table td {
        padding: 12px 15px;
        border: 1px solid #ddd;
        text-align: center;
    }

    table tr:first-child {
        background-color: #0c5a5a;
        color: white;
        font-weight: bold;
    }
    table tr:hover {
        background-color: #686f6f;
    }
    
    table th {
        font-weight: bold;
    }
    .slash {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .button {
        width: 50px;
        padding: 7px;
        background: #0f2b70;
        color: white;
        border-radius: 8px;
        text-decoration: none;
    }

    .button1 {
        width: 70px;
        padding: 7px;
        background: #d71919;
        color: white;
        border-radius: 8px;
        text-decoration: none;
    }
    /* Responsive table */
    @media (max-width: 800px) {
        body {
            padding: 20px 10px;
        }

        table {
            width: 100%;
            font-size: 12px;
        }

        table th,
        table td {
            padding: 8px 5px;
        }
    }

    @media (max-width: 500px) {
        .container {
            padding: 20px;
        }

        h1 {
            font-size: 24px;
        }

        table {
            display: block;
            overflow-x: auto;
            white-space: nowrap;
        }
    }
</style>
</head>
<body>
    <form method="post" class="container">
        
     <div class="slash">
        <a href="dashboard.php" class="button">Back</a>
        <a href="logout.php" class="button1">Logout</a>
     </div>
        <h1>Science</h1>
        <input type="text" name="name" placeholder="Name"><br>
        <input type="number" name="kh" placeholder="Khmer(0-75)"><br>
        <input type="number" name="math" placeholder="Math(0-125)"><br>
        <input type="number" name="bio" placeholder="Biology(0-75)"><br>
        <input type="number" name="hist" placeholder="History(0-50)"><br>
        <input type="number" name="chem" placeholder="Chemistry(0-75)"><br>
        <input type="number" name="phy" placeholder="Physics(0-75)"><br>
        <input type="number" name="eng" placeholder="English(0-50)"><br>
        <button type="submit">Calculate</button></br>
    </form>
    <?php
        function find_grade($score){
            if($score >=90)$grade = "A";
            elseif($score >=80)$grade = "B";
            elseif($score >=70)$grade = "C";
            elseif($score >=60)$grade = "D"; 
            elseif($score >=50)$grade = "E";
            else $grade = "F";
            return $grade;               
        }
        if ($_SERVER["REQUEST_METHOD"]=="POST"){
$name = $_POST['name'];

$kh = (int) $_POST['kh'];
$kh_percent = ($kh * 100) / 75;
$khgr = find_grade($kh_percent);

$math = (int) $_POST['math'];
$math_percent = ($math * 100) / 125;
$mtgr = find_grade($math_percent);

$bio = (int) $_POST['bio'];
$bio_percent = ($bio * 100) / 75;
$biogr = find_grade($bio_percent);

$hist = (int) $_POST['hist'];
$hist_percent = ($hist * 100) / 50;
$histgr = find_grade($hist_percent);

$chem = (int) $_POST['chem'];
$chem_percent = ($chem * 100) / 75;
$chemgr = find_grade($chem_percent);

$phy = (int) $_POST['phy'];
$phy_percent = ($phy * 100) / 75;
$phygr = find_grade($phy_percent);

$eng = (int) $_POST['eng'];
$eng_percent = ($eng * 100) / 50;
$enggr = find_grade($eng_percent);

$total = $kh + $math + $bio + $hist + $chem + $phy + $eng;
$totalgr = find_grade(($total * 100) / 525);
            echo"<h2>Result Bacll examination</h2>";
            echo "<table border='1' cellpadding='10' cellspacing='0'>";
                echo "<tr>
                    <td>Name</td>
                    <td>Khmer</td>
                    <td>Math</td>
                    <td>Biology</td>
                    <td>History</td>
                    <td>Chemistry</td>
                    <td>Physics</td>
                    <td>English</td>
                    <th>Total</th>
                    <th>Grade</th>
                </tr>";
                echo "<tr>
                    <td>$name</td>
                    <td>$khgr </td>
                    <td>$mtgr</td>
                    <td>$biogr</td>
                    <td>$histgr</td>
                    <td>$chemgr</td>
                    <td>$phygr</td>
                    <td>$enggr</td>
                    <th>$total</th>
                    <th>$totalgr</th>
                </tr>";

            echo "</table>";

    $sql="INSERT INTO science_scores(`id`, `student_name`, `kh`, `kh_grade`, `math`, `math_grade`, `bio`, `bio_grade`, `hist`, `hist_grade`, `chem`, `chem_grade`, `phy`, `phy_grade`, `eng`, `eng_grade`, `total`, `total_grade`)
          VALUES (' ','$name','$kh','$khgr','$math','$mtgr','$bio','$biogr','$hist','$histgr','$chem','$chemgr','$phy','$phygr','$eng','$enggr','$total','$totalgr')";
    if ($conn->query($sql) == true){
        echo"New record created.";
    }else{
        echo"Error: " .$conn->error;
    }

}

?>
</body>
</html>