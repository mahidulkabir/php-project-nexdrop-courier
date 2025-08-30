
<div class="container mt-4">
    <h3>Track Your Parcel</h3>
    <form id="trackForm" class="d-flex gap-2">
        <input type="text" name="order_id" id="order_id" class="form-control" placeholder="Enter Order ID (e.g. NEX1234)" required>
        <button type="submit" class="btn btn-primary">Track</button>
    </form>

    <div id="trackingResult" class="mt-3"></div>
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
        document.getElementById("trackingResult").innerHTML = data;
    })
    .catch(err => console.error(err));
});
</script>
