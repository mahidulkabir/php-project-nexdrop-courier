<?php
session_start();
include "../../configs/config.php";

if (isset($_POST['parcel_id'], $_POST['status_id'])) {
    $parcel_id = (int) $_POST['parcel_id'];
    $status_id = (int) $_POST['status_id'];
    $user_branch_id = $_SESSION['s_br_id'];

    // Check branch ownership
    $check = "SELECT from_br_id, to_br_id FROM parcels WHERE id = $parcel_id";
    $res = mysqli_query($conn, $check);
    $row = mysqli_fetch_assoc($res);

    if ($row) {
        if ($user_branch_id == 0 || 
            $user_branch_id == $row['from_br_id'] || 
            $user_branch_id == $row['to_br_id']) {

            $sql = "UPDATE parcels SET status_id=$status_id WHERE id=$parcel_id";
            echo mysqli_query($conn, $sql) ? "ok" : "db_error";
        } else {
            echo "unauthorized";
        }
    } else {
        echo "not_found";
    }
}
?>