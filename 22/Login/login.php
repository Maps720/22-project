<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Animated Login Form | CodingNepal</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">	
  </head>
  <body>
    <div class="center">
      <h1>Login</h1>
      <form action="connect.php" method="post">
      <br>
        <center>
        <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        </center>
        <div class="txt_field">
          <input type="text" name="UserName" required>
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="password" name="Password" required>
          <span></span>
          <label>Password</label>
        </div>
        <!-- Forgot Password -->

        <div class="pass" >Forgot Password? <a href="../forgot.php"> click here</a> </div>
       <input type="submit" value="Login">
        <div class="../Sign_UP/signup.php">
          Not a member? <a href="../Sign_UP/signup.php">Signup</a>
        </div>
      </form>
    </div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">	
  </body>
</html>
