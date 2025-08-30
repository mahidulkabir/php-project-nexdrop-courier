<?php
require_once("../../configs/config.php");

if (isset($_POST['order_id'])) {
    $order_id = mysqli_real_escape_string($conn, $_POST['order_id']);

    $query = "SELECT * FROM parcels WHERE order_id = '$order_id' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $parcel = mysqli_fetch_assoc($result);
        $status = (int)$parcel['status_id']; // 1–6

        // Step names
        $steps = [
            1 => "Accepted by courier",
            2 => "In transit",
            3 => "Arrived at destination",
            4 => "Ready for delivery",
            5 => "Delivered",
            6 => "Delivery unsuccessful"
        ];

        echo "<h5>Tracking ID: {$parcel['order_id']}</h5>";
        echo "<p><strong>Sender:</strong> {$parcel['sender_name']} <br> 
                <strong>Recipient:</strong> {$parcel['recipient_name']} <br>
                <strong>Current Status:</strong> {$steps[$status]}</p>";

        // Stepper UI
        echo '<div class="tracking-progress">';
        echo '<div class="progress-line"><div class="progress-fill" style="width:'.(($status-1)/5*100).'%;"></div></div>';
        echo '<div class="steps d-flex justify-content-between">';

        foreach ($steps as $stepNumber => $stepName) {
            $classes = "step";
            if ($stepNumber < $status) {
                $classes .= " completed"; // already passed
            } elseif ($stepNumber == $status) {
                $classes .= " active"; // current
            }
            echo "<div class='$classes'><div class='dot'></div><div class='label'>$stepName</div></div>";
        }

        echo '</div></div>';
    } else {
        echo "<div class='alert alert-danger'>No parcel found with Order ID: $order_id</div>";
    }
}
?>

<!-- Stepper CSS -->
<style>
.tracking-progress {
    position: relative;
    width: 100%;
    margin: 30px 0;
}
.progress-line {
    position: absolute;
    top: 10px;
    left: 0;
    width: 100%;
    height: 4px;
    background: #dee2e6;
    z-index: 1;
}
.progress-fill {
    height: 4px;
    background: #28a745;
    width: 0;
    z-index: 2;
}
.steps {
    position: relative;
    z-index: 3;
}
.step {
    text-align: center;
    flex: 1;
}
.dot {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    margin: 0 auto 8px;
    background: #dee2e6;
    position: relative;
}
.step.completed .dot {
    background: #28a745;
}
.step.active .dot {
    background: #007bff;
}
.label {
    font-size: 12px;
    color: #6c757d;
}
.step.completed .label {
    color: #28a745;
}
.step.active .label {
    color: #007bff;
    font-weight: bold;
}
</style>
