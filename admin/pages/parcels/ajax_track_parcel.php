<?php
require('../../configs/config.php');

if (!isset($_POST['order_id'])) {
    echo "No order ID provided.";
    exit;
}

$order_id = mysqli_real_escape_string($conn, $_POST['order_id']);

$sql = "SELECT p.order_id, p.sender_name, p.recipient_name, ps.status_name, p.created_at 
        FROM parcels p
        JOIN parcel_status ps ON p.status_id = ps.id
        WHERE p.order_id = '$order_id'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo "<div class='card p-3'>
            <h5>Parcel Details</h5>
            <p><strong>Order ID:</strong> {$row['order_id']}</p>
            <p><strong>Sender:</strong> {$row['sender_name']}</p>
            <p><strong>Recipient:</strong> {$row['recipient_name']}</p>
            <p><strong>Status:</strong> {$row['status_name']}</p>
            <p><strong>Created At:</strong> {$row['created_at']}</p>
          </div>";
} else {
    echo "<div class='alert alert-danger'>No parcel found with Order ID: $order_id</div>";
}
?>
