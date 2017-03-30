<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<?php
  session_start();
  
  $i = $_POST['remove'];

  unset($_SESSION['cart'][$i]);
  unset($_SESSION['numOfItems'][$i]);
  unset($_SESSION['cartAmount'][$i]);
  unset($_SESSION['cartName'][$i]);
  unset($_SESSION['price'][$i]);

  for($i; $i<$_SESSION['numOfItems']-1; $i++){
  $_SESSION['cart'][$i] = $_SESSION['cart'][$i+1];
  $_SESSION['cartAmount'][$i] = $_SESSION['cartAmount'][$i+1];
  $_SESSION['cartName'][$i] = $_SESSION['cartName'][$i+1];
  $_SESSION['price'][$i] = $_SESSION['price'][$i+1];
  }
  $_SESSION['numOfItems']--;

  header('Location: viewCart.php');
?>
