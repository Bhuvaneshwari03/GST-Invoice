<?php

include('header.php');

?>
<script>
    function capitalizeInput(inputId) {
        var input = document.getElementById(inputId);
        input.value = input.value.toLowerCase().replace(/(?:^|\s)\S/g, function (a) {
            return a.toUpperCase();
        });
    }
</script>

<h1>Add Customer</h1>
<hr>

<div id="response" class="alert alert-success" style="display:none;">
	<a href="#" class="close" data-dismiss="alert">&times;</a>
	<div class="message"></div>
</div>

<form method="post" id="create_customer">
	<input type="hidden" name="action" value="create_customer">
	<div class="row">
		<div class="col-xs-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4>Customer Information</h4>
					<div class="clear"></div>
				</div>
				<div class="panel-body form-group form-group-sm">
					<div class="row">
						<div class="col-xs-6">
							<div class="form-group">
								<input type="text" class="form-control margin-bottom copy-input required" name="customer_name" id="customer_name" placeholder="Enter Name" tabindex="1" oninput="capitalizeInput('customer_name')">
							</div>
							<div class="form-group">
								<input type="text" class="form-control margin-bottom copy-input required" name="customer_address_1" id="customer_address_1" placeholder="Address 1" tabindex="3" oninput="capitalizeInput('customer_address_1')">	
							</div>
							<div class="form-group">
								<input type="text" class="form-control margin-bottom copy-input required" name="customer_town" id="customer_town" placeholder="Town/City" tabindex="5" oninput="capitalizeInput('customer_town')">		
							</div>
							<div class="form-group no-margin-bottom">
								<input type="text" class="form-control copy-input required" name="customer_postcode" id="customer_postcode" placeholder="GST IN" tabindex="7">					
							</div>
						</div>
						<div class="col-xs-6">
							<div class="input-group float-right margin-bottom">
								<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
								<input type="email" class="form-control copy-input " name="customer_email" id="customer_email" placeholder="Email" aria-describedby="sizing-addon1" tabindex="2">
							</div>
						    <div class="form-group">
						    	<input type="text" class="form-control margin-bottom copy-input" name="customer_address_2" id="customer_address_2" placeholder="Address 2" tabindex="4" oninput="capitalizeInput('customer_address_2')">
						    </div>
						    <div class="form-group">
						    	<input type="text" class="form-control margin-bottom copy-input required" name="customer_county" id="customer_county" placeholder="Country" tabindex="6" oninput="capitalizeInput('customer_county')" value="India">
						    </div>
						    <div class="form-group no-margin-bottom">
						    	<input type="text" class="form-control required" name="customer_phone" id="invoice_phone" placeholder="Phone Number" tabindex="8">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-6 text-right">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4>Shipping Information</h4>
				</div>
				<div class="panel-body form-group form-group-sm">
					<div class="row">
						<div class="col-xs-6">
							<div class="form-group">
								<input type="text" class="form-control margin-bottom required" name="customer_name_ship" id="customer_name_ship" placeholder="Enter name" tabindex="9">
							</div>
							<div class="form-group">
								<input type="text" class="form-control margin-bottom" name="customer_address_2_ship" id="customer_address_2_ship" placeholder="Address 2" tabindex="11">	
							</div>
							<div class="form-group no-margin-bottom">
								<input type="text" class="form-control required" name="customer_county_ship" id="customer_county_ship" placeholder="Country" tabindex="13" value="India">
							</div>
						</div>
						<div class="col-xs-6">
							<div class="form-group">
						    	<input type="text" class="form-control margin-bottom required" name="customer_address_1_ship" id="customer_address_1_ship" placeholder="Address 1" tabindex="10">
							</div>
							<div class="form-group">
								<input type="text" class="form-control margin-bottom required" name="customer_town_ship" id="customer_town_ship" placeholder="Town/City" tabindex="12">							
						    </div>
						    <div class="form-group no-margin-bottom">
						    	<input type="text" class="form-control required" name="customer_postcode_ship" id="customer_postcode_ship" placeholder="GST IN" tabindex="14">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 margin-top btn-group">
			<input type="submit" id="action_create_customer" class="btn btn-success float-right" value="Create Customer" data-loading-text="Creating...">
		</div>
	</div>
</form>

<?php
	include('footer.php');
?>
<script>
    // Define a function to convert text to title case (capitalize first letter of each word)
    function convertToTitleCase(event) {
        var input = event.target;
        // Check if the input ID is 'customer_email' or 'customer_postcode', if so, skip conversion
        if (input.id === 'customer_email' || input.id === 'customer_postcode') {
            return;
        }
        input.value = input.value.toLowerCase().replace(/(?:^|\s)\w/g, function(match) {
            return match.toUpperCase();
        });
    }

    // Attach the event listener to each input field except for 'customer_email' and 'customer_postcode'
    var textboxes = document.querySelectorAll("input[type='text']:not(#customer_email):not(#customer_postcode)");
    textboxes.forEach(function(textbox) {
        textbox.addEventListener("input", convertToTitleCase);
    });
</script>

