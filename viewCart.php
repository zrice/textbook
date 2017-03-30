<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<?php
  session_start();

  require_once("header.html");

  echo "<div>
          <h3> View Cart / Checkout</h3>
          <p>";
  if(isset($_SESSION['cart'][0])){
    echo "<tr>
            <td class=\"browse\"><strong>Product ID</strong></td>
            <td class=\"browse\"><strong>Amount</strong></td>
            <td class=\"browse\"><strong>Price per Unit</strong></td>
            <td class=\"browse\"><strong>Remove from Cart</strong></td>
          </tr>";
    for($i=0; $i<$_SESSION['numOfItems']; $i++){
      echo "<tr>
              <td class=\"browse\">{$_SESSION['cartName'][$i]}</td>
              <td class=\"browse\">{$_SESSION['cartAmount'][$i]}</td>
              <td class=\"browse\">\${$_SESSION['price'][$i]}</td>
              <td class=\"browse\">
                <form method=\"post\" action=\"removeFromCart.php\">
                  <input type=\"submit\" value=\"Remove\" />
                  <input type=\"hidden\" value=\"$i\" name=\"remove\" />
                </form>
              </td>
            </tr>";
    }
    echo "<tr>
            <td class = \"browse\"/>
            <td class=\"browse\">
              <form method=\"post\" action=\"destroyCart.php\">
                <input type=\"submit\" value=\"Destroy Cart\" />
              </form>
            </td>
            <td class=\"browse\"1>
              <form method=\"post\" action=\"checkout.php\">
                <input type=\"submit\" value=\"Checkout\" />
              </form>
            </td>
            <td class = \"browse\"/>
          </tr>";
  }
  else{
    echo "Your cart is empty.";
  }

  echo "</p>";
  
  require_once("footer.html");
?>
