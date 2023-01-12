<?php
// Fetch the record from the database
$get_data = $con->query("SELECT products.product_id, sku, name, price, size,
                        weight, height, width, length FROM products
                        LEFT JOIN dvds ON products.product_id = dvds.product_id
                        LEFT JOIN books ON products.product_id = books.product_id
                        LEFT JOIN furnitures ON products.product_id = furnitures.product_id
                        ORDER BY products.product_id");
$row = mysqli_num_rows($get_data);
if ($row > 0) {
  while ($row = mysqli_fetch_assoc($get_data)) {
  // Display Product CARDS
?>
  
    <div class="card" style="width: 20rem;">
      <div class="card-body">
          <div class="text-center">
            <h5 class="card-title"><?php echo $row['sku'];?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?php echo $row['name'];?></h6>
            <p class="card-text"><?php echo $row['price'];?> $</p>
            
            <?php if (!empty($row['size'])) { ?> <h6 class="card-subtitle mb-2 text-muted"><?php echo $row['size'];?> MB <?php }?></h6>

            <?php if (!empty($row['weight'])) { ?> <h6 class="card-subtitle mb-2 text-muted"><?php echo $row['weight'];?> Kg <?php }?></h6>

            <?php if (!empty($row['height']) || (!empty($row['width']) || (!empty($row['length'])))) 
                      { ?> <h6 class="card-subtitle mb-2 text-muted">Dimensions: <?php echo $row['height'];?> x 
                                                                                <?php echo $row['width'];?> x
                                                                                <?php echo $row['length'];?> Cm
                      <?php }?></h6>

            <input class="form-check-input" form='delete_form' name="delete_form[]" type="checkbox" value="<?php echo $row['product_id'];?>" id="delete_form">
           <label class="form-check-label text-muted" for="defaultCheck1">Select</label>
          </div>
        </div>
      </div>
  
<?php 
}
}
$con->close();
?>



</div>