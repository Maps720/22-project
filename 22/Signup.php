<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="css\style2.css">
    
</head>
<body>
    <form action="Signup2.php" method = "POST" >
        <div class="container">
          <h1>Register</h1>
          <p>Please fill in this form to create an account.</p>
          <hr>
          
      
          <label for="Email"><b>Email</b></label>
          <input type="email" placeholder="Enter Email" name="Email" id="Email" required>

          <label for="Name"><b>Name</b></label>
          <input type="text" placeholder="Enter Name" name="Name" id="Name" required>

          <label for="DOB"><b>Date of Birth</b></label>
          <input type="date" name = "DateOfBirth" placeholder="date" required>

          <label for="phone"><b>Phone</b></label>
          <input type="tel" placeholder="Phone" name="Phone" id="Phone" required>

          <label for="Address"><b>Address</b></label>
          <input type="text" placeholder="Enter Address" name="Address" id="Address" required>

          <label for="Gender"><b>Gender</b></label>
          <input type="text" placeholder="Enter M or F" name="Gender" id="Gender" required>
    
          <label for="Password"><b>Password</b></label>
          <input type="Password" placeholder="Enter Password" name="Password" id="Password" required>
      
          <label for="RepeatPassword"><b>Repeat Password</b></label>
          <input type="password" placeholder="Repeat Password" name="RepeatPassword" id="RepeatPassword" required>
          <hr>
      
          <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
          <button type="submit" class="registerbtn">Register</button>
          <p>Already have an account? <a href="login.php">Sign in</a>.</p>
        </div>
      </form>
      
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>      					
</body>
</html>