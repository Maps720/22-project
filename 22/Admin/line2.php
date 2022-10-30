<?php
session_start();
include "../connect.php";

if (isset($_POST['dine'])){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $dine = validate($_POST['dine']); 
        
    if($dine < 1 || $dine > 10){
        header("Location: AddDetails.php?error=line number should be between 1-10.");
        exit();
    }
    else{
        $_SESSION['dine'] = $dine;
        header("Location: AddDetails.php");
        exit();
    }
}else{
header("Location: AddDetails.php?error= is wrong here.");
}
?>