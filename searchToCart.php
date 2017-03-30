<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">


<?php
  session_start();

  if(!isset($_SESSION['numOfItems'])){
    $_SESSION['numOfItems'] = 0;
  }

  $found = false;
  for($i=0; $i<$_SESSION['numOfItems']; $i++){
    if($_SESSION['cart'][$i] == $_POST['productID']){
      $_SESSION['cartAmount'][$i] = $_SESSION['cartAmount'][$i] + $_POST['amount'];
      $_SESSION['itemAdded'] = true;
      $found = true;
    }
  }

  if($found == false){
    // There are so many things I should have done differently.
    // For example, 2D arrays. Oh well.
    $_SESSION['cart'][$_SESSION['numOfItems']] = $_POST['productID'];
    $_SESSION['cartAmount'][$_SESSION['numOfItems']] = $_POST['amount'];
    $_SESSION['cartName'][$_SESSION['numOfItems']] = $_POST['productName'];
    $_SESSION['price'][$_SESSION['numOfItems']] = $_POST['price'];
    $_SESSION['numOfItems']++;
    $_SESSION['itemAdded'] = true;
  }
  
  // Return to browse
  header('Location: searchResults.php');
?>


