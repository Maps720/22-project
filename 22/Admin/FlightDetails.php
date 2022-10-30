<?php
    session_start();
   
    if(empty($_SESSION['Admin'])){
        header("Location: ../Logedin.php");
    }
    include "../connect.php";
    if(empty($line)){
        $line = 1;
    }
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
  <body>
  <center>
    <div class="box-1">
        <div class="btn btn-one" onclick="location.href='Flights.php'">
        <span>BACK</span>
        </div>
    </div>
    <div class="box-1">
        <div class="btn btn-one" onclick="location.href='AddDetails.php'">
        <span>ADD MORE TO LIST</span>
        </div>
    </div>
    <br>
    <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
    </center>
</div>
  <table cellspacing = "15" width= "100%" center>
            <tr>
                <th>Flight Name</th>
                <th>Email</th>
                <th>Phone Number</th>
            </tr>
            <tr>
            <?php
                $sql = "SELECT * FROM flightsdetails";
                $result = mysqli_query($conn, $sql);

                if($result -> num_rows > 0){
                    while($row = $result-> fetch_assoc()){
                        echo "<tr><td>" . $row["FlightName"] . "</td><td>" . $row["Email"] . "</td><td>" . $row["PhoneNo"] . "</td></tr>";
                    }
                }else{
                    echo "There are no flights available.";
                }
                ?>
            </tr>

</body>
