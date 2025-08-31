
        <div class="container-fluid" id="print_report" >
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
