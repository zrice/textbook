<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">


<?php
  session_start();

  if(!isset($_SESSION['email'])){
    require_once('header.html');
    echo "<div>
            <h3>Checkout</h3>
            <p>
              Please log in if you would like to check out.
            </p>
          </div>";
    require_once('footer.html');
    return;
  }

  // Include database functionality
  include('./dbconn.php');
  // Connect to the database (defined in dbconn.php)
  db_connect();

  $shippingCost = 0;
  $totalBeforeTax = 0;
  $total = 0;
  $tax = 0;
  $numberOfItems = 0;
  
  date_default_timezone_set('US/Eastern');
  $date = date('Y-m-d H:m:s');

  for($i=0; $i<$_SESSION['numOfItems']; $i++){
    $totalBeforeTax = $totalBeforeTax + ($_SESSION['price'][$i] * $_SESSION['cartAmount'][$i]);    
    $numberOfItems = $numberOfItems + $_SESSION['cartAmount'][$i];
  }

  // Get shipping cost
  if($numberOfItems < 10){
    $shippingCost = 3.95;
  } elseif($numberOfItems < 16){
    $shippingCost = 4.95;
  } elseif($numberOfItems < 21){
    $shippingCost = 5.45;
  } else {
    $shippingCost = 6.95;
  }

  $tax = ($totalBeforeTax + $shippingCost) * 0.06;
  $total = $tax + $totalBeforeTax + $shippingCost;

  $cquery = "INSERT INTO Orders
             (CustomerID, ShippingCost, Tax, Total, OrderDate)
             VALUES({$_SESSION['customerID']}, $shippingCost, $tax, $total, '$date')"; 
  mysqli_query($connection, $cquery);

  // Display invoice  
  $cquery = "SELECT MAX(OrderID) as temp FROM Orders
             WHERE CustomerID = {$_SESSION['customerID']}";
  $cresult = mysqli_query($connection, $cquery);
  $orderID = get_mysqli_result($cresult, 0, "temp");

  for($j=0; $j<$_SESSION['numOfItems']; $j++){
    $lineTotal = $_SESSION['price'][$j] * $_SESSION['cartAmount'][$j];
    $cquery = "INSERT INTO OrderDetails
               (OrderID, ProductID, Quantity, LineTotal)
               VALUES($orderID, '{$_SESSION['cart'][$j]}', {$_SESSION['cartAmount'][$j]}, $lineTotal);";
    mysqli_query($connection, $cquery);
  }

  unset($_SESSION['cart']);
  unset($_SESSION['numOfItems']);
  unset($_SESSION['cartAmount']);
  unset($_SESSION['cartName']);
  unset($_SESSION['price']);

  mysqli_close($connection);

  $_SESSION['order'] = $orderID;
  header('Location: viewOrderDetails.php');
  
?>


