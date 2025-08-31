<?php 
require_once("../../configs/config.php");
?>
<div class="hold-transition sidebar-mini">
<div class="wrapper">

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <h2 class="mb-4">All Parcels</h2>

        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Order ID</th>
              <th>Sender</th>
              <th>Recipient</th>
              <th>Status</th>
              <th>Date</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = "SELECT * FROM parcels ORDER BY created_at DESC";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['order_id']}</td>
                        <td>{$row['sender_name']}</td>
                        <td>{$row['recipient_name']}</td>
                        <td>{$row['status_id']}</td>
                        <td>{$row['created_at']}</td>
                      </tr>";
            }
            ?>
          </tbody>
        </table>

 <button class="btn btn-primary mb-3 mt-5" onclick="window.print()">Print Report</button>

      </div>
    </div>
  </div>

</div>

</div>

