<?php
    session_start();
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
    <link rel="stylesheet" href="style2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">	
<style>
    *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-color: #080710;
    margin: 0;
    padding: 0;
    background: url(pl.jpg);
    height: 100vh;
    overflow: hidden;
}
.background{
    width: 430px;
    height: 820px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}

.shape:first-child{
    background: linear-gradient(
        #1845ad,
        #23a2f6
    );
    left: -80px;
    top: -80px;
}
.shape:last-child{
    background: linear-gradient(
        to right,
        #ff512f,
        #f09819
    );
    right: -30px;
    bottom: -80px;
}

form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
}

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

::placeholder{
    color: black;
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
  <body class="container-fluid" style="
    background-image: url('../Login/travel.jpg');">
    <center>
    <div class="box-1">
        <div class="btn btn-one" onclick="location.href='AdHome.php'">
        <span>BACK</span>
        </div>
    </div>
    <div class="box-1">
        <div class="btn btn-one" onclick="location.href='FlightDetails.php'">
        <span>MORE FLIGHT INFO</span>
        </div>
    </div>
        <div class="btn btn-one" onclick="location.href='AddFlights.php'">
        <span>ADD TO FLIGHT LIST</span>
        </div>
    </div>
    </center>
    <div class="center text-white" style="margin-top: 15%;">
        <table cellspacing = "15" width= "100%" center>
            <tr>
                <th>Flight Code</th>
                <th>Flight Name</th>
                <th>Depart</th>
                <th>Arrive</th>
                <th>Depart Location</th>
                <th>Arrive Location</th>
                <th>Ticket Price</th>
            </tr>
            <tr>
                <?php
                $sql = "SELECT * FROM flights";
                $result = mysqli_query($conn, $sql);

                if($result -> num_rows > 0){
                    while($row = $result-> fetch_assoc()){
                        echo "<tr><td>" . $row["Code"] . "</td><td>" . $row["FlightName"] . "</td><td>" . $row["FlightDepart"] . "</td><td>" . $row["FlightArrive"] . "</td><td>" . $row["FlightDepartLocation"] . "</td><td>" . $row["FlightArriveLocation"] .  "</td><td>" . $row["Price"] . "</td></tr>";
                    }
                }else{
                    echo "There are no flights available.";
                }
                ?>
            </tr>
        </table>
       