<?php
session_start();
include "db_conn_signup.php";

if (isset($_POST['FirstName']) && isset($_POST['LastName']) && isset($_POST['Email']) && isset($_POST['Phone']) && isset($_POST['HomeAd']) && isset($_POST['UserName']) && isset($_POST['Retype'])) {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $FirstName = validate($_POST['FirstName']);
    $LastName = validate($_POST['LastName']);
    $Email = validate($_POST['Email']);
    $HomeAd = validate($_POST['HomeAd']);
    $Phone = validate($_POST['Phone']);
    $UserName = validate($_POST['UserName']);
    $Password = validate($_POST['Password']);
    $Retype = validate($_POST['Retype']); 
        
    if(empty($FirstName)){
        header("Location: signup.php?error=First name is required");
        exit();
    }else if(empty($LastName)){
        header("Location: signup.php?error=Last Name is required");
        exit();
    }else if(empty($Email)){
         header("Location: signup.php?error=Email is required");
        exit();
    }else if(empty($Phone)){
        header("Location: signup.php?error=Phone number is required");
        exit();
    }else if(empty($HomeAd)){
        header("Location: signup.php?error=Home Address is required");
        exit();
    }else if(empty($UserName)){
        header("Location: signup.php?error=Username is required");
        exit();
    }else if(empty($Password)){
        header("Location: signup.php?error=Password is required");
        exit();
    }else if(empty($Retype)){
        header("Location: signup.php?error=Retype ypur password to continue");
        exit();
    }else if($Password == $Retype){
        $PasswordMD5 = md5($Password);

        $sqlEmail = "SELECT * FROM user WHERE Email='$Email'";
        $sqlPhone = "SELECT * FROM user WHERE Phone='$Phone'";
        $sqlUser = "SELECT * FROM user WHERE UserName='$UserName'";
        $resultEmail = mysqli_query($conn, $sqlEmail);
        $resultPhone = mysqli_query($conn, $sqlPhone);
        $resultUser = mysqli_query($conn, $sqlUser);

        if(mysqli_num_rows($resultEmail) === 1) {
            $row = mysqli_fetch_assoc($resultEmail);
            if($row['Email'] === $Email){
                header("location: signup.php?error=Email is already registered to an account");
                exit();
            }
        }

        if(mysqli_num_rows($resultPhone) === 1) {
            $row = mysqli_fetch_assoc($resultPhone);
            if($row['Phone'] === $Phone){
                header("location: signup.php?error=Phone Number is already registered to an account");
                exit();
            }
        }
        
        if(mysqli_num_rows($resultUser) === 1) {
            $row = mysqli_fetch_assoc($resultUser);
            if($row['UserName'] === $UserName){
                header("location: signup.php?error=Username is already registered to an account");
                exit();
            }
        }

        $sql = "INSERT INTO user(FirstName, LastName, Email, Phone, Home, UserName, Pass) VALUES
        ('$FirstName', '$LastName', '$Email','$Phone', '$HomeAd', '$UserName', '$PasswordMD5');";
        mysqli_query($conn, $sql);
        header("Location: ../Registration_Successful/successful.html");
        exit();
        }else{
        header("Location: signup.php?error=Retype password doesn't match password!");
        exit();
    }
}
?>