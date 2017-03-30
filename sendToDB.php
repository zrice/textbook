<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">


<?php
    // Include database functionality
    include('./dbconn.php');

    // Connect to the database (defined in dbconn.php)
    db_connect();

    $cquery = "INSERT INTO Customers
               (Email, Passwd, FirstName, LastName, Address1, Address2, City, State, ZipCode, PhoneNumber)
  	        VALUES ('$_POST[email]', '$_POST[password]', '$_POST[firstName]', '$_POST[lastName]', 
                        '$_POST[address]', '$_POST[address2]', '$_POST[city]', '$_POST[state]', 
                        '$_POST[zip]', '$_POST[phone]')";
 
    mysqli_query($connection, $cquery);

    mysqli_close($connection);

    require_once("header.html");
?>

<div>
  <h3>Account successfully created!</h3>
</div>

<?php require_once("footer.html"); ?>


