<?php

?>

<h2>Edit Customer</h2>

<form id="frmEdit" method="post" action="<?php echo BASEURL ?>/customers" onsubmit="return AMT.Form.validateForm(this)">
	
	<label>First Name:
		<input type="text" name="firstName" data-error-label="First Name" class="data required" />
	</label>
	
	<label>Last Name:
		<input type="text" name="lastName" data-error-label="Last Name" class="data required" />
	</label>
	
	<label>Email:
		<input type="text" name="email" data-error-label="Email" class="data email required" />
	</label>
	
	<label>Subject:
		<select name="subject" class="data required">
			<option value="General">General</option>
			<option value="Site Feedback">Site Feedback</option>
			<option value="Sponsorship">Sponsorship</option>
			<option value="Business Enquiry">Business Enquiry</option>
			<option value="Testimonial">Testimonial</option>
		</select>
	</label>
	
	<label>Message:
		<textarea name="message" data-error-label="Message" class="data required"></textarea>
	</label>
	
	<button class="button submit" type="submit">SEND</button>
	<button class="button" onclick="location.href = '<?php echo BASEURL ?>/customers'">CANCEL</button>
	
	<br class="clear">
	
	<div class="loader"></div>
	<div class="messages"></div>
	
	<input type="hidden" name="id" value="" />
	<input type="hidden" name="task" value="submitCustomer" />
	
</form>	