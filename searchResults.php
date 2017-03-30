<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<?php
  session_start();
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<script type = "text/javascript">
  <!--
  function validate() {
    return false;
    var amount = "";
    amount = document.getElementsByName("amount")[0].value;

    if(isNaN(amount)) == true) {
      alert('The amount entered must be numeric');
      document.getElementsByName("amount")[0].focus();
      return false;
    }
  }  
  // -->
</script>

<?php
  if(isset($_POST['itemName'])){
    $_SESSION['search'] = $_POST['itemName'];
  }

  require_once("header.html");
 
  // Include database functionality
  include('./dbconn.php');

  // Connect to the database (defined in dbconn.php)
  db_connect();

  // Select all products that match the POSTed search query
  $cquery = "SELECT * FROM Products WHERE Name LIKE '%{$_SESSION['search']}%'";
  $cresult = mysqli_query($connection,$cquery);
  $numCat = mysqli_num_rows($cresult);

  echo " <link rel=\"stylesheet\" type=\"text/css\" href=\"style.css\"/>";

  if ($numCat == 0) { 
    echo "<p>There are no products that match your search!<br/><br/>";
  } 
  else { 
    echo "<h3>Showing results for: {$_SESSION['search']}</h3>";
    
    if(isset($_SESSION['itemAdded'])) {
      unset($_SESSION['itemAdded']);
      echo "{$_SESSION['cartName'][$_SESSION['numOfItems'] - 1]} added to cart!</br></br>";
    }
    
    for($i=0; $i<$numCat; $i++) {
      // Get product information
      $prodName = get_mysqli_result($cresult, $i, "Name");
      $ProductID = get_mysqli_result($cresult, $i, "ProductID");
      $Price = get_mysqli_result($cresult, $i, "Price");
 
      // Print it in the table, along with an Add to Cart link
      echo "<tr><td class=\"browse\" colspan=1>$prodName</td>
              <td class=\"browse\">\$$Price</td>
              <td class=\"browse\">
                <form method=\"post\" action=\"searchToCart.php\" onSubmit=\"return validate();\" >
                  <input type=\"text\" name=\"amount\" required></input>
              </td>
              <td class=\"browse\">
                  <input type=\"submit\" value=\"Add to cart\" \>
                  <input type=\"hidden\" value = \"$ProductID\" name = \"productID\"/>
                  <input type=\"hidden\" value = \"$prodName\" name = \"productName\"/>
                  <input type=\"hidden\" value = \"$Price\" name = \"price\" />
              </td>
                </form>
            </tr>";
    } 
    echo "<br/>";
  }
  // Print a table row containing a link to search again
  echo "<tr><td class=\"tbody\" colspan=4>";
  echo "</br><a href=\"search.php\">Search a different category</a></br></br>";
  echo "</td></tr>";

  db_close();
  require_once("footer.html");
?>
