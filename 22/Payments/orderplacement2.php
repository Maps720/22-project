<?php
    session_start();
    
    include "../connect.php";
    $_SESSION['PayFlight'] = $_POST['PayFlight'];

    $code = $_GET['id'];
    $user = $_SESSION['UserName'];
if(empty($user)){
	header("Location: ../Login/login.php?error=You need to sign up first");
}

    if(empty($code)){
        header("Location: ../Admin/Flights.php?error=Code empty!");
    }

    ?>
    <head>
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
    <body class="container-fluid" style="
    background-image: url('../Login/travel.jpg');">
    <center>
    <div class="box-1">
        <div class="btn btn-one" onclick="location.href='../Logedin.php'">
        <span>BACK</span>
        </div>
    </div>
    <center>
        <?php

    $sql = "SELECT FlightDepartLocation, FlightArriveLocation, price FROM flights WHERE code =  $code LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if($result -> num_rows > 0){
        while($row = $result-> fetch_assoc()){
            ?> <h3>The price of flight code <?php echo $code?> from <?php echo $row['FlightDepartLocation'];?> to <?php echo $row['FlightArriveLocation'];?>  is <?php echo $row['price'];?> </h3>
            <br>
    <div class="col__box">
        
	      <h5><?php echo $row['name']; ?></h5>
        <h4>Price: <span> K<?php echo $row['price']; ?> </span> </h4>
        <form class="paypal" action="request.php" method="post" id="paypal_form">
          <input type="hidden" name="UserName" value="<?php echo $_SESSION['UserName'] ?>">
          <input type="hidden" name="item_number" value="<?php echo $code ?>" >
          <input type="hidden" name="item_name" value="<?php echo $row['FlightName']; ?>" >
          <input type="hidden" name="amount" value="<?php echo $row['price']; ?>" >
          <input type="hidden" name="currency_code" value="ZMW" >
          <input type="submit" name="submit" value="Buy Now" class="btn__default">
        </form>
	    </div>
  </div>
  <?php
        }
    }else{
        echo "The flight is not available.";
    }
    ?>
    </body>
    
