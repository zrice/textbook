<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<?php
  session_start();

  unset($_SESSION['cart']);
  unset($_SESSION['numOfItems']);
  unset($_SESSION['cartAmount']);
  unset($_SESSION['cartName']);
  unset($_SESSION['price']);

  require_once("header.html");

  echo "<div>
          <h3> View Cart / Checkout</h3>
          <p>
            Your cart has been destroyed.
          </p>";
  
  require_once("footer.html");
?>
