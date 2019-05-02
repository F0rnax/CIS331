<?php include $header; ?>

<div id="master">
    <div id="main-container">

        <h2>Sailors</h2>
        <br />
        <div id="nav-container-left">
            <!-- display a list of categories -->
            <ul>
                <p><a href="?action=show_add_form">Add a Sailor</a>
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
                        <th>ID</th>
                        <th>Name</th>
                        <th>Rating</th>
                        <th>Age</th>
                        <th>Trainee</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $row_count = $sailors->num_rows;

                    for ($i = 0; $i < $row_count; $i++) :
                        $sailor = $sailors->fetch_assoc();
                        ?>

                        <tr>
                            <td><?php echo $sailor['SID']; ?></td>
                            <td><?php echo $sailor['SNAME']; ?></td>
                            <td><?php echo $sailor['RATING']; ?></td>
                            <td><?php echo $sailor['AGE']; ?></td>
                            <td><?php if (!empty($sailor['TRAINEE'])) echo $sailor['TRAINEE']; ?></td>
                            <td><form action="." method="post">
                                    <input type="hidden" name="action"
                                           value="show_edit_form" />
                                    <input type="hidden" name="SID"
                                           value="<?php echo $sailor['SID']; ?>" />
                                    <input type="submit" value="Edit" />
                                </form></td>

                            <td><form action="." method="post">
                                    <input type="hidden" name="action"
                                           value="delete_sailor" />
                                    <input type="hidden" name="SID"
                                           value="<?php echo $sailor['SID']; ?>" />
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

