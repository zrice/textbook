<?php

  session_start(); 

  include('./dbconn.php');

  db_connect();

  $cquery = "SELECT CategoryID, CategoryName FROM Categories";
  $cresult = mysqli_query($connection,$cquery);

  $numCat = mysqli_num_rows($cresult);
?>

<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<?php require_once("header.html"); ?>

<div>
  <h3>Browse by Category</h3>
  <form method="post" action="browseResults.php">
    <select name="category">
      <option></option>
      <?php
      //Fill selection box with all categories found in table
        for($i=0; $i<$numCat; $i++)  {
          $catName = get_mysqli_result($cresult, $i, "CategoryName");
          echo "<option>$catName</option>";
        }
      ?>  
    </select>
  <input type="submit" value="Browse"/>
  </form>
  </br>
</div>

<?php require_once("footer.html"); ?>
