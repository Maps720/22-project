<?php
session_start();
include "../connect.php";
$line = $_SESSION['line'];
function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if($line > 0){
    while($line > 0){
        
        $Flightcode = validate($_POST['FlightCode' . $line]);
        $FlightName = validate($_POST['FlightName' . $line]);
        $Depart = validate($_POST['Depart' . $line]);
        $Arrive = validate($_POST['Arrive' . $line]);
        $DepartLocation = validate($_POST['DepartLocation' . $line]);
        $ArriveLocation = validate($_POST['ArriveLocation' . $line]);
        $TicketPrice = validate($_POST['TicketPrice' . $line]); 

        if(empty($Flightcode || $FlightName || $Depart || $Arrive || $DepartLocation || $ArriveLocation || $TicketPrice)){
            header("Location: AddFlights.php?error=Ensure all inputs are valid.");
            exit();
        }

        $sql = "INSERT INTO flights(Code, FlightName, FlightDepart, FlightArrive, FlightDepartLocation, FlightArriveLocation, Price) VALUES
        ('$Flightcode', '$FlightName', '$Depart','$Arrive', '$DepartLocation', '$ArriveLocation', '$TicketPrice');";
        mysqli_query($conn, $sql);
        $line = $line - 1;
        }
        header("Location: AddFlights.php?error=Success");
        exit();
    }else{
    header("Location: AddFlights.php?error=");
    exit();;
}
?>