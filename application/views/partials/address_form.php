
<form id= "shipping" action="/addresses/process_customer" method="post">
	<div class="form-group">
		<label>First Name:</label>
		<input type="text" class="form-control" name="first_name"
		<?php if (!$new_address){ 
			  echo "value='".$this->session->userdata('first_name')."'"; 

		}   ?>
		>
	</div>
	<div class="form-group">
		<label>Last Name:</label>
		<input type="text" class="form-control" name="last_name"
		<?php if (!$new_address){ 
			  echo "value='".$this->session->userdata('last_name')."'"; 
		}   ?>
		>
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="text" class="form-control" name="email"
		<?php if (!$new_address){ 
			  echo "value='".$this->session->userdata('email')."'"; 
		}   ?>
		>
	</div>
	<div class="form-group">
		<label>Street Name:</label>
		<input type="text" class="form-control" name="street"
		<?php if (!$new_address){ 
			  echo "value='".$street."'"; 
		}   ?>
		>
	</div>
	<div class="form-group">
		<label>Apt or Suite No.:</label>
		<small>(optional)</small>
		<input type="text" class="form-control" name="apt_suite"
		<?php if (!$new_address){ 
			  echo "value='".$apt_suite."'"; 
		}   ?>
		>
	</div>
	<div class="form-group">
		<label>City:</label>
		<input type="text" class="form-control" name="city"
		<?php if (!$new_address){ 
			  echo "value='".$city."'"; 
		}   ?>
		>
	</div>
	<div class="form-group">
		<label>State:</label>
		<small>(Abbreviations e.g. WA)</small>
		<input type="text" class="form-control" name="state"
		<?php if (!$new_address){ 
			  echo "value='".$state."'"; 
		} ?>
		>

	</div>
	<div class="form-group">
		<label>Zip Code:</label>
		<input type="text" class="form-control" name="zip_code"
		<?php if (!$new_address){ 
			  echo "value='".$zip_code."'"; 
		}   ?>
		>
	</div>
	<input type="submit" class="btn btn-default" value="Submit">
</form>