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
    <title>Admin Home</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">	
    <style>
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
    </style>
</head>
  <body>
  <div class = "container-fluid"  style = "
    background-image: url('plan2.jpg');">

  <center>
    <div class="box-1">
        <div class="btn btn-one" onclick="location.href='../Logedin.php'">
        <span>BACK</span>
        </div>
    </div>
    <br>
    <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
    </center>
    <div class="container">
        <table cellspacing = "10" width= "100%">
            <tr>
                <td>
                <button onclick="location.href='Flights.php'" type="button" class="btn-1">Flight List</button>
                </td>    
            </tr>
            <tr>
                <td>
                <button class="btn-1" onclick="location.href='AddFlights.php'" type="button">Add Flights</button>
                </td>    
            </tr>
                <td>
                <button class="btn-1" onclick="location.href='Users.php'" type="button">User List</button>
                </td>    
            </tr>
            <tr>
                <td>
                <button class="btn-1" onclick="location.href='Admins.php'" type="button">Admin List</button>
                </td>
            </tr>
            <tr>
                <td>
                <button class="btn-1" onclick="location.href='payments.php'" type="button">Transaction List</button>
                </td>
            </tr>
        </table>
    </div>
    </div>