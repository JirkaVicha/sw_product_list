<?php
// Define variables and set them to empty values
$skuErr = $nameErr = $priceErr = "";
$sku = $name = $price = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST['sku'])) {
    $skuErr = "SKU is required";
  } else {
    $sku = test_input($_POST['sku']);
  }
  
  if (empty($_POST['name'])) {
    $nameErr = "name is required";
  } else {
    $name = test_input($_POST['name']);
  }

  if (empty($_POST['price'])) {
    $priceErr = "price is required";
  } else {
    $price = test_input($_POST['price']);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>