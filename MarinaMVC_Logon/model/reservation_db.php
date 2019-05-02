<?php

function get_reservations_by_date() {
    global $db;
    $query = "SELECT * FROM reservations ORDER BY forDate";
    $result = $db->query($query);
    $error = "";

    if ($result == false) {
        $error = $db->error;
    }

    if ($error != null) {
        include('../errors/error.php');
        exit();
    } else {
        $reservations = $result;
        return $reservations;
    }
}

function get_sailors() {
    global $db;
    $query = "SELECT * FROM sailors ORDER BY sname";
    $result = $db->query($query);
    $error = "";

    if ($result == false) {
        $error = $db->error;
    }

    if ($error != null) {
        include('../errors/error.php');
        exit();
    } else {
        return $result;
    }
}

function get_reservation($BID, $forDate) {
    global $db;
    $query = "SELECT * FROM reservations
              WHERE forDate = '$forDate'
              AND BID = '$BID'";

    $result = $db->query($query);
    $result = mysqli_fetch_array($result);
    //$result = $result->fetch_row();
    return $result;
}

function get_sailor($SID) {
    global $db;
    $query = "SELECT * FROM sailors WHERE SID = '$SID'";
    $result = $db->query($query);
    $result = mysqli_fetch_array($result);
    return $result;
}

function get_reservation_count_by_sailor($SID) {
    global $db;
    $query = "SELECT count(*) FROM reservations WHERE sid = '$SID'";
    $result = $db->query($query)->fetch_assoc()['count(*)'];
    return $result;
}

function add_reservation($BID, $SID, $reservation_date, $makeDate) {
    global $db;

    $query = "INSERT INTO reservations VALUES ('$BID','$SID','$reservation_date', '$makeDate')";

    mysqli_query($db, $query);
}

function add_sailor($SID, $SNAME, $RATING, $AGE, $TRAINEE) {
    global $db;
    $query = "INSERT INTO sailors values ('$SID','$SNAME','$RATING','$AGE','$TRAINEE')";
    echo $query;
    die;
    mysqli_query($db, $query);
}

function delete_reservation($BID, $reservation_date) {
    global $db;
    $query = "DELETE FROM reservations
              WHERE BID = '$BID'
              AND forDate = '$reservation_date'";

    mysqli_query($db, $query);
    //$db->exec($query);
}

function delete_sailor($SID) {
    global $db;
    $query = "DELETE FROM sailors WHERE sid = '$SID'";
    mysqli_query($db, $query);
}

function update_reservation($BID, $SID, $reservation_date) {
    global $db;
    $query = "UPDATE reservations
              SET SID = '$SID'
              WHERE BID = '$BID'
              AND forDate = '$reservation_date'";

    try {
        mysqli_query($db, $query);
    } catch (PDOException $e) {
        $error = $e->getMessage();
        include('../errors/error.php');
    }
}

function update_sailor($SID, $SNAME, $RATING, $AGE, $TRAINEE) {
    global $db;
    $query = "UPDATE sailors "
            . "SET SNAME = '$SNAME', "
            . "RATING = '$RATING', "
            . "AGE = '$AGE' "
            . "WHERE SID = '$SID'";
    try {
        mysqli_query($db, $query);
    } catch (PDOException $e) {
        $error = $e->getMessage();
        include('../errors/error.php');
    }
}

function get_res_count() {
    global $db;

    $query = 'SELECT * FROM reservations';

    //run the query and store the result in an object
    $result = $db->query($query);

    //find the number of resulting rows from the object
    $row_cnt = $result->num_rows;

    return $row_cnt;
}

function get_sailor_count() {
    global $db;
    $query = 'SELECT count(*) FROM sailors';
    $result = $db->query($query)->fetch_assoc()['count(*)'];
    return $result;
}

function get_employee_count() {
    global $db;
    $query = 'SELECT count(*) FROM employees';
    $result = $db->query($query)->fetch_assoc()['count(*)'];
    return $result;
}

function get_employees() {
    global $db;
    $query = "SELECT * FROM employees ORDER BY EmpLName";
    $result = $db->query($query);
    $error = "";

    if ($result == false) {
        $error = $db->error;
    }

    if ($error != null) {
        include('../errors/error.php');
        exit();
    } else {
        return $result;
    }
}

function get_employee($EmpID) {
    global $db;
    $query = "SELECT * FROM employees WHERE EmpID = '$EmpID'";
    $result = $db->query($query);
    $result = mysqli_fetch_array($result);
    return $result;
}
function get_employee_role($EmpRoleID) {
    global $db;
    $query = "SELECT * FROM employee_roles WHERE RoleID = '$EmpRoleID'";
    $result = $db->query($query);
    $result = mysqli_fetch_array($result);
    return $result;
}

