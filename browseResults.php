<?php
  session_start();
  
  if(isset($_POST['category'])){
    $_SESSION['browse'] = $_POST['category'];
  }
  
  require_once("header.html");

  // Include database functionality
  include('./dbconn.php');

  // Connect to the database (defined in dbconn.php)
  db_connect();

  // Import the style sheet
  echo " <link rel=\"stylesheet\" type=\"text/css\" href=\"style.css\"/>";

  // Select all products from the DB that match the POSTed category
  $cquery = "SELECT p.Name, p.ProductID, p.Price FROM Products p 
             WHERE p.CategoryID in (SELECT CategoryID FROM Categories c 
                                    WHERE c.CategoryName = '{$_SESSION['browse']}')";
  $cresult = mysqli_query($connection,$cquery);
  $numCat = mysqli_num_rows($cresult);

  echo "<h3>Showing category: {$_SESSION['browse']}</h3>";

  if(isset($_SESSION['itemAdded'])) {
    unset($_SESSION['itemAdded']);
    echo "{$_SESSION['cartName'][$_SESSION['numOfItems'] - 1]} added to cart!</br></br>";
  }

  for($i=0; $i<$numCat; $i++) {  
    // Get product information
    $prodName = get_mysqli_result($cresult, $i, "Name");
    $ProductID = get_mysqli_result($cresult, $i, "ProductID");
    $Price = get_mysqli_result($cresult, $i, "Price");
 
    // Output each product in the table, along with an Add to Cart link
    echo "<tr>
            <td class=\"browse\" colspan=1>$prodName</td>
            <td class=\"browse\">\$$Price</td>
            <td class=\"browse\">
              <form method=\"post\" action = \"browseToCart.php\">
                <input type = \"text\" name = \"amount\" required></input>        
           </td>
           <td class=\"browse\">
                <input type = \"submit\" value = \"Add to cart\" />
                <input type = \"hidden\" value = \"$ProductID\" name = \"productID\"/>
                <input type = \"hidden\" value = \"$prodName\" name = \"productName\"/>
                <input type = \"hidden\" value = \"$Price\" name = \"price\" />
              </form>
            </td>
          </tr>";
  }  
  echo "<br/>";
    
  echo "<tr><td class=\"tbody\" colspan=4>";
  echo "</br><a href=\"browse.php\">Browse a different category</a></br></br>";
  echo "</td></tr>";

  db_close();
  require_once("footer.html");
?>
