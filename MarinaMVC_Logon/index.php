<?php
require('model/variables.php');
require('model/config.php');
require('model/reservation_db.php');
$res_count = get_res_count();
$sailor_count = get_sailor_count();
$employee_count = get_employee_count();
include $header;
?>

<div id="master">
    <div id="main-container">
        <h2>System Status: </br>
            <?php
	    
	    session_start();

	    echo $_SESSION['userid'];
	    ?> is logged in.
	    </br>
	    <?php
            date_default_timezone_set('EST');
            echo date('l jS \of F Y');
            ?>
        </h2>
        <br />
        <div id="nav-container-left">
            <!-- display a list of categories -->
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

        <div id="content">
            <p><a href="reservations/?action=display">Current Reservations</a>:
<?php echo $res_count; ?></p>
            <p><a href="sailors/">Current Sailors</a>: <?php echo $sailor_count; ?></p><br />
            <p><a href="employees/">Employees</a>: <?php echo $employee_count; ?></p><br />

        </div>

<?php include $footer; ?>
