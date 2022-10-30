<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>FLIGHT SEARCH</title>
<style>
    *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
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



<?php
session_start();
include "../connect.php";

$depart = $_POST['depart'];
$arrive = $_POST['arrive'];
?>
<body class="container-fluid  text-white" style="
    background-image: url('../Login/travel2.jpg');">
<center>
    <div class="box-1">
        <div class="btn btn-one" onclick="location.href='../Logedin.php'">
        <span>BACK</span>
        </div>
    </div>
</center>
<div class="center text-white" style="margin-top: 15%;">
<center><h2>SEARCH RESULTS</h2></center>
<table cellspacing = "10" width= "100%">
    <tr>
        <th>FLIGHT CODE</th>
        <th>FROM</th>
        <th>TO</th>
        <th>PRICE</th>
        <th>AVAILABLE TICKETS</th>
    </tr>
    
<?php
$sql = "SELECT * FROM flights WHERE FlightDepartLocation = '$depart' AND FlightArriveLocation = '$arrive'";
$result = mysqli_query($conn,$sql);
if($result -> num_rows > 0){
    while($rowout = $result-> fetch_assoc()){
        echo "<tr><td><center>" . $rowout["Code"] . "</center></td><td><center>" . $rowout["FlightDepart"] . "</center></td><td><center>" . $rowout["FlightArrive"] . "</center></td><td><center>" . $rowout["Price"] . "</center></td><td><center>" . $rowout["tickets"]. "</center></td><tr><center>";
    }
    ?>
    </table class = "text-white">
    <form action="../Payments/orderPlacement.php" method="post">
            <center>
            <label for="PayFlight">FLIGHT CODE</label>
            <input class="inputColor" type="text" placeholder="code" id="PayFlight" name="PayFlight" required>
            <input class="submit" type="submit">
            </center>
        </form>
        <?php
}else{
    ?> </table> <center><?php
    echo "No available flights.";
}
?></center>
</div>
</body>
    