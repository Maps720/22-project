<?php
session_start();
include "Login/db_conn.php";

if (isset($_POST['NewPass']) && isset($_POST['Pass']) && isset($_POST['Confirm']) && isset($_SESSION['UserName'])){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $User = $_SESSION['UserName'];
    $NewPass = validate(md5($_POST['NewPass']));
    $Password = validate(md5($_POST['Pass']));  
    $ConPass = validate(md5($_POST['Confirm']));
        
    if(empty($Password)){
        header("Location: change.php?error=old password required");
        exit();
    }else if(empty($NewPass)){
        header("Location: change.php?error=New password required");
        exit();
    }else if($NewPass == $ConPass){
        $sqlold = "SELECT * FROM user WHERE UserName='$User' LIMIT 1";
        $result = mysqli_query($conn, $sqlold);
        $row = mysqli_fetch_array($result);
            if($row['Pass'] === $Password){
                $con = mysqli_query($conn, "UPDATE user
                SET Pass = '$NewPass' WHERE UserName = '$User';");
                header("location: change.php?error=success");
                exit();
            }else{
                header("Location: change.php?error=Incorrect password");
                exit();
            }
        }
        header("Location: change.php?error=New password doesn't match with the confirm");
    }