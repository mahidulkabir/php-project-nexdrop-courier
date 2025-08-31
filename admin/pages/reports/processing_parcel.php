<?php
require_once("../../configs/config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <title>Processing Parcels</title>
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper container mt-5">

    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <h2 class="mb-4">Processing Parcels</h2>

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
              $sql = "SELECT * FROM parcels WHERE status_id IN (1,2,3,4) ORDER BY created_at DESC";
              $result = mysqli_query($conn, $sql);
              while ($row = mysqli_fetch_assoc($result)) {
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


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>


</html>