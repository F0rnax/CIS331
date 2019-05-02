<?php include $header; ?>

<div id="master">
    <div id="main-container">

        <?php
        if ($sailor == '')
        {
            $heading_text = "Add Sailor";
        }
        else
        {
            $heading_text = "Edit Sailor";
        }
        ?>
        <h2>Sailors - <?php echo $heading_text; ?></h2>
        <br />

        <div id="nav-container-left">
            <ul>
                <br></br>
                <br></br>
                <br></br>
                <br></br>                
                <br></br>
                <br></br>
                <br></br>
            </ul>
        </div>
        <div id ="content">

            <form action="index.php" method="post" id="add_edit_sailor_form">            

                <?php if ($sailor == '') : ?>
                    <input type="hidden" name="action" value="add_sailor" />
<?php else: ?>
                    <input type="hidden" name="action" value="update_sailor" />
                    <input type="hidden" name="SID"
                           value="<?php echo $sailor['SID']; ?>" />
<?php endif; ?>

                <label for="SID">Sailor ID:</label>
                <input name ="SID" type="text" STYLE="background-color: yellow" 
                       <?php if (!($sailor == "")): ?>
                           value="<?php echo $sailor['SID']; ?>" readonly="readonly" 
<?php endif; ?>
                       />
                <label>(yellow = req'd)</label>
                <br />
                
                <label for="SNAME">Sailor Name:</label>
                <input name ="SNAME" type="text" STYLE="background-color: yellow" 
                       <?php if (!($sailor == "")): ?>
                           value="<?php echo $sailor['SNAME']; ?>" 
<?php endif; ?>
                       />
                <label>(yellow = req'd)</label>
                <br />
                
                <label for="RATING">Sailor Rating:</label>
                <input name ="RATING" type="text" STYLE="background-color: yellow" 
                       <?php if (!($sailor == "")): ?>
                           value="<?php echo $sailor['RATING']; ?>" 
<?php endif; ?>
                       />
                <label>(yellow = req'd)</label>
                <br />
                
                <label for="AGE">Sailor Age:</label>
                <input name ="AGE" type="text" STYLE="background-color: yellow" 
                       <?php if (!($sailor == "")): ?>
                           value="<?php echo $sailor['AGE']; ?>" 
<?php endif; ?>
                       />
                <label>(yellow = req'd)</label>
                <br />
                
                <label for="TRAINEE">Trainee</label>
                <input name ="TRAINEE" type="text" STYLE="background-color: yellow" 
                       <?php if (!($sailor == "")): ?>
                           value="<?php echo $sailor['TRAINEE']; ?>" readonly="readonly" 
    <?php endif; ?>
                       />
                <label>(yellow = req'd)</label>
                <br />

                <label>&nbsp;</label>
                <input type="submit" value="Add Sailor" />
                <a href="?action=display">Cancel</a>
                <br />  
                <br />
            </form>
        </div>
    </div>

<?php include $footer; ?>