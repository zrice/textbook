<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<?php 
  session_start();

  require_once("header.html"); 

  // If already logged in:
  if(isset($_SESSION['email'])) {
    $name = $_SESSION['name'];
    session_unset();
    session_destroy();
    echo "
<div>
  <h3>Logout</h3>
  <p>
    You have been successfully logged out, $name!
  </p>
</div>";
  }
  else {
    echo "
<div>
  <h3>Logout</h3>
  <p>
    You are not logged in.  Please log in if you would like to be able to log out.
  </p>
</div>";
  }

  require_once("footer.html");
?>
