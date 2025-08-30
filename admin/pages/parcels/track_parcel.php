
<div class="container mt-4">
    <h3>Track Your Parcel</h3>
    <form id="trackForm" class="d-flex gap-2">
        <input type="text" name="order_id" id="order_id" class="form-control" placeholder="Enter Order ID (e.g. NEX1234)" required>
        <button type="submit" class="btn btn-primary">Track</button>
    </form>

    <div id="trackingResultPlaceholder" class="mt-3"></div>
</div>

<!-- Tracking Result Modal -->
<div class="modal fade" id="trackingModal" tabindex="-1"    >
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="trackingModalLabel">Parcel Tracking</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="trackingResultModal">
        <!-- AJAX result will load here -->
      </div>
    </div>
  </div>
</div>

<script>
document.getElementById("trackForm").addEventListener("submit", function(e) {
    e.preventDefault();
    let orderId = document.getElementById("order_id").value;

    fetch("./pages/parcels/ajax_track_parcel.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "order_id=" + encodeURIComponent(orderId)
    })
    .then(res => res.text())
    .then(data => {
        document.getElementById("trackingResultModal").innerHTML = data; // inject inside modal
        let trackingModal = new bootstrap.Modal(document.getElementById("trackingModal"));
        trackingModal.show();
    })
    .catch(err => console.error(err));
});

</script>
