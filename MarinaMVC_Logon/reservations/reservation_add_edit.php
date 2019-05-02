<?php
include $header;
$sailors = get_sailors();
?>

<div id="master">
    <div id="main-container">

        <?php
        if ($reservation == '')
        {
            $heading_text = "Add Reservation";
        }
        else
        {
            $heading_text = "Edit Reservation";
        }
        ?>
        <h2>Reservations - <?php echo $heading_text; ?></h2>
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

            <form action="index.php" method="post" id="add_edit_reservation_form">            

                <?php if ($reservation == '') : ?>
                    <input type="hidden" name="action" value="add_reservation" />
                <?php else: ?>
                    <input type="hidden" name="action" value="update_reservation" />
                    <input type="hidden" name="boat_ID"
                           value="<?php echo $reservation['BID']; ?>" />
                    <input type="hidden" name="reservation_date"
                           value="<?php echo $reservation['forDate']; ?>" />
                       <?php endif; ?>

                <label for="boat_ID">Boat ID:</label>
                <input name ="boat_ID" type="text" STYLE="background-color: yellow" 
                <?php if (!($reservation == "")): ?>
                           value="<?php echo $reservation['BID']; ?>" readonly="readonly" 
                       <?php endif; ?>
                       />
                <label>(yellow = req'd)</label>
                <br />

                <label for="sailor_ID">Sailor:</label>
                <select name="sailor_ID">
                    <?php
                    $row_count = $sailors->num_rows;

                    for ($i = 0; $i < $row_count; $i++) :
                        $sailor = $sailors->fetch_assoc();
                        ?>

                        <option value="<?php echo $sailor['SID']; ?>"
                        <?php if (!($reservation == "") && $sailor['SID'] == $reservation['SID']):
                            echo "selected ";
                            ?> 
                                    <?php endif; ?>><?php
                                    echo $sailor['SNAME']; ?>
                                    </option>

                                    <?php
                                endfor;
                                ?>
                </select>
                <br />
                
                <?php
                date_default_timezone_set('EST');
                $defaultDate = date('m/d/Y');
                ?>
                <label for="reservation_date">Reservation Date:</label>
                <input name ="reservation_date" type="date" STYLE="background-color: yellow" 
                <?php if ($reservation == ""): ?>
                    value="<?php echo $defaultDate; ?>"                             <?php else: ?>
                    value="<?php echo $reservation['forDate']; ?>" readonly="readonly"
                <?php endif; ?>
                 />
                <label>("MM/DD/YYYY")</label>
                <br />

                <label>&nbsp;</label>
                <input type="submit" value="Make Reservation" />
                <a href="?action=display">Cancel</a>
                <br />  
                <br />
                <form/>
        </div>
    </div>

<?php include $footer; ?>