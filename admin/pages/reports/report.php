<?php 
require('./configs/config.php');


if (!isset($_SESSION['s_id'])) {
    echo "Session expired. Please login again.";
    exit;
}
$userId = $_SESSION['s_id'];

// Check if admin
$isAdmin = ($userId === 'admin');

?>

<h2 class="mb-4">Admin Reports</h2>
<div class="container mt-4">

<?php if(!$isAdmin): ?>
    <?php
    // --- Branch User Parcel Counts --- //
    $sql_branch = $conn->query("SELECT branch_id FROM users WHERE emp_id = '$userId' LIMIT 1");
    $userData = $sql_branch->fetch_assoc();
    $branchId = $userData['branch_id'];

    $incomingCount = $conn->query("SELECT COUNT(*) AS c FROM parcels WHERE to_br_id = '$branchId'")->fetch_assoc()['c'];
    $outgoingCount = $conn->query("SELECT COUNT(*) AS c FROM parcels WHERE from_br_id = '$branchId'")->fetch_assoc()['c'];
    $acceptedCount = $conn->query("SELECT COUNT(*) AS c FROM parcels WHERE status_id=1 AND (from_br_id='$branchId' OR to_br_id='$branchId')")->fetch_assoc()['c'];
    $inTransitCount = $conn->query("SELECT COUNT(*) AS c FROM parcels WHERE status_id=2 AND (from_br_id='$branchId' OR to_br_id='$branchId')")->fetch_assoc()['c'];
    $arrivedCount = $conn->query("SELECT COUNT(*) AS c FROM parcels WHERE status_id=3 AND (from_br_id='$branchId' OR to_br_id='$branchId')")->fetch_assoc()['c'];
    $readyCount = $conn->query("SELECT COUNT(*) AS c FROM parcels WHERE status_id=4 AND (from_br_id='$branchId' OR to_br_id='$branchId')")->fetch_assoc()['c'];
    $deliveredCount = $conn->query("SELECT COUNT(*) AS c FROM parcels WHERE status_id=5 AND (from_br_id='$branchId' OR to_br_id='$branchId')")->fetch_assoc()['c'];
    $unsuccessfulCount = $conn->query("SELECT COUNT(*) AS c FROM parcels WHERE status_id=6 AND (from_br_id='$branchId' OR to_br_id='$branchId')")->fetch_assoc()['c'];
    ?>

    <div class="row g-4">
        <!-- Incoming -->
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="small-box bg-info text-white rounded-4 shadow p-3 position-relative">
                <div class="inner"><h3><?php echo $incomingCount; ?></h3><p>Incoming Parcels</p></div>
                <div class="icon position-absolute end-0 top-0 pe-3 pt-3 opacity-25"><i class="bi bi-box-arrow-in-down display-4"></i></div>
                <a href="home.php?page=8" class="small-box-footer text-white fw-bold">See all <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- Outgoing -->
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="small-box bg-success text-white rounded-4 shadow p-3 position-relative">
                <div class="inner"><h3><?php echo $outgoingCount; ?></h3><p>Outgoing Parcels</p></div>
                <div class="icon position-absolute end-0 top-0 pe-3 pt-3 opacity-25"><i class="bi bi-box-arrow-up display-4"></i></div>
                <a href="home.php?page=8" class="small-box-footer text-white fw-bold">See all <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- Accepted -->
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="small-box bg-primary text-white rounded-4 shadow p-3 position-relative">
                <div class="inner"><h3><?php echo $acceptedCount; ?></h3><p>Accepted by Courier</p></div>
                <div class="icon position-absolute end-0 top-0 pe-3 pt-3 opacity-25"><i class="bi bi-clipboard-check display-4"></i></div>
                <a href="home.php?page=8" class="small-box-footer text-white fw-bold">See all <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- In Transit -->
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="small-box bg-warning text-dark rounded-4 shadow p-3 position-relative">
                <div class="inner"><h3><?php echo $inTransitCount; ?></h3><p>In Transit</p></div>
                <div class="icon position-absolute end-0 top-0 pe-3 pt-3 opacity-25"><i class="bi bi-truck display-4"></i></div>
                <a href="home.php?page=8" class="small-box-footer fw-bold">See all <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
<?php else: ?>
    <!-- Admin view -->
    <div class="row g-4">
        <div class="col-12 mb-4">
            <h4>Total Revenue by Month</h4>
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Month</th>
                        <th>Total Income</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $qry = $conn->query("SELECT DATE_FORMAT(created_at,'%Y-%m') AS month, SUM(price) AS total_income 
                                     FROM parcels 
                                     GROUP BY month 
                                     ORDER BY month DESC");
                while($row = $qry->fetch_assoc()):
                ?>
                    <tr>
                        <td><?php echo $row['month']; ?></td>
                        <td><?php echo $row['total_income']; ?></td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </div>

        <div class="col-12 mb-4">
            <h4>Revenue by Branch</h4>
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Branch Name</th>
                        <th>Total Income</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $branchQry = $conn->query("SELECT b.br_name, SUM(p.price) AS total_income
                                           FROM parcels p
                                           JOIN branches b ON p.from_br_id = b.id OR p.to_br_id = b.id
                                           GROUP BY b.id");
                while($b = $branchQry->fetch_assoc()):
                ?>
                    <tr>
                        <td><?php echo $b['br_name']; ?></td>
                        <td><?php echo $b['total_income']; ?></td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php endif; ?>
</div>

<!-- tracking reoprt  -->
      <div class="container-fluid">
        

        <div class="row g-4">
          <div class="col-md-6 col-lg-3">
            <a href="home.php?page=14" class="text-decoration-none">
              <div class="card shadow-sm text-center p-4" style="background: linear-gradient(135deg,#5a8bd6,#00c6ff); color:#fff; cursor:pointer;">
                <h4>All Parcels</h4>
              </div>
            </a>
          </div>

          <div class="col-md-6 col-lg-3">
            <a href="home.php?page=15" class="text-decoration-none">
              <div class="card shadow-sm text-center p-4" style="background: linear-gradient(135deg,#28a745,#81e6d9); color:#fff; cursor:pointer;">
                <h4>Completed Parcels</h4>
              </div>
            </a>
          </div>

          <div class="col-md-6 col-lg-3">
            <a href="home.php?page=17" class="text-decoration-none">
              <div class="card shadow-sm text-center p-4" style="background: linear-gradient(135deg,#dc3545,#ff7b7b); color:#fff; cursor:pointer;">
                <h4>Delivery Unsuccessful</h4>
              </div>
            </a>
          </div>

          <div class="col-md-6 col-lg-3">
            <a href="home.php?page=16" class="text-decoration-none">
              <div class="card shadow-sm text-center p-4" style="background: linear-gradient(135deg,#ffc107,#ffe082); color:#000; cursor:pointer;">
                <h4>Processing Parcels</h4>
              </div>
            </a>
          </div>

        </div>
</div>

