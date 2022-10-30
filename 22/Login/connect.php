<?php
session_start();
include "db_conn.php";

if (isset($_POST['UserName']) && isset($_POST['Password'])){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $UserName = validate($_POST['UserName']);
    $Password = validate(md5($_POST['Password']));  
        
    if(empty($UserName)){
        header("Location: login.php?error=username required");
        exit();
    }else if(empty($Password)){
        header("Location: login.php?error=password required");
        exit();
    }else{
        $sql = "SELECT * FROM user WHERE UserName='$UserName' AND Pass='$Password'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if($row['UserName'] === $UserName && $row['Pass'] === $Password){
                $_SESSION['UserName'] = $row['UserName'];
                $_SESSION['Password'] = $row['Pass'];
                $_SESSION['Admin'] = $row['Admin'];
                $time = mysqli_query($conn, "UPDATE user SET logedin=now() WHERE UserName='$UserName'"); 
                header("location: ..\logedin.php");
                exit();
            }else{
                header("Location: login.php?error=Incorrect User name or Password");
                exit();
            }
        }else{
            header("Location: login.php?error=Incorrect Username or Password");
            exit();
        }
    }
}
?>