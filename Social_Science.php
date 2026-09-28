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
    <title>bacll grade</title>
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
    }
    .slash a:hover {
        background-color: #495057;
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
        background: linear-gradient(135deg, #2522d7, #0e0385);
        color: white;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s;
    }
    button:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 12px rgba(2, 7, 7, 0.3);
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
        background-color: #1c0f52;
        color: white;
        font-weight: bold;
    }
    table tr:hover {
        background-color: #666b6b;
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
        <h1>Social Science</h1>
        <input type="text" name="name" placeholder="Name"><br>
        <input type="number" name="kh" placeholder="Khmer(0-125)"><br>
        <input type="number" name="math" placeholder="Math(0-75)"><br>
        <input type="number" name="en-science" placeholder="Environmental Science(0-50)"><br>
        <input type="number" name="hist" placeholder="History(0-75)"><br>
        <input type="number" name="geo" placeholder="Geography(0-75)"><br>
        <input type="number" name="mcivil" placeholder="Moral Civil(0-75)"><br>
        <input type="number" name="eng" placeholder="English(0-50)"><br>
        <button type="submit">Calculate</button>
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
            $name= $_POST['name'];
            $kh =  (int)$_POST['kh'];
            $kh_percent = ($kh * 100)/125;
            $khgr = find_grade($kh);
            $math = (int)$_POST['math'];
            $math_percent = ($math *100)/75;
            $mtgr = find_grade($math);
            $en_science = (int)$_POST['en-science'];
            $en_science_percent = ($en_science *100)/50; 
            $en_sciencegr = find_grade($en_science);
            $hist = (int)$_POST['hist'];
            $hist_percent = ($hist *100)/75;
            $histgr = find_grade($hist);
            $geo = (int)$_POST['geo'];
            $geo_percent = ($geo *100)/75;
            $geogr = find_grade($geo);
            $mcivil =(int) $_POST['mcivil'];
            $mcivil_percent = ($mcivil *100)/75;
            $mcivilgr = find_grade($mcivil);
            $eng = (int)$_POST['eng'];
            $eng_percent= ($eng *100)/50;
            $enggr = find_grade($eng);
            if($eng>25)$eng-=25;
            else $eng=0;
            $total = $kh + $math + $en_science + $hist + $geo + $mcivil + $eng;
            $totalgr = find_grade($total*100/475);

        echo "<h2>Result Bacll Examination</h2>";
        echo "<table border='1' cellpadding='10' cellspacing='0'>";
            echo "<tr>
                    <td>Name</td>
                    <td>Khmer</td>
                    <td>Math</td>
                    <td>Environmental Science</td>
                    <td>History</td>
                    <td>Geography</td>
                    <td>Moral Civil</td>
                    <td>English</td>
                    <th>Grade</th>
                </tr>";
            echo "<tr>
                    <td>$name</td>
                    <td>$khgr</td>
                    <td>$mtgr</td>
                    <td>$en_sciencegr</td>
                    <td>$histgr</td>
                    <td>$geogr</td>
                    <td>$mcivilgr</td>
                    <td>$enggr</td>
                    <th>$totalgr</th>
                </tr>";
        echo "</table>";

    $sql = "INSERT INTO social_scores(`id`, `student_name`, `kh`, `kh_grade`, `math`, `math_grade`, `en_science`, `en_science_grade`, `hist`, `hist_grade`, `geo`, `geo_grade`, `mcivil`, `mcivil_grade`, `eng`, `eng_grade`, `total`, `total_grade`)
     VALUES (' ','$name','$kh','$khgr','$math','$mtgr','$en_science','$en_sciencegr','$hist','$histgr','$geo','$geogr','$mcivil','$mcivilgr','$eng','$enggr','$total','$totalgr')";
    if($conn->query($sql)==True){
        echo"New record created sucessfully";
    }else{
        echo"Error: " .$conn->error;
    }
}

     
    ?>
</body>
</html>