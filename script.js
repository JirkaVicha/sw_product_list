
// Adding subfields after choosing the items by switcher
$(document).ready(function () {
  $("#type-switcher").change(function () {
    var type = $(this).val();
    if (type == "1") {
      $("#new-field").html('<div class="row mb-2" id="size"><label for="size" class="col-sm-2">Size (MB):</label><div class="col-sm-4"><input type="text" class="form-control" name="size" required></div></div>');
      $("#description").html('Please, provide the size of the DVD-disk in MB.');
    }
    if (type == "2") {
      $("#new-field").html('<div class="row mb-2" id="weight"><label for="weight" class="col-sm-2">Weight (Kg):</label><div class="col-sm-4"><input type="text" class="form-control" name="weight" required></div></div>');
      $("#description").html('Please, provide the weight of the book in Kg.');
    }
    if (type == "3") {
      $("#new-field").html('<div class="row mb-2" id="height"><label for="height" class="col-sm-2">Height (Cm):</label><div class="col-sm-4"><input type="text" class="form-control" name="height" required></div></div>' +
      '<div class="row mb-2" id="width"><label for="width" class="col-sm-2">Width (Cm):</label><div class="col-sm-4"><input type="text" class="form-control" name="width" required></div></div>' + 
      '<div class="row mb-2" id="length"><label for="length" class="col-sm-2">Length (Cm):</label><div class="col-sm-4"><input type="text" class="form-control" name="length" required></div></div>');
      $("#description").html('Please, provide the dimensions of the furniture in H x W x L.');
    }
    
  });
});




