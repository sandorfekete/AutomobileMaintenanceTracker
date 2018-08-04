<h2>Edit Automobile (#<?php echo $id ?>)</h2>

<div id="editAutomobile" class="wrapper">
    <fieldset>
        <legend>Automobile Details</legend>

        <form id="frmEdit" method="post" action="<?php echo BASEURL . '/' . CONTROLLER ?>" onsubmit="return AMT.Form.validateForm(this)">

            <label>Year:
                <input type="text" name="year" class="data digits required" value="<?php echo $automobile->get('year') ?>" />
            </label>

            <label>Make:
                <?php echo $automobile_makes ?>
            </label>

            <label>Model:
                <input type="text" name="model" class="data required" value="<?php echo $automobile->get('model') ?>" />
            </label>

            <label>Type:
                <?php echo $automobile_types ?>
            </label>

            <label>Colour:
                <input type="text" name="colour" class="data required" value="<?php echo $automobile->get('colour') ?>" />
            </label>

            <label>Plate:
                <input type="text" name="plate" class="data required" value="<?php echo $automobile->get('plate') ?>" />
            </label>

            <label>Original Odometer(km):
                <input type="text" name="odometer" readonly="readonly" value="<?php echo $automobile->get('odometer') ?>" />
            </label>

            <label>Date Created:
                <input type="text" readonly="readonly" value="<?php echo $automobile->get('date_created') ?>" />
            </label>

            <label>Date Modified:
                <input type="text" readonly="readonly" value="<?php echo $automobile->get('date_modified') ?>" />
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
            <input type="hidden" name="task" value="submitAutomobile" />

        </form>	

    </fieldset>
</div>
