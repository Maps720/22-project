<?php


    include_once 'connect.php'; 
    $Email = $_POST['Email'] ;
    $Name = $_POST['Name'] ;
    $DateOfBirth = $_POST['DateOfBirth'] ;
    $Phone = $_POST['Phone'] ;
    $Address = $_POST['Address'] ;
    $Gender = $_POST['Gender'] ;
    $Password = $_POST['Password'] ;
    $RepeatPassword = $_POST['RepeatPassword'] ;
    

    $sql = "INSERT INTO register( Email, Name, DateOfBirth, Phone, Address, Gender,Password, RepeatPassword)
    VALUES ('$Email',' $Name',' $DateOfBirth','$Phone','$Address',' $Gender ',' $Password',' $RepeatPassword ');";
    mysqli_query($conn, $sql);
    
   
    
    
    header("Location: index.php");
    
    