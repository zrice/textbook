<?php

$connection;

// connect to the bookstore DB
function db_connect() {
   $DB_NAME = "eburg118_db";
   $DB_HOST = "localhost";
   $DB_USER = "eburg118";
   $DB_PASS = "ThUYu4ux";

   // global keyword required to make variable have global scope 
   global $connection;
      
   $connection = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME)
      or die("Cannot connect to $DB_HOST as $DB_USER:" . mysqli_error($connection));
}  // end function db_connect


// close connection to bookstore DB
function db_close() {
   global $connection;
   mysqli_close($connection);
}  // end function db_close

// replacement for mysql_result
function get_mysqli_result($result, $number, $field) {
   mysqli_data_seek($result, $number);
   $row = mysqli_fetch_assoc($result);
   return $row[$field];
}
?>
