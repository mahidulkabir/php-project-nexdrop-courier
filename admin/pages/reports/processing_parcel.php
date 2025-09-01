<div class="container-fluid" id="print_report">
  <h2 class="mb-4">Processing Parcels</h2>

  <table class="table table-bordered table-striped">
    <thead>
      <tr>
         <th>Order ID</th>
          <th>Sender</th>
          <th>Recipient</th>
          <th>Sender Contact</th>
          <th>Sender NID</th>
          <th>Sender Branch</th>
          <th>Recieving Branch</th>
          <th>Current Status</th>
          <th>Order Created at</th>
          <th>Order Last Update</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql = "SELECT 
            p.order_id,
            p.sender_name,
            p.recipient_name,
            p.sender_contact,
            p.sender_nid,
            p.status_id,
            DATE_FORMAT(p.created_at, '%d/%m/%Y || %H:%i:%s') AS created_at,
            DATE_FORMAT(p.updated_at, '%d/%m/%Y || %H:%i:%s') AS updated_at,
            fb.br_name AS from_branch,
            tb.br_name AS to_branch,
            ps.status_name

        
        
         FROM parcels p
         JOIN branches fb ON p.from_br_id = fb.id
         JOIN branches tb ON p.to_br_id = tb.id
         JOIN parcel_status ps ON p.status_id = ps.id
         WHERE status_id in (1,2,3,4)
          ORDER BY created_at DESC";
      $result = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                          <td>{$row['order_id']}</td>
                          <td>{$row['sender_name']}</td>
                          <td>{$row['recipient_name']}</td>
                          <td>{$row['sender_contact']}</td>
                          <td>{$row['sender_nid']}</td>
                          <td>{$row['from_branch']}</td>
                          <td>{$row['to_branch']}</td>
                          <td>{$row['status_name']}</td>
                          <td>{$row['created_at']}</td>
                          <td>{$row['updated_at']}</td>
                        </tr>";
      }
      ?>
    </tbody>
  </table>


</div>
<button onclick="printVoucher()" class="btn btn-dark">
  <i class="bi bi-printer"></i> Print Voucher
</button>
<script>
  function printVoucher() {
    var printContents = document.getElementById('print_report').innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
  }
</script>