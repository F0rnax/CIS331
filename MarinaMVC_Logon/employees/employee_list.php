<?php include $header; ?>

<div id="master">
    <div id="main-container">

        <h2>Employees</h2>
        <br />
        <div id="nav-container-left">
            <!-- display a list of categories -->
            <ul>
                <p><a href="?action=show_add_form">Add an Employee</a>
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
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Role</th>
                        <th>Role Desc</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $row_count = $employees->num_rows;

                    for ($i = 0; $i < $row_count; $i++) :
                        $employee = $employees->fetch_assoc();
                        $employee_role = get_employee_role($employee['EmpRoleID']);
                 
                        ?>

                        <tr>
                            <td><?php echo $employee['EmpID']; ?></td>
                            <td><?php echo $employee['EmpLName']; ?></td>
                            <td><?php echo $employee['EmpFName']; ?></td>
                            <td><?php echo $employee['EmpRoleID']; ?></td>
                            <td><?php echo $employee_role['RoleDesc']; ?></td>

                            <td><form action="." method="post">
                                    <input type="hidden" name="action"
                                           value="show_edit_form" />
                                    <input type="hidden" name="EmpID"
                                           value="<?php echo $employee['EmpID']; ?>" />
                                    <input type="submit" value="Edit" />
                                </form></td>

                            <td><form action="." method="post">
                                    <input type="hidden" name="action"
                                           value="delete_employee" />
                                    <input type="hidden" name="EmpID"
                                           value="<?php echo $employee['EmpID']; ?>" />
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

