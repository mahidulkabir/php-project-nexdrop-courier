<?php
require('./configs/config.php');


if (!isset($_SESSION['s_id'])) {
    echo "Session expired. Please login again.";
    exit;
}
$userId = $_SESSION['s_id'];

// Get branch_id of this user
$sql_branch = $conn->query("SELECT branch_id FROM users WHERE emp_id = '$userId' LIMIT 1");
$userData = $sql_branch->fetch_assoc();
if (!$userData) {
    echo "User branch not found.";
    exit;
}
$branchId = $userData['branch_id'];

// --- Parcel counts --- //
$incomingCount = $conn->query("SELECT COUNT(*) AS c FROM parcels WHERE to_br_id = '$branchId'")
                      ->fetch_assoc()['c'];

$outgoingCount = $conn->query("SELECT COUNT(*) AS c FROM parcels WHERE from_br_id = '$branchId'")
                      ->fetch_assoc()['c'];

$acceptedCount = $conn->query("SELECT COUNT(*) AS c FROM parcels WHERE status_id=1 AND (from_br_id='$branchId' OR to_br_id='$branchId')")
                      ->fetch_assoc()['c'];

$inTransitCount = $conn->query("SELECT COUNT(*) AS c FROM parcels WHERE status_id=2 AND (from_br_id='$branchId' OR to_br_id='$branchId')")
                      ->fetch_assoc()['c'];

$arrivedCount = $conn->query("SELECT COUNT(*) AS c FROM parcels WHERE status_id=3 AND (from_br_id='$branchId' OR to_br_id='$branchId')")
                      ->fetch_assoc()['c'];

$readyCount = $conn->query("SELECT COUNT(*) AS c FROM parcels WHERE status_id=4 AND (from_br_id='$branchId' OR to_br_id='$branchId')")
                      ->fetch_assoc()['c'];

$deliveredCount = $conn->query("SELECT COUNT(*) AS c FROM parcels WHERE status_id=5 AND (from_br_id='$branchId' OR to_br_id='$branchId')")
                      ->fetch_assoc()['c'];

$unsuccessfulCount = $conn->query("SELECT COUNT(*) AS c FROM parcels WHERE status_id=6 AND (from_br_id='$branchId' OR to_br_id='$branchId')")
                      ->fetch_assoc()['c'];
?>

<div class="container mt-4">


  <div class="row g-4">
   
    <!-- Incoming -->
    <div class="col-lg-6 col-md-6 col-sm-12">
      <div class="small-box bg-info text-white rounded-4 shadow p-3 position-relative">
        <div class="inner">
          <h3><?php echo $incomingCount; ?></h3>
          <p>Incoming Parcels</p>
        </div>
        <div class="icon position-absolute end-0 top-0 pe-3 pt-3 opacity-75">
          <i class="bi bi-box-arrow-in-down display-4"></i>
        </div>
        <a href="home.php?page=8" class="small-box-footer text-white fw-bold">See all <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <!-- Outgoing -->
    <div class="col-lg-6 col-md-6 col-sm-12">
      <div class="small-box bg-success text-white rounded-4 shadow p-3 position-relative">
        <div class="inner">
          <h3><?php echo $outgoingCount; ?></h3>
          <p>Outgoing Parcels</p>
        </div>
        <div class="icon position-absolute end-0 top-0 pe-3 pt-3 opacity-75">
          <i class="bi bi-box-arrow-up display-4"></i>
        </div>
        <a href="home.php?page=8" class="small-box-footer text-white fw-bold">See all <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <h2>Parcel Status:</h2>
    <!-- Accepted -->
    <div class="col-lg-3 col-md-6 col-sm-12">
      <div class="small-box bg-primary text-white rounded-4 shadow p-3 position-relative">
        <div class="inner">
          <h3><?php echo $acceptedCount; ?></h3>
          <p>Accepted by Courier</p>
        </div>
        <div class="icon position-absolute end-0 top-0 pe-3 pt-3 opacity-75">
          <i class="bi bi-clipboard-check display-4"></i>
        </div>
        <a href="home.php?page=8" class="small-box-footer text-white fw-bold">See all <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <!-- In Transit -->
    <div class="col-lg-3 col-md-6 col-sm-12">
      <div class="small-box bg-warning text-dark rounded-4 shadow p-3 position-relative">
        <div class="inner">
          <h3><?php echo $inTransitCount; ?></h3>
          <p>In Transit</p>
        </div>
        <div class="icon position-absolute end-0 top-0 pe-3 pt-3 opacity-75">
          <i class="bi bi-truck display-4"></i>
        </div>
        <a href="home.php?page=8" class="small-box-footer fw-bold">See all <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <!-- Arrived -->
    <div class="col-lg-3 col-md-6 col-sm-12">
      <div class="small-box bg-info text-white rounded-4 shadow p-3 position-relative">
        <div class="inner">
          <h3><?php echo $arrivedCount; ?></h3>
          <p>Arrived at Destination</p>
        </div>
        <div class="icon position-absolute end-0 top-0 pe-3 pt-3 opacity-75">
          <i class="bi bi-geo-alt display-4"></i>
        </div>
        <a href="home.php?page=8" class="small-box-footer text-white fw-bold">See all <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <!-- Ready for Delivery -->
    <div class="col-lg-3 col-md-6 col-sm-12">
      <div class="small-box bg-secondary text-white rounded-4 shadow p-3 position-relative">
        <div class="inner">
          <h3><?php echo $readyCount; ?></h3>
          <p>Ready for Delivery</p>
        </div>
        <div class="icon position-absolute end-0 top-0 pe-3 pt-3 opacity-75">
          <i class="bi bi-hourglass-split display-4"></i>
        </div>
        <a href="home.php?page=8" class="small-box-footer text-white fw-bold">See all <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <!-- Delivered -->
    <div class="col-lg-3 col-md-6 col-sm-12">
      <div class="small-box bg-success text-white rounded-4 shadow p-3 position-relative">
        <div class="inner">
          <h3><?php echo $deliveredCount; ?></h3>
          <p>Delivered</p>
        </div>
        <div class="icon position-absolute end-0 top-0 pe-3 pt-3 opacity-75">
          <i class="bi bi-check-circle display-4"></i>
        </div>
        <a href="home.php?page=8" class="small-box-footer text-white fw-bold">See all <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <!-- Unsuccessful -->
    <div class="col-lg-3 col-md-6 col-sm-12">
      <div class="small-box bg-danger text-white rounded-4 shadow p-3 position-relative">
        <div class="inner">
          <h3><?php echo $unsuccessfulCount; ?></h3>
          <p>Delivery Unsuccessful</p>
        </div>
        <div class="icon position-absolute end-0 top-0 pe-3 pt-3 opacity-75">
          <i class="bi bi-x-circle display-4"></i>
        </div>
        <a href="home.php?page=8" class="small-box-footer text-white fw-bold">See all <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </div>
</div>
