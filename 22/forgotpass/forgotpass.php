<?php
session_start(); 
include "../Login/db_conn.php";

if (isset($_POST['NewPass']) && isset($_POST['Confirm']) ){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $User = $_POST['Phone'];
    $NewPass = validate($_POST['NewPass']); 
    $ConPass = validate($_POST['Confirm']);
    
    if(empty($_POST['Phone'])){
        header("Location:../forgot.php?error=jkdsjflkdsjkl");
        exit();
    }    
    if(empty($ConPass)){
        header("Location:../forgot.php?error=old password required");
        exit();
    }else if(empty($NewPass)){
        header("Location:../forgot.php?error=New password required");
        exit();
    }else if($NewPass == $ConPass){
        $PasswordMD5 = md5($NewPass);
        $sqlold = "SELECT * FROM user WHERE Phone='$User' LIMIT 1";
        $result = mysqli_query($conn, $sqlold);
        $row = mysqli_fetch_array($result);
            if($row['Phone'] === $User){
                $con = mysqli_query($conn, "UPDATE user
                SET Pass = '$PasswordMD5' WHERE Phone = '$User';");
                header("location:../Login/Login.php?error=Change password success");
                exit();
            }
        }else{
        header("Location:../Profile.php?error=New password doesn't match with the confirm");
    }
}

?>
