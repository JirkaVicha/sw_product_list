<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js" integrity="sha512-1/RvZTcCDEUjY/CypiMz+iqqtaoQfAITmNSJY17Myp4Ms5mdxPS5UV7iOfdZoxcGhzFbOm6sntTKJppjvuhg4g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="style.css" type="text/css" rel="stylesheet" />
  <title>Add Product</title>
</head>

<body>
    <div class="container">
<!--HEADER-->
<?php
require_once('add_product_header.php'); 
// database connection File
require_once('connection_db.php');
//require_once('form_validation.php');
?>
    <!--FORM-->
    <form id="product_form" class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
  
    <div class="row mb-2">
      <label for="sku" class="col-sm-2">SKU:</label>
        <div class="col-sm-4">
          <input id="sku" type="text" class="form-control" name="sku" required>
        </div>  
    </div>

    <div class="row mb-2">
      <label for="name" class="col-sm-2">Name:</label>
        <div class="col-sm-4">
          <input id="name" type="text" class="form-control" name="name" required>
        </div>
    </div>

    <div class="row mb-2">
      <label for="price" class="col-sm-2">Price ($):</label>
        <div class="col-sm-4">
          <input id="price" type="text" class="form-control" name="price" required>
        </div>
    </div>

    <div class="row mb-2">
      <label for="type-switcher" class="col-sm-2">Type Switcher:</label>
        <div class="col-sm-4">
          <select class="form-select" id="productType" name="type">
            <option selected>Choose...</option>
            <option id="DVD" value="1">DVD</option>
            <option id="Book" value="2">Book</option>
            <option id="Furniture" value="3">Furniture</option>
          </select>
        </div>
    </div>
    
    <div id="new-field"></div>
    <div id="description"></div>
  </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
<script src="script.js"></script>

  </body>
</html>
