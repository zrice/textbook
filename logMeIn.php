<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<?php
  session_start();

  // Include database functionality
  include('./dbconn.php');
  // Connect to the database (defined in dbconn.php)
  db_connect();
  $cquery = "SELECT CustomerID, Email, Passwd, FirstName from Customers
             WHERE Email = '$_POST[email]' and Passwd = '$_POST[password]'"; 
  
  $cresult = mysqli_query($connection, $cquery);

  //Create session variables
  $_SESSION['customerID'] = get_mysqli_result($cresult, 0, "CustomerID");
  $_SESSION['email'] = get_mysqli_result($cresult, 0, "Email");
  $_SESSION['password'] = get_mysqli_result($cresult, 0, "Passwd");
  $_SESSION['name'] = get_mysqli_result($cresult, 0, "FirstName");

  mysqli_close($connection);  

  require_once("header.html");
 
  if(isset($_SESSION['email'])){
    echo "<div>
            <h3>Login</h3>
            <p>You are now logged in, {$_SESSION['name']}</p>
          </div>";
  }
  else {
    echo "<div>
            <h3>Login</h3>
            <p>Credentials not recognized.  Please <a href=\"login.php\">try again</a>.</p>
          </div>";
  }
  require_once("footer.html"); 
?>
