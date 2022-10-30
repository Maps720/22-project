<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Airline Information System</title>
  

</head>
<body>
<!-- partial:index.partial.html -->
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Design by foolishdeveloper.com -->
    <title>Airline Information System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <style media="screen">
      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-color: #080710;
    margin: 0;
    padding: 0;
    background: url(travel.jpg);
    height: 100vh;
    overflow: hidden;
}
.background{
    width: 430px;
    height: 820px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}

.shape:first-child{
    background: linear-gradient(
        #1845ad,
        #23a2f6
    );
    left: -80px;
    top: -80px;
}
.shape:last-child{
    background: linear-gradient(
        to right,
        #ff512f,
        #f09819
    );
    right: -30px;
    bottom: -80px;
}
form{
    height: 800px;
    width: 800px;
    background-color: rgba(40 212 166 / 13%);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(2px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}
form *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
}

label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}
input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
::placeholder{
    color: black;
}
button{
    margin-top: 50px;
    width: 100%;
    background-color: #ffffff;
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
.social{
  margin-top: 30px;
  display: flex;
}
.social div{
  background: red;
  width: 150px;
  border-radius: 3px;
  padding: 5px 10px 10px 5px;
  background-color: rgba(255,255,255,0.27);
  color: #eaf0fb;
  text-align: center;
}
.social div:hover{
  background-color: rgba(255,255,255,0.47);
}
.social .fb{
  margin-left: 25px;
}
.social i{
  margin-right: 4px;
}
.error{
    background: #F2DEDE;
    color: #A94442;
    padding: 10px;
    width: 70%;
    border-radius: 5px;
}
    </style>
</head>
<body>
    <?php if (empty($_SESSION['UserName'])) {
    }else{
        $_SESSION['UserName'] = "";
        header("Location: signup.php?error=Your session has expired");
    }
    ?>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="connect_sign_up.php" method="post">
        <br>
        <center>
            <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
        </center>
        <table cellspacing = "15" width= "100%">
            <tr>
                <td><label for="firstname">First Name</label>
                    <input class="inputColor" type="text" placeholder="First" id="firstname" name="FirstName" required></td>
                <td><label for="lastname">Last Name</label>
                    <input class="inputColor" type="text" placeholder="Last" id="lastname" name="LastName" required></td>
            </tr>

            <tr>
                <td><label for="email">Email</label>
                    <input class="inputColor" type="Email" placeholder="example@gmail.com" id="Email" name="Email" required></td>
                <td><label for="phone#">Phone#</label>
                    <input class="inputColor" type="tel" placeholder="260#########" id="phone" name="Phone" required></td>
            </tr>

            <tr>
                <td><label for="homeaddress">HomeAddress</label>
                    <input class="inputColor" type="text" placeholder="HomeAddress, province." id="username" name="HomeAd" required></td>
                <td><label for="username">Username</label>
                    <input type="text" placeholder="Enter a unique username" id="username" name="UserName" required></td>
            </tr>
                <td><label for="password">Password</label>
                    <input type="password" placeholder="Your password" id="password" name="Password" required></td>
                <td><label for="retype">Retype password</label>
                    <input type="password" placeholder="Re-enter your password" id="retype" name="Retype" required></td>
            </tr>
        </table>

        <button>Sign up</button>
        <section class="button-area">
			<div class="container border-top-generic">
                <div class="button-group-area">
                <p>Already have an account? <a href="../Login/login.php" class="genric-btn success">Login in</a></p>
                </div>
            </div>
		</section>        
        
        
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>	    					
</body>
</html>
  
</body>
</html>
