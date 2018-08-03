<h2>Add Automobile</h2>

<div id="addOrder" class="wrapper">
	<fieldset>
		<legend>Automobile Details</legend>

		<form id="frmAdd" method="post" action="<?php echo BASEURL.'/'.CONTROLLER ?>" onsubmit="return AMT.Form.validateForm(this)">

			<label>Year:
				<input type="text" name="year" class="data digits required" value="" />
			</label>
			
			<label>Make:
				<?php echo $automobile_makes ?>
			</label>
			
			<label>Model:
				<input type="text" name="model" class="data required" value="" />
			</label>
			
			<label>Type:
				<?php echo $automobile_types ?>
			</label>

			<label>Colour:
				<input type="text" name="colour" class="data required" value="" />
			</label>
			
			<label>Plate:
				<input type="text" name="plate" class="data required" value="" />
			</label>
			
			<label>Odometer:
				<input type="text" name="odometer" class="data digits required" value="" />
			</label>
			
			<div class="center">
				<hr>
				<button class="button submit" data-button-text="SAVE" type="submit">SAVE</button>
				<button class="button" type="button" onclick="AMT.cancel()">CANCEL</button>
			</div>

			<div class="clear"></div>

			<div class="loader"></div>
			<div class="messages"></div>

			<input type="hidden" name="task" value="submitAutomobile" />

		</form>	
	</fieldset>
</div>