<?php
    session_start();
    if(empty($_SESSION['Admin'])){
        header("Location: ../Admin/Flights.php");
    }
    include "../connect.php";
    $_SESSION['PayFlight'] = $_POST['PayFlight'];

    if(empty($_SESSION['PayFlight'])){
        header("Location: ../Admin/Flights.php?error=Code empty!");
    }else{
        $pay = $_SESSION['PayFlight'];
    }

    $sql = "SELECT price FROM flights WHERE code =  $pay LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if($result -> num_rows > 0){
        while($row = $result-> fetch_assoc()){
            ?> <p>The price of flight code <?php echo $pay?> is <?php echo $row['price'];?> </p>
            <br>
    <div class="col__box">
	      <h5><?php echo $row['name']; ?></h5>
        <h4>Price: <span> K<?php echo $row['price']; ?> </span> </h4>
        <form class="paypal" action="request.php" method="post" id="paypal_form">
          <input type="hidden" name="item_number" value="<?php echo $pay ?>" >
          <input type="hidden" name="item_name" value="<?php echo $row['FlightName']; ?>" >
          <input type="hidden" name="amount" value="<?php echo $row['price']; ?>" >
          <input type="hidden" name="currency_code" value="USD" >
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
    
