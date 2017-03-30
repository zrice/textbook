<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<?php 
  session_start();  
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<?php require_once("header.html"); ?>

<div>
  <h3>Search for a Product</h3>
  <form method="post" action="searchResults.php">
    <input type="text" name="itemName" size="20" maxlength="50"/>
  <input type="submit" value="Search"/>
  </form>
  </br>
</div>

<?php require_once("footer.html"); ?>
