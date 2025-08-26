




<?php
// Example variables (replace with DB data)
$printed_at = date('Y-m-d H:i');
if(isset($_POST['btnEdit'])){
    $id = $_POST["id"];
    $parcel_table = $conn->query("SELECT * FROM parcels WHERE id='$id'");
    list($_id, $order_id, $created_by, $sender_name, $sender_address, $sender_contact, $sender_nid ,  $recipient_name, $recipient_add,  $recipient_contact, $from_br_id,  $to_br_id, $weight,$risk_type, $price, $status) = $parcel_table->fetch_row();
};
?>


<div class="container my-3" id="voucherDiv">
  

  <!-- Voucher card -->
  <div class="card shadow-sm">
    <div class="card-body">

      <!-- Header -->
      <div class="row mb-3 ">
        <div class="col">
            <img src="../assets/img/nfavicon.png" alt="courier logo" width="150px">
          <!-- <h6 class="fw-bold m-0 p-0">NEXDROP COURIER</h6> -->
          <!-- <small class="text-muted">the next step in delivery</small>  -->
        </div>
        <div class="col text-end">
          <p class="mb-1"><strong>Voucher ID:</strong> <?= $_id ?></p>
          <p class="mb-1"><strong>Order ID:</strong> <?= $order_id ?></p>
          <p class="mb-0"><strong>Printed:</strong> <?= $printed_at ?></p>
        </div>
      </div>

      <h5 class="text-center fw-bold text-uppercase mb-4">Parcel Shipping Voucher</h5>

      <!-- Sender & Recipient -->
      <div class="row mb-4">
        <div class="col-md-6">
          <div class="border rounded p-3 h-100">
            <h6 class="fw-bold text-uppercase mb-3">Sender</h6>
            <table class="table table-sm table-borderless mb-0">
              <tr><th scope="row">Name</th><td><?= $sender_name ?></td></tr>
              <tr><th scope="row">Address</th><td><?= $sender_address ?></td></tr>
              <tr><th scope="row">Contact</th><td><?= $sender_contact ?></td></tr>
            </table>
          </div>
        </div>
        <div class="col-md-6 mt-3 mt-md-0">
          <div class="border rounded p-3 h-100">
            <h6 class="fw-bold text-uppercase mb-3">Recipient</h6>
            <table class="table table-sm table-borderless mb-0">
              <tr><th scope="row">Name</th><td><?= $recipient_name ?></td></tr>
              <tr><th scope="row">Address</th><td><?= $recipient_add ?></td></tr>
              <tr><th scope="row">Contact</th><td><?= $recipient_contact ?></td></tr>
            </table>
          </div>
        </div>
      </div>

      <!-- Shipment details -->
      <div class="border rounded p-3 mb-4">
        <h6 class="fw-bold text-uppercase mb-3">Shipment Details</h6>
        <table class="table table-sm mb-0">
          <!-- <tr>
            <th scope="row">From Branch</th><td><?= $from_br_id ?></td>
            <th scope="row">To Branch</th><td><?= $to_br_id ?></td>
          </tr> -->
          <tr>
            <th scope="row">Weight</th><td><?= $weight ?> kg</td>
          </tr>
          <tr>
            <th scope="row">Risk Type</th><td><?= $risk_type ?></td>
          </tr>
          <!-- <tr>
            <th scope="row">Price</th><td colspan="3">৳ <?= number_format((float)$price, 2) ?></td>
          </tr> -->
          <!-- <tr>
            <th scope="row">Status</th><td><?= $status ?></td>
            <th scope="row">Created By</th><td><?= $created_by ?></td>
          </tr> -->
        </table>
      </div>

      <!-- Totals -->
      <div class="d-flex justify-content-end mb-4">
        <table class="table table-sm w-auto mb-0">
          <tr><th>Subtotal</th><td>৳ <?= number_format((float)$price, 2) ?></td></tr>
          <tr class="fw-bold table-light"><th>Total</th><td>৳ <?= number_format((float)$price, 2) ?></td></tr>
        </table>
      </div>

      <!-- Signatures -->
      <div class="row text-center mt-5">
        <div class="col">
          <hr class="mb-1">
          <small class="text-muted">Sender Signature</small>
        </div>
        <div class="col">
          <hr class="mb-1">
          <small class="text-muted">Receiver Signature</small>
        </div>
        <div class="col">
          <hr class="mb-1">
          <small class="text-muted">Authorized By</small>
        </div>
      </div>
        <!-- Print button -->
        <!-- Note -->
        <p class="text-muted small mt-3 mb-0">
            Note: Please keep this voucher for your records. Order: <?= $order_id ?>
        </p>
    </div>
</div>
<div class="text-end mb-3 d-print-none">
  <button onclick="printVoucher()" class="btn btn-dark">
    <i class="bi bi-printer"></i> Print Voucher
  </button>
</div>
</div>
<script>

    function printVoucher() {
        var printContents = document.getElementById('voucherDiv').innerHTML;
        var originalContents = document.body.innerHTML;
    
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }

</script>

