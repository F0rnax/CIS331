<?php

error_reporting(E_ALL & ~E_NOTICE);
require('../model/config.php');
require('../model/variables.php');
require('../model/reservation_db.php');
$sailors = get_sailors();

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
    include('sailor_list.php');
}
else if ($action == 'show_add_form')
{
    $sailor = "";
    include('sailor_add_edit.php');
}
else if ($action == 'show_edit_form')
{
    if (isset($_GET['SID']))
    {
        $SID = $_GET['SID'];
    }
    else if (isset($_POST['SID']))
    {
        $SID = $_POST['SID'];
    }
    else
    {
        $SID = '';
    }
    $sailor = get_sailor($SID);
    include('sailor_add_edit.php');
}
else if ($action == 'delete_sailor')
{
    // Validate the inputs
    $error = "";

    if (isset($_POST['SID']))
    {
        $SID = $_POST['SID'];
        if (get_reservation_count_by_sailor($SID) > 0)
        {
            $error = "Sailor ID is used in a reservation.";
        }
    }
    else
    {
        $error = "Sailor ID";
    }

    if (!(empty($error)))
    {
        $error = "Invalid sailor data. (" . $error . ")";
        include('../errors/error.php');
    }
    else
    {
        delete_sailor($SID);
        header('Location: index.php');
    }
}
else if ($action == 'add_sailor')
{
    $error = '';

    if (isset($_POST['SID']))
    {
        $SID = $_POST['SID'];
        if (empty($SID))
        {
            $error = "Sailor ID";
        }
    }
    else
    {
        $error = "Sailor ID";
    }

    if (isset($_POST['SNAME']))
    {
        $SNAME = $_POST['SNAME'];
        if (empty($SNAME))
        {
            $error = "Sailor Name";
        }
    }
    else
    {
        $error = "Sailor Name";
    }

    if (isset($_POST['RATING']))
    {
        $RATING = $_POST['RATING'];
        if (empty($RATING))
        {
            $error = "Sailor Rating";
        }
    }
    else
    {
        $error = "Sailor Rating";
    }

    if (isset($_POST['AGE']))
    {
        $AGE = $_POST['AGE'];
        if (empty($AGE))
        {
            $error = "Sailor Age";
        }
    }
    else
    {
        $error = "Sailor Age";
    }
    
    if (isset($_POST['TRAINEE']))
    {
        $TRAINEE = $_POST['TRAINEE'];
        if (empty($TRAINEE))
        {
            $error = "Sailor Trainee";
        }
    }
    else
    {
        $error = "Sailor Trainee";
    }

    // Validate the inputs
    if (!(empty($error)))
    {
        $error = "Invalid sailor data. (" . $error . ")";
        include('../errors/error.php');
    }
    else
    {
        add_sailor($SID, $SNAME, $RATING, $AGE, $TRAINEE);
        header('Location: index.php');
    }
}
else if ($action == 'update_sailor')
{
    $error = '';

    if (isset($_POST['SID']))
    {
        $SID = $_POST['SID'];
        if (empty($SID))
        {
            $error = "Sailor ID";
        }
    }
    else
    {
        $error = "Sailor ID";
    }

    if (isset($_POST['SNAME']))
    {
        $SNAME = $_POST['SNAME'];
        if (empty($SNAME))
        {
            $error = "Sailor Name";
        }
    }
    else
    {
        $error = "Sailor Name";
    }

    if (isset($_POST['RATING']))
    {
        $RATING = $_POST['RATING'];
        if (empty($RATING))
        {
            $error = "Sailor Rating";
        }
    }
    else
    {
        $error = "Sailor Rating";
    }

    if (isset($_POST['AGE']))
    {
        $AGE = $_POST['AGE'];
        if (empty($AGE))
        {
            $error = "Sailor Age";
        }
    }
    else
    {
        $error = "Sailor Age";
    }

    // Validate the inputs
    if (!(empty($error)))
    {
        $error = "Invalid sailor data. (" . $error . ")";
        include('../errors/error.php');
    }
    else
    {
        update_sailor($SID, $SNAME, $RATING, $AGE, $TRAINEE);
        header('Location: index.php');
    }
}
?>