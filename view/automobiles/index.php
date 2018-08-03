<h2>Automobiles</h2>

<p class="note"><span>**NOTE** :</span> Automobiles cannot be deleted due to their dependency from Orders. Must ADD new ones.</p>

<form id="frmFilters" method="post">
	<table class="list-container" cellspacing="0">
		<thead>
			<tr>
				<th>id</th>
				<th>year</th>
				<th>make</th>
				<th>model</th>
				<th>plate</th>
				<th>type</th>
				<th>colour</th>
				<th>odometer(km)</th>
				<th>created</th>
				<th>modified</th>
				<th width="70">actions</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="11">
					<button class="button" type="button" onclick="AMT.addRecord()">ADD</button>
				</td>
			</tr>
			<tr>
				<td colspan="11" style="text-align:center">
					<div class="totals">TOTAL: <span class="filtered">filtered <span>0</span> of</span> <span class="total">0</span></div>
					<ul class="pagination">
					</ul>
				</td>
			</tr>
		</tfoot>
	</table>
	
	<input type="hidden" name="limitOffset" value="0" />
</form>

<form id="frmAction" class="hidden" method="post" action="<?php echo BASEURL.'/'.CONTROLLER.'/edit' ?>">
	<input type="hidden" name="_id" value="" />
</form>
