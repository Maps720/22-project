<?php
session_start();
include "../connect.php";
$dine = $_SESSION['dine'];
function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if($dine > 0){
    while($dine > 0){
        
        $FlightName = validate($_POST['FlightName' . $dine]);
        $Email = validate($_POST['Email' . $dine]);
        $Phone = validate($_POST['PhoneNo' . $dine]); 

        if(empty($FlightName || $Email || $Phone)){
            header("Location: AddDetails.php?error=Ensure all inputs are valid.");
            exit();
        }

        $sql = "INSERT INTO flightsdetails(FlightName, Email, PhoneNo) VALUES
        ('$FlightName', '$Email','$Phone');";
        mysqli_query($conn, $sql);
        $dine = $dine - 1;
        }
        header("Location: AddDetails.php?error=Success");
        exit();
    }else{
    header("Location: AddDetails.php?error=Kaya");
    exit();;
}
?>