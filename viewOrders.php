<?php
  
  session_start();

  require_once("header.html");

  // Include database functionality
  include('./dbconn.php');

  // Connect to the database (defined in dbconn.php)
  db_connect();

  if(isset($_SESSION['email'])){
    echo "<div>
            <h3>View Your Orders</h3>";
    
    // Select all orders for the given user
    $cquery = "SELECT OrderID, OrderDate, ShippingCost, Tax, Total
               FROM Orders
               WHERE CustomerID = {$_SESSION['customerID']}";
    $cresult = mysqli_query($connection,$cquery);
    $numCat = mysqli_num_rows($cresult);

    if ($numCat == 0) { 
      echo "<p>You have placed no orders, {$_SESSION['name']}!<br/>";
    } 
    else { 
      echo "<tr><td class=\"browse\" colspan = 1><strong>Order ID - Order Date</strong></td>
              <td class=\"browse\" colspan = 1><strong>Shipping - Tax</strong></td>
              <td class=\"browse\" colspan = 1><strong>Total</strong></td>
              <td class=\"browse\" colspan = 1><strong>View Invoice</strong></td></tr>";
      for($i=0; $i<$numCat; $i++) {
        // Get product information
        $orderID = get_mysqli_result($cresult, $i, "OrderID");
        $orderDate = get_mysqli_result($cresult, $i, "OrderDate");
        $shippingCost = get_mysqli_result($cresult, $i, "ShippingCost");
        $tax = get_mysqli_result($cresult, $i, "Tax");
        $total = get_mysqli_result($cresult, $i, "Total");
 
        // Print it in the table, along with an Add to Cart link
        echo "<tr><td class=\"browse\" colspan=1>$orderID <strong>-</strong>  $orderDate</td>";
        echo "<td class=\"browse\">\$$shippingCost <strong>-</strong> \$$tax</td>";
        echo "<td class=\"browse\">\$$total</td>";
        echo "<td class=\"browse\">
                <form method=\"post\" action=\"viewOrderDetails.php\">
                  <input type=\"hidden\" value=\"$orderID\" name=\"order\" />
                  <input type=\"submit\" value=\"View\" />
                </form>
              </td></tr>";
      }  
      echo "<br/>";
    }
    echo "</div>";
  }
  else {
    echo "<div>
            <h3> View Your Orders</h3>
            <p>
              You are not logged in.  Please log in if you would like to see your orders.
            </p>
          </div>";
  }

  db_close();
  require_once("footer.html");
?>
