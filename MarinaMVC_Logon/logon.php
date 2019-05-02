<?php
session_start();

if (isset($_REQUEST['UserID']) && isset($_REQUEST['Password'])) {
    //set session variables
    $_SESSION['userid'] = $_REQUEST['UserID'];
    $_SESSION['password'] = $_REQUEST['Password'];
    require('model/variables.php');
    require('model/config.php');
    $SQL = 'SELECT EmpRoleID FROM employees WHERE empID = '
            . '"' . $_SESSION['userid'] . '"'
            . ' AND Password = ' . '"' . $_SESSION['password'] . '"';
    
    $result = $db->query($SQL);
    $row_cnt = $result->num_rows;
    $result = mysqli_fetch_array($result);

    if ($row_cnt == 1) {
        $_SESSION['role'] = $result[0]; // set user's role

        switch ($_SESSION['role']) {
            case 'ADMIN' :
                //possibly re-direct user based on role
                break;
            case 'HOUSE' :
                //possibly re-direct user based on role
                break;
        }
        header("Location: http://localhost:8080/MarinaMVC_Logon/index.php");
    } else {
        //TERMINATE user's session if logon fails
        
        ?>
	echo "Invalid User ID and/or Password!" <br/>
	<?php
        
        unset($_SESSION['userid']);
        unset($_SESSION['password']);
        session_destroy();
    }
}
?>

<body>

    <form name="logon" action="" method="GET">
        <fieldset>
            <legend><strong>Employee Logon</strong></legend></br>
            <div id ="fieldgrid">
                <div id="row">
                    <div id="fieldlabel"><label for="UserID"><strong>User ID</strong></label>
		    </div>
		    <div id="fieldcontent"><input type="text" name="UserID" value="" size="8" id="UserID" />
		    </div>
                </div>
		<div id="row">
                    <div id="fieldlabel"><label for="Password"><strong>Password</strong></label>
		    </div>
		    <div id="fieldcontent"><input type="password" name="Password" value="" size="20" id="Password" />
		    </div>
                </div>
            </div>
	    </br>
	    <div id="buttongrid">
		<div id="row">
		    <div id="buttoncell" align="right"><input type="submit" value="Logon" name="submit"/>			
		    </div>
		</div>
	    </div>
        </fieldset>
    </form>
</body>

