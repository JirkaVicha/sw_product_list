<?php
// Connection to the database
$db_server = 'localhost';
$username = 'root';
$password = "";
$db_name = 'addproductDB';

$con = new mysqli($db_server, $username, $password, $db_name);

// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
// echo with message just for test, in Production give it away
// echo "Connected Successfully";


if (isset($_POST['submit'])) {
  // getting the post values from Form
  $sku = $_POST['sku'];
  $name = $_POST['name'];
  $price = $_POST['price'];
  $type = $_POST['type'];
  $size = $_POST['size'];
  $weight = $_POST['weight'];
  $height = $_POST['height'];
  $width = $_POST['width'];
  $length = $_POST['length'];

  
  // Query for Data insertion into main table
  $stmt = $con->prepare("INSERT INTO `products` (`sku`, `name`, `price`, `type`) VALUES (?, ?, ?, ?)");
  if (!$stmt) {
    throw new Exception("Duplicate Input");
  }
  try {
    $stmt->bind_param("ssdi", $sku, $name, $price, $type);
    if (!$stmt->execute()) {
      die("Execution failed: (" . $stmt->errno . ") " . $stmt->error);
  }
}
catch(Exception $e) {
  echo $e->getMessage() . '. Please, Enter unique SKU. <a href="addproduct.php">Add new product</a>';
}
  $stmt->close();

  $product_id = $con->insert_id;

  // Query for Data insertion into sub-tables
  switch ($type) {
    case "1":
      $new_type = "dvds";
      $stmt = $con->prepare("INSERT INTO " . $new_type . " VALUES (?, ?)");
      if (!$stmt) die("Prepare failed: (" . $con->errno . ")" . $con->error);
      $stmt->bind_param("id", $product_id, $size);
      break;
    case "2":
      $new_type = "books";
      $stmt = $con->prepare("INSERT INTO " . $new_type . " VALUES (?, ?)");
      if (!$stmt) die("Prepare failed: (" . $con->errno . ")" . $con->error);
      $stmt->bind_param("id", $product_id, $weight);
      break;
    case "3":
      $new_type = "furnitures";
      $stmt = $con->prepare("INSERT INTO " . $new_type . " VALUES (?, ?, ?, ?)");
      if (!$stmt) die("Prepare failed: (" . $con->errno . ")" . $con->error);
      $stmt->bind_param("iddd", $product_id, $height, $width, $length);
      break;
  }
  if (!$stmt->execute()) {
    die("Execution failed: (" . $stmt->errno . ") " . $stmt->error);
  }
  $stmt->close();
  $con->close();
  
  header("Location: index.php");
}
?>