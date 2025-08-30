<div class="container mt-4 mb-5">
    <h3>Track Your Parcel</h3>
    <form id="trackForm" class="d-flex gap-2">
        <input type="text" name="order_id" id="order_id" class="form-control" placeholder="Enter Order ID (e.g. NEX1234)" required>
        <button type="submit" class="btn btn-primary">Track</button>
    </form>

    <div id="trackingResult" class="mt-3"></div>
</div>


<div class="d-flex justify-content-evenly">
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
        <div class="inner">
            <h3>150</h3>

            <p>Incoming Parcels</p>
        </div>
        <div class="icon">
            <i class="bi bi-arrow-down-circle"></i>
        </div>
        <a href="#" class="small-box-footer">See all <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
        <div class="inner">
            <h3>53</h3>

            <p>Outgoing Parcels</p>
        </div>
        <div class="icon">
            <i class="bi bi-arrow-up-circle"></i>
        </div>
        <a href="#" class="small-box-footer">See array_fill<i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
</div>


<!-- script section  -->

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

