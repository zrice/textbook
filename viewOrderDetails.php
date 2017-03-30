<?php
  
  session_start();

  require_once("header.html");

  // Include database functionality
  include('./dbconn.php');

  // Connect to the database (defined in dbconn.php)
  db_connect();

  echo "<div>
          <h3>Order Invoice</h3>";

  if(isset($_POST['order'])){
    $_SESSION['order'] = $_POST['order'];
  }

  // Select all orders for the given user
  $cquery = "SELECT p.Name, od.Quantity, p.Price, od.LineTotal, o.OrderDate, o.Total
             FROM OrderDetails od
             INNER JOIN Orders o
             ON o.OrderID = od.OrderID
             INNER JOIN Products p
             ON p.ProductID = od.ProductID
             WHERE od.OrderID = {$_SESSION['order']}";
  $cresult = mysqli_query($connection,$cquery);
  $numCat = mysqli_num_rows($cresult);

  echo "<tr><td class=\"browse\" colspan = 1><strong>Product</strong></td>
          <td class=\"browse\" colspan = 1><strong>Quantity</strong></td>
          <td class=\"browse\" colspan = 1><strong>Price per Unit</strong></td>
          <td class=\"browse\" colspan = 1><strong>Line Total</strong></td></tr>";
  for($i=0; $i<$numCat; $i++) {
    // Get product information
    $name = get_mysqli_result($cresult, $i, "Name");
    $quantity = get_mysqli_result($cresult, $i, "Quantity");
    $price = get_mysqli_result($cresult, $i, "Price");
    $lineTotal = get_mysqli_result($cresult, $i, "LineTotal");
    $orderDate = get_mysqli_result($cresult, $i, "OrderDate");
    $total = get_mysqli_result($cresult, $i, "Total");

    // Print it in the table, along with an Add to Cart link
    echo "<tr><td class=\"browse\" colspan=1>$name </td>";
    echo "<td class=\"browse\">$quantity</td>";
    echo "<td class=\"browse\">\$$price</td>";
    echo "<td class=\"browse\">\$$lineTotal</td></tr>";
  }  
  echo "<tr>
          <td class=\"browse\" colspan=2>  
            <strong>Order placed:</strong> $orderDate</br>
          </td>
          <td class=\"browse\" colspan=2>
            <strong>Order total:</strong> \$$total<br/>
          </td>
        </tr>
      </div>";

  db_close();
  require_once("footer.html");
?>
