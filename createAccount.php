<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<?php 
  session_start();
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<script type = "text/javascript">
  <!--
  function validateAll() {
    // Declare variables
    var email = "";
    var confEmail = "";
    var password = "";
    var confPassword = "";
    var zip = "";
   
    // Initialize variables
    email = document.getElementsByName("email")[0].value;
    confEmail = document.getElementsByName("confirmEmail")[0].value;
    password = document.getElementsByName("password")[0].value;
    confPassword = document.getElementsByName("confirmPassword")[0].value;
    zip = document.getElementsByName("zip")[0].value;

    if(email != confEmail) {
      alert('The two email address fields must match.');
      document.getElementsByName("email")[0].focus();
      return false;
    }
    
    if(password != confPassword) {
      alert('The two password fields must match.');
      document.getElementsByName("password")[0].focus();
      return false;
    }

    if(password.length < 8) {
      alert('The password must contain at least 8 characters.');
      document.getElementsByName("password")[0].focus();
      return false;
    }

    if((isNaN(zip) == true) ||  (zip.toString().length != 5)) {
      alert('The zip code must be numeric, and exactly 5 numbers in length.');
      document.getElementsByName("zip")[0].focus();
      return false;
    }
  }

  // -->
</script>


<?php require_once("header.html"); ?>

<!--
This is messy, and the perfectionist in me
is screaming right now, but I've spent two
hours now trying to make this look nice.
I'll revisit this once the rest of the
functionality is finished and I have 
nothing to do with myself.
So likely, never.
Sorry.
 -->

<div>
  <h3>Create an account</h3>
  <p>
    <form method = "post" action = "sendToDB.php" onSubmit="return validateAll();" onReset="return confirm('Are you sure you want to clear all form values?');"> 
      First name:</span>
      <input type = "text" name = "firstName" size = "36" required/></br>

      Last name:
      <input type = "text" name = "lastName" size = "36" required/></br>

      Email address:
      <input type = "text" name = "email" size = "33" required/></br>

      Confirm email address:
      <input type = "text" name = "confirmEmail" size = "25" required/></br>

      Password:
      <input type = "password" name = "password" size = "37" required/></br>

      Confirm password:
      <input type = "password" name = "confirmPassword" size = "29" required/></br>

      Street address:
      <input type = "text" name = "address" size = "33" required/></br>

      Street address 2:
      <input type = "text" name = "address2" size = "32"/></br>

      City:
      <input type = "text" name = "city" size = "42" required/></br>

      Zip:
      <input type = "text" name = "zip" size = "43"/ required></br>

      Phone number:
      <input type = "text" name = "phone" size = "33"/></br>

      State:
      <select name = "state" required>
        <option selected = "selected"></option>
        <option>Alabama</option>
        <option>Alaska</option>
        <option>Arizona</option>
        <option>Arkansas</option>
        <option>California</option>
        <option>Colorado</option>
        <option>Connecticut</option>
        <option>Delaware</option>
        <option>Florida</option>
        <option>Georgia</option>
        <option>Hawaii</option>
        <option>Idaho</option>
        <option>Illinois</option>
        <option>Indiana</option>
        <option>Iowa</option>
        <option>Kansas</option>
        <option>Kentucky</option>
        <option>Louisiana</option>
        <option>Maine</option>
        <option>Maryland</option>
        <option>Massachusetts</option>
        <option>Michigan</option>
        <option>Minnesota</option>
        <option>Mississippi</option>
        <option>Missouri</option>
        <option>Montana</option>
        <option>Nebraska</option>
        <option>Nevada</option>
        <option>New Hampshire</option>
        <option>New Jersey</option>
        <option>New Mexico</option>
        <option>New York</option>
        <option>North Carolina</option>
        <option>North Dakota</option>
        <option>Ohio</option>
        <option>Oklahoma</option>
        <option>Oregon</option>
        <option>Pennsylvania</option>
        <option>Rhode Island</option>
        <option>South Carolina</option>
        <option>South Dakota</option>
        <option>Tennessee</option>
        <option>Texas</option>
        <option>Utah</option>
        <option>Vermont</option>
        <option>Virginia</option>
        <option>Washington</option>
        <option>West Virginia</option>
        <option>Wisconsin</option>
        <option>Wyoming</option>
      </select></br></br>
      
      <input type = "submit" value = "Submit" />
      <input type = "reset" value = "Clear" />
    </form>
  </p>
</div>

<?php require_once("footer.html"); ?>
