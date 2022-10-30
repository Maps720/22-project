  <?php
  $dbServername = 'localhost';
  $dbUsername = 'root';
  $dbPassword = '';
  $dbName = 'sign_up_db';
  
  $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
  error_reporting(E_ALL);
  ini_set('display_errors','Off');
  
  ?>
  