<?php
session_start();
include "../connect.php";

if (isset($_POST['line'])){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $line = validate($_POST['line']); 
        
    if($line < 1 || $line > 10){
        header("Location: AddFlights.php?error=line number should be between 1-10.");
        exit();
    }
    else{
        $_SESSION['line'] = $line;
        header("Location: AddFlights.php");
        exit();
    }
}else{
header("Location: AddFlights.php?error= is wrong here.");
}
?>