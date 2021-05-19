<?php
// include database connection file
include_once("config.php");
 
// Get id from URL to delete that user
$product_id = $_GET['product_id'];
 
// Delete user row from table based on given id
$result = mysqli_query($mysqli, "DELETE FROM produk WHERE product_id=$product_id");
 
// After delete redirect to Home, so that latest user list will be displayed.
header("Location:index.php");
?>
