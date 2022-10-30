<?php
    session_start();
    if(empty($_SESSION['line'])){
        $line = 1;
    }else{
    $line = $_SESSION['line'];
    }
    
    if(empty($_SESSION['Admin'])){
        header("Location: ../Logedin.php");
    }
    include "../connect.php";
    
?>

<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Flight Database</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">	
    <style media="screen">

label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}
.in1 {
    display: block;
    height: 35px;
    width: 94%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
.sub {
    width: 220px;
    height: 50px;
    border: none;
    outline: none;
    color: #fff;
    background: #111;
    cursor: pointer;
    position: relative;
    z-index: 0;
    border-radius: 10px;
    opacity: 20;
    
}

.btn-one {
  color: red;
  transition: all 0.3s;
  position: relative;
}

.btn-one span {
  transition: all 0.3s;
}

.btn-one::before {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
  opacity: 0;
  transition: all 0.3s;
  border-top-width: 1px;
  border-bottom-width: 1px;
  border-top-style: solid;
  border-bottom-style: solid;
  border-top-color: black;
  border-bottom-color: black;
  transform: scale(0.1, 1);
}

.btn-one:hover span {
  letter-spacing: 2px;
}

.btn-one:hover::before {
  opacity: 1; 
  transform: scale(1, 1); 
}

.btn-one::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
  transition: all 0.3s;
  background-color: rgba(255,255,255,0.1);
}

.btn-one:hover::after {
  opacity: 0; 
  transform: scale(0.1, 1);
}

.error{
    background: #F2DEDE;
    color: #A94442;
    padding: 10px;
    width: 70%;
    border-radius: 5px;
}
    </style>
</head>
<body class="container-fluid text-white" style="
    background-image: url('../Login/travel.jpg');">
    <center>
    <div class="box-1">
        <div class="btn btn-one" onclick="location.href='AdHome.php'">
        <span>BACK TO HOME</span>
        </div>
    </div>
    <div class="box-1">
        <div class="btn btn-one" onclick="location.href='Flights.php'">
        <span>BACK TO FLIGHT LIST</span>
        </div>
    </div>
    <br>
    </center>
  </body>
  <form action="add.php" method="post">
  <table cellspacing = "15" width= "100%" center>
            <tr>
                <th>Flight Code</th>
                <th>Flight Name</th>
                <th>Depart</th>
                <th>Arrive</th>
                <th>Depart Location</th>
                <th>Arrive Location</th>
                <th>Ticket Price(k)</th>
            </tr>
            <tr>
            <?php
                if($line > 0){
                    while($line > 0){ ?>
                         <tr><td> <input class="in1" type="text" id="FlightCode" name="FlightCode<?php echo $line ?>" required> </td>
                         <td> <input class="in1" type="text"  id="FlightName" name="FlightName<?php echo $line ?>" required> </td>
                         <td> <input class="in1" type="text" id="Depart" name="Depart<?php echo $line ?>" required> </td>
                         <td> <input class="in1" type="text" id="Arrive" name="Arrive<?php echo $line ?>" required> </td>
                         <td> <input class="in1" type="text" id="DepartLocation" name="DepartLocation<?php echo $line ?>" required> </td>
                         <td> <input class="in1" type="text" id="ArriveLocation" name="ArriveLocation<?php echo $line ?>" required> </td>
                         <td> <input class="in1" type="text" id="TicketPrice" name="TicketPrice<?php echo $line ?>" required> </td></tr>
                        <?php
                         $line = $line - 1;
                    }
                }else{
                    echo "Someething is wrong.";
                }
                ?>
            </tr>
        </table>
        <br>
        <center>
        <input class="sub" type="submit" value="submit" width="20%">
        </center>
        </form>
        <form action="line.php" method="post">
            
        <center>
        <?php if (isset($_GET['error'])) { ?>
            <br>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <label for="number">Number of rows</label>
        <input class="" type="number" placeholder="1-10" id="line" name="line" width="10%" required>
        <input class="" type="submit" value="submit" width="20%">
        </center>
        </form>
    </body>
</html>

