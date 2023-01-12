<?php

if (isset($_POST['delete-product-btn'])) {
  require_once('connection_db.php');

  // Delete records

  if (isset($_POST['delete_form'])) {
    $arr = $_POST['delete_form'];
    foreach ($arr as $id) {
      $result = mysqli_query($con, "DELETE FROM products WHERE product_id = " . $id);
  }
  $msg = "Deleted Successfully.";
  header("Location: index.php?msg=$msg");
}
}
?>