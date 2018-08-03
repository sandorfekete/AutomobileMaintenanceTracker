<h2>Edit Order (#<?php echo $id ?>)</h2>

<div id="editOrder" class="wrapper">
	
	<fieldset id="automobileDetails">
		<legend>Automobile Details</legend>
		<form>
			<label>Year:
				<input readonly="readonly" value="<?php echo $automobile['year'] ?>" />
			</label>
			<label>Make:
				<input readonly="readonly" value="<?php echo $automobile['make'] ?>" />
			</label>
			<label>Model:
				<input readonly="readonly" value="<?php echo $automobile['model'] ?>" />
			</label>
			<label>Odometer(km):
				<input readonly="readonly" value="<?php echo $automobile['odometer'] ?>" />
			</label>
			<label>Colour:
				<input readonly="readonly" value="<?php echo $automobile['colour'] ?>" />
			</label>
			<label>Plate:
				<input readonly="readonly" value="<?php echo $automobile['plate'] ?>" />
			</label>
			<label>Type:
				<input readonly="readonly" value="<?php echo $automobile['type'] ?>" />
			</label>
		</form>
	</fieldset>

	<fieldset id="orderDetails">
		<legend>Order Details</legend>

		<form id="frmEdit" method="post" action="<?php echo BASEURL.'/'.CONTROLLER ?>" onsubmit="return AMT.Form.validateForm(this)">

			<label>Order Type:
				<?php echo $order_types ?>
			</label>

			<label>Notes:
				<textarea name="notes" class="data required"><?php echo $order->get('notes') ?></textarea>
			</label>

			<label>Odometer(km):
				<input type="text" name="odometer" class="data digits required" value="<?php echo $order->get('odometer') ?>" />
			</label>
			
			<label>Date Created:
				<input type="text" readonly="readonly" value="<?php echo $order->get('date_created') ?>" />
			</label>

			<label>Date Modified:
				<input type="text" readonly="readonly" value="<?php echo $order->get('date_modified') ?>" />
			</label>
			
			<div class="center">
				<hr>
				<button class="button submit" data-button-text="SAVE" type="submit">SAVE</button>
				<button class="button" type="button" onclick="AMT.cancel()">CANCEL</button>
			</div>

			<div class="clear"></div>

			<div class="loader"></div>
			<div class="messages"></div>

			<input type="hidden" name="_id" value="<?php echo $id ?>" />
			<input type="hidden" name="task" value="submitOrder" />

		</form>	
	</fieldset>
	
</div>
