<?php
include('header.php');
?>


<h2>Add Product</h2>
<hr>

<div id="response" class="alert alert-success" style="display:none;">
	<a href="#" class="close" data-dismiss="alert">&times;</a>
	<div class="message"></div>
</div>
						
<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>Product Information</h4>
			</div>
			<div class="panel-body form-group form-group-sm">
				<form method="post" id="add_product">
					<input type="hidden" name="action" value="add_product">

					<div class="row">
						<div class="col-xs-3">
							<input type="text" class="form-control required" name="product_name" id="product_name" placeholder="Enter Product Name" >
						</div>
						<div class="col-xs-3">
							<div class="input-group">
								<input type="number" name="product_gst" class="form-control required" placeholder="GST (10%)">
							</div>
						</div>
						<div class="col-xs-3">
							<div class="input-group">
								<span class="input-group-addon">₹</span>
								
								<input type="number" name="product_price" class="form-control required" placeholder="0.00" aria-describedby="sizing-addon1">
							</div>
						</div>
						<div class="col-xs-3">
							<input type="text" class="form-control required" name="product_desc" id="product_desc" placeholder="Enter Product Description">
						</div>
						
					</div>
					<div class="row">
						<div class="col-xs-12 margin-top btn-group">
							<!-- <button class="btn btn-success float-left" onclick="addMore()">Add More</button> -->
							<input type="submit" id="action_add_product" class="btn btn-success float-right" value="Add Product" data-loading-text="Adding...">
						</div>
						<script>
    function addMore() {
        location.reload(true); // This will force a page refresh
    }
</script>

					</div>
				</form>
			</div>
		</div>
	</div>
<div>

<?php
	include('footer.php');
?>
<script>
    // Define a function to convert text to title case (capitalize first letter of each word)
    function convertToTitleCase(event) {
        var input = event.target;
        // Check if the input ID is 'product_name3', if so, skip conversion
        if (input.id === 'customer_email') {
            return;
        }
        input.value = input.value.toLowerCase().replace(/(?:^|\s)\w/g, function(match) {
            return match.toUpperCase();
        });
    }

    // Attach the event listener to each input field except for 'product_name3'
    var textboxes = document.querySelectorAll("input[type='text']:not(input[type='email'])");
    textboxes.forEach(function(textbox) {
        textbox.addEventListener("input", convertToTitleCase);
    });
</script>
