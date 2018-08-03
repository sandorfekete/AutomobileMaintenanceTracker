<h2>Orders</h2>

<form id="frmFilters" method="post">
	<table class="list-container" cellspacing="0">
		<thead>
			<tr>
				<th>id</th>
				<th width="200">auto</th>
				<th>type</th>
				<th width="200">notes</th>
				<th>created</th>
				<th>modified</th>
				<th width="140">actions</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="7">
					<button class="button" type="button" onclick="AMT.addRecord()">ADD</button>
				</td>
			</tr>
			<tr>
				<td colspan="7" style="text-align:center">
					<div class="totals">TOTAL: <span class="filtered">filtered <span>0</span> of</span> <span class="total">0</span></div>
					<ul class="pagination">
					</ul>
				</td>
			</tr>
		</tfoot>
	</table>
	
	<input type="hidden" name="limitOffset" value="0" />
</form>

<form id="frmAction" class="hidden" method="post" action="<?php echo BASEURL ?>/orders/edit">
	<input type="hidden" name="_id" value="" />
</form>