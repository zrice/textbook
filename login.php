<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<?php 
  session_start();

  require_once("header.html"); 

  // If already logged in:
  if(isset($_SESSION['email'])) {
    echo "
<div>
  <h3>Login</h3>
  <p>
    You are already logged in, {$_SESSION['name']}! </br>
    Please log out if you would like to be able to log in.
  </p>
</div>";
  }
  else {
    echo "
<div>
  <h3>Login</h3>
  <form method=\"post\" action=\"logMeIn.php\">
    Email: <input type=\"text\" name=\"email\" size=23 required></input></br>
    Password: <input type=\"password\" name=\"password\" required></input></br>
    </br>
    <input type=\"submit\" value=\"Submit\" />
    <input type=\"reset\" value=\"Clear\" />
  </form>
</div>";
  }

  require_once("footer.html");
?>
