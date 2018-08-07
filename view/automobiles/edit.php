<h2>Edit Automobile (#<?php echo $id ?>)</h2>

<div id="editAutomobile" class="wrapper">
    <fieldset>
        <legend>Automobile Details</legend>

        <form id="frmEdit" method="post" action="<?php echo BASEURL . '/' . CONTROLLER ?>" onsubmit="return AMT.Form.validateForm(this)">

            <label>Year:
                <input type="text" name="year" class="data digits required" value="<?php echo $year ?>" />
            </label>

            <label>Make:
                <?php echo $makes ?>
            </label>

            <label>Model:
                <input type="text" name="model" class="data required" value="<?php echo $model ?>" />
            </label>

            <label>Type:
                <?php echo $types ?>
            </label>

            <label>Colour:
                <input type="text" name="colour" class="data required" value="<?php echo $colour ?>" />
            </label>

            <label>Plate:
                <input type="text" name="plate" class="data required" value="<?php echo $plate ?>" />
            </label>

            <label>Original Odometer(km):
                <input type="text" name="odometer" readonly="readonly" value="<?php echo $odometer ?>" />
            </label>

            <label>Date Created:
                <input type="text" readonly="readonly" value="<?php echo $date_created ?>" />
            </label>

            <label>Date Modified:
                <input type="text" readonly="readonly" value="<?php echo $date_modified ?>" />
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
