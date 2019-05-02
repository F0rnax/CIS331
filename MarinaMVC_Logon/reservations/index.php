<?php

require('../model/config.php');
require('../model/variables.php');
require('../model/reservation_db.php');
$reservations = get_reservations_by_date();

if (isset($_POST['action']))
{
    $action = $_POST['action'];
}
else if (isset($_GET['action']))
{
    $action = $_GET['action'];
}
else
{
    $action = 'display';
}
if ($action == 'display')
{
    include('reservation_list.php');
}
else if ($action == 'show_add_form')
{

    $reservation = "";
    include('reservation_add_edit.php');
}
else if ($action == 'show_edit_form')
{
    if (isset($_GET['boat_ID']))
    {
        $BID = $_GET['boat_ID'];
    }
    else if (isset($_POST['boat_ID']))
    {
        $BID = $_POST['boat_ID'];
    }
    else
    {
        $BID = '';
    }

    if (isset($_GET['reservation_date']))
    {
        $forDate = $_GET['reservation_date'];
    }
    else if (isset($_POST['reservation_date']))
    {
        $forDate = $_POST['reservation_date'];
    }
    else
    {
        $forDate = '';
    }

    $reservation = get_reservation($BID, $forDate);
    include('reservation_add_edit.php');
}
else if ($action == 'delete_reservation')
{
    // Validate the inputs
    $error = "";

    //boat ID is required
    if (isset($_POST['boat_ID']))
    {
        $BID = $_POST['boat_ID'];
        if (empty($BID))
        {
            $error = "Boat ID";
        }
    }
    else
    {
        $error = "Boat ID";
    }

    if (isset($_POST['reservation_date']))
    {
        $forDate = $_POST['reservation_date'];
        if (empty($forDate))
        {
            $error = "Reservation Date";
        }
    }
    else
    {
        $error = "Reservation Date";
    }

    if (!(empty($error)))
    {
        $error = "Invalid reservation data. (" . $error . ")";
        include('../errors/error.php');
    }
    else
    {
        delete_reservation($BID, $forDate);
        header('Location: index.php');
    }
}
else if ($action == 'add_reservation')
{
    $error = '';

    //date must be populated
    if (isset($_POST['reservation_date']))
    {
        $reservation_date = $_POST['reservation_date'];
        if (empty($reservation_date))
        {
            $error = "error";
        }
        else
        {
            $d = preg_split('#[-/:. ]#', $reservation_date);

            // check for 3 parts in date
            if (is_array($d) && count($d) == 3)
            {
                //check for "MM/DD/YYYY" config
                if (checkdate($d[0], $d[1], $d[2]))
                {
                    //switch to "YYYY/MM/DD" for MySQL storage
                    $reservation_date = "$d[2]-$d[0]-$d[1]";
                }
                else
                {
                    //
                    if (checkdate($d[1], $d[2], $d[0]))
                    {
                        // ok
                    }
                    else
                    {
                        $error = "Date" . $reservation_date;
                    }
                }
            }
            else
            {
                $error = "Date" . $reservation_date;
            }
        }
    }
    else
    {
        $error = "Date" . $reservation_date;
    }

    //boat ID is required
    if (isset($_POST['boat_ID']))
    {
        $BID = $_POST['boat_ID'];
        if (empty($BID))
        {
            $error = "Boat ID";
        }
    }
    else
    {
        $error = "Boat ID";
    }

    //sailor ID is required
    if (isset($_POST['sailor_ID']))
    {
        $SID = $_POST['sailor_ID'];
        if (empty($SID))
        {
            $error = "Sailor ID";
        }
    }
    else
    {
        $error = "Sailor ID";
    }

    $makeDate = date('Y-m-d');

    // Validate the inputs
    if (!(empty($error)))
    {
        $error = "Invalid reservation data. (" . $error . ")";
        include('../errors/error.php');
    }
    else
    {
        add_reservation($BID, $SID, $reservation_date, $makeDate);
        header('Location: index.php');
    }
}
else if ($action == 'update_reservation')
{
    $error = '';

    //date must be populated
    if (isset($_POST['reservation_date']))
    {
        $reservation_date = $_POST['reservation_date'];
        if (empty($reservation_date))
        {
            $error = "error";
        }
        else
        {
            $d = preg_split('#[-/:. ]#', $reservation_date);

            // check for 3 parts in date
            if (is_array($d) && count($d) == 3)
            {
                //check for "MM/DD/YYYY" config
                if (checkdate($d[0], $d[1], $d[2]))
                {
                    //switch to "YYYY/MM/DD" for MySQL storage
                    $reservation_date = "$d[2]-$d[0]-$d[1]";
                }
                else
                {
                    //
                    if (checkdate($d[1], $d[2], $d[0]))
                    {
                        // ok
                    }
                    else
                    {
                        $error = "Date" . $reservation_date;
                    }
                }
            }
            else
            {
                $error = "Date" . $reservation_date;
            }
        }
    }
    else
    {
        $error = "Date" . $reservation_date;
    }

    //boat ID is required
    if (isset($_POST['boat_ID']))
    {
        $BID = $_POST['boat_ID'];
        if (empty($BID))
        {
            $error = "Boat ID";
        }
    }
    else
    {
        $error = "Boat ID";
    }

    //sailor ID is required
    if (isset($_POST['sailor_ID']))
    {
        $SID = $_POST['sailor_ID'];
        if (empty($SID))
        {
            $error = "Sailor ID";
        }
    }
    else
    {
        $error = "Sailor ID";
    }

    // Validate the inputs
    if (!(empty($error)))
    {
        $error = "Invalid reservation data. (" . $error . ")";
        include('../errors/error.php');
    }
    else
    {
        update_reservation($BID, $SID, $reservation_date);
        header('Location: index.php');
    }
}
?>