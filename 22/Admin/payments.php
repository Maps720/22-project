<?php
session_start();
include_once "../Login/db_conn.php";

$user = $_SESSION['UserName'];
if(empty($user)){
	header("Location: Login/login.php?error=You need to sign up first");
}

$sql = "SELECT * FROM user WHERE UserName='$user' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if($row['UserName'] === $user){
                $_SESSION['FirstName'] = $row['FirstName'];
                $_SESSION['LastName'] = $row['LastName'];
				$_SESSION['Phone'] = $row['Phone'];
				$_SESSION['Email'] = $row['Email'];
				$_SESSION['HomeAd'] = $row['Home'];
				$_SESSION['UserName'] = $row['UserName'];
			}}
?>



<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">	
</head>
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
<body class="text-red" style="
    background-image: url('../Login/travel2.jpg');">
    
	  
			
					
<div class="container">
	<center>
	<div class="box-1">
        <div class="btn btn-one" onclick="location.href='../Logedin.php'">
        <span>HOME</span>
        </div>
    </div>
	</center>

	<div class="center">
					<h2>TRANSACTIONS HISTORY</Table></h2>
        <table cellspacing = "15" width= "100%" center>
            <tr>
                <th>FLIGHT CODE</th>
                <th>USER</th>
				<th>TRANSACTION ID</th>
                <th>PRICE</th>
                <th>FROM</th>
				<th>DEPARTURE</th>
                <th>TO</th>
				<th>ARRIVAL</th>
				<th>STATUS</th>
            </tr>
            <tr>
			<?php

			$sqlout  = "SELECT payments.User_Name, payments.product_id, payments.transaction_id, payments.payment_amount, payments.payment_status, flights.FlightArrive, flights.FlightDepart, flights.FlightDepartLocation, flights.FlightArriveLocation
			FROM payments
			INNER JOIN flights ON payments.product_id = flights.code";
			$resultout = mysqli_query($conn, $sqlout);
			
				if($resultout -> num_rows > 0){
					while($rowout = $resultout-> fetch_assoc()){
						echo "<tr><td>" . $rowout["product_id"] . "</td><td>" . $rowout["User_Name"] . "</td><td>" . $rowout["transaction_id"] . "</td><td>" . $rowout["payment_amount"] . "</td><td>" . $rowout["FlightDepartLocation"] . "</td><td>" . $rowout["FlightDepart"] . "</td><td>" .  $rowout["FlightArriveLocation"] .   "</td><td>" . $rowout["FlightArrive"] . "</td><td>". $rowout["payment_status"]. "</td></tr>";
					}
				}
			?>
			</div>
	</div>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>	
</body>
</html>