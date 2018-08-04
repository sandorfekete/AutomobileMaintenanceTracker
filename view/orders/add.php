<h2>Add Order</h2>

<div id="addOrder" class="wrapper">
    <fieldset>
        <legend>Order Details</legend>

        <form id="frmAdd" method="post" action="<?php echo BASEURL . '/' . CONTROLLER ?>" onsubmit="return AMT.Form.validateForm(this)">

            <label>Automobile:
                <?php echo $automobiles ?>
            </label>

            <label>Order Type:
                <?php echo $order_types ?>
            </label>

            <label>Notes:
                <textarea name="notes" class="data required"></textarea>
            </label>

            <label>Odometer(km):
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

            <input type="hidden" name="task" value="submitOrder" />

        </form>	
    </fieldset>
</div>
