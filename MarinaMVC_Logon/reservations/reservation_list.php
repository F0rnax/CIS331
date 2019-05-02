<?php include $header; ?>

<div id="master">
    <div id="main-container">

        <h2>Reservations by Date</h2>
        <br />
        <div id="nav-container-left">
            <!-- display a list of categories -->
            <ul>
                <p><a href="?action=show_add_form">Make a Reservation</a>
                    <br></br>
                    <br></br>
                    <br></br>                
                    <br></br>
                    <br></br>
                    <br></br>
            </ul>
        </div>
        <div id ="content">

            <table border="1">
                <thead>
                    <tr>
                        <th>Boat ID</th>
                        <th>Reservation Date</th>
                        <th>Sailor ID</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $row_count = $reservations->num_rows;

                    for ($i = 0; $i < $row_count; $i++) :
                        $reservation = $reservations->fetch_assoc();
                        ?>
                        <tr>
                            <!--display reservation boat ID-->
                            <td><?php echo $reservation['BID']; ?></td>
                            <!--display reservation date-->
                            <td><?php echo $reservation['forDate']; ?></td>
                            <!--display reservation sailor ID-->
                            <td><?php echo $reservation['SID']; ?></td>
                            <!--allow edit of reservation-->
                            <td><form action="." method="post">
                                    <input type="hidden" name="action"
                                           value="show_edit_form" />
                                    <input type="hidden" name="boat_ID"
                                           value="<?php echo $reservation['BID']; ?>" />
                                    <input type="hidden" name="reservation_date"
                                           value="<?php echo $reservation['forDate']; ?>" />
                                    <input type="submit" value="Edit" />
                                </form></td>

                            <td><form action="." method="post">
                                    <input type="hidden" name="action"
                                           value="delete_reservation" />
                                    <input type="hidden" name="boat_ID"
                                           value="<?php echo $reservation['BID']; ?>" />
                                    <input type="hidden" name="reservation_date"
                                           value="<?php echo $reservation['forDate']; ?>" />
                                    <input type="submit" value="Delete" />
                                </form></td>
                        </tr>
                        <?php
                    endfor;
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include $footer; ?>

