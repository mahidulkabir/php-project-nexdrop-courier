<?php
require('./configs/config.php');

if (!isset($_SESSION['s_id'])) {
    echo "Session expired. Please login again.";
    exit;
}
$userId = $_SESSION['s_id'];
$isAdmin = ($userId === 'admin');

// ========== Identify branch for user ==========
$branchId = null;
if (!$isAdmin) {
    $sql_branch = $conn->query("SELECT branch_id FROM users WHERE emp_id = '$userId' LIMIT 1");
    $userData = $sql_branch->fetch_assoc();
    $branchId = $userData['branch_id'];
}

// ========== Revenue by Month ==========
$revLabels = [];
$revData = [];
if ($isAdmin) {
    // All branches
    $qry = $conn->query("SELECT DATE_FORMAT(created_at,'%Y-%m') AS month, SUM(price) AS total_income 
                         FROM parcels GROUP BY month ORDER BY month ASC");
} else {
    // Only this branch (either as sender or receiver)
    $qry = $conn->query("SELECT DATE_FORMAT(created_at,'%Y-%m') AS month, SUM(price) AS total_income 
                         FROM parcels WHERE from_br_id='$branchId' OR to_br_id='$branchId'
                         GROUP BY month ORDER BY month ASC");
}

if ($qry && $qry->num_rows > 0) {
    while ($row = $qry->fetch_assoc()) {
        $revLabels[] = $row['month'];
        $revData[] = $row['total_income'];
    }
} else {
    $revLabels = ["2025-06", "2025-07", "2025-08"];
    $revData = [2000, 3000, 2500];
}

// ========== Parcel Status Overview ==========
$statusLabels = ['Accepted', 'In Transit', 'Arrived', 'Ready', 'Delivered', 'Unsuccessful'];
$statusData = [];
for ($i = 1; $i <= 6; $i++) {
    if ($isAdmin) {
        $count = $conn->query("SELECT COUNT(*) AS c FROM parcels WHERE status_id = $i")->fetch_assoc()['c'] ?? 0;
    } else {
        $count = $conn->query("SELECT COUNT(*) AS c FROM parcels 
                               WHERE status_id = $i 
                               AND (from_br_id='$branchId' OR to_br_id='$branchId')")->fetch_assoc()['c'] ?? 0;
    }
    $statusData[] = (int)$count;
}
if (array_sum($statusData) === 0) {
    $statusData = [10, 15, 8, 12, 25, 3];
}

// ========== Revenue by Branch (Admin Only) ==========
$branchLabels = [];
$branchData = [];
if ($isAdmin) {
    $branchQry = $conn->query("SELECT b.br_name, SUM(p.price) AS total_income
                               FROM parcels p
                               JOIN branches b ON p.from_br_id = b.id OR p.to_br_id = b.id
                               GROUP BY b.id");
    if ($branchQry && $branchQry->num_rows > 0) {
        while ($b = $branchQry->fetch_assoc()) {
            $branchLabels[] = $b['br_name'];
            $branchData[] = $b['total_income'];
        }
    } else {
        $branchLabels = ["Dhaka", "Chittagong", "Sylhet"];
        $branchData = [1500, 2200, 1800];
    }
}
?>

<h3 class="mb-4">📊 <?php 
if ($isAdmin) {
   echo "Overall Branch Data";
} else {
    echo "Branch Dashboard";
}

?></h3>
<div class="container mt-5">
    <div class="row g-4">
        <!-- Revenue Chart -->
        <div class="col-md-6">
            <div class="card p-3 shadow rounded-4">
                <h5 class="text-center mb-3">Revenue by Month</h5>
                <canvas id="revenueChart" height="200"></canvas>
            </div>
        </div>

        <!-- Status Chart -->
        <div class="col-md-6">
            <div class="card p-3 shadow rounded-4">
                <h5 class="text-center mb-3">Parcel Status Overview</h5>
                <canvas id="statusChart" height="200"></canvas>
            </div>
        </div>

        <!-- Branch Revenue (Admin only) -->
        <?php if ($isAdmin): ?>
        <div class="col-md-12">
            <div class="card p-3 shadow rounded-4">
                <h5 class="text-center mb-3">Revenue by Branch</h5>
                <canvas id="branchRevenueChart" height="200"></canvas>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const revLabels = <?php echo json_encode($revLabels); ?>;
const revData = <?php echo json_encode($revData); ?>;
const statusLabels = <?php echo json_encode($statusLabels); ?>;
const statusData = <?php echo json_encode($statusData); ?>;

new Chart(document.getElementById('revenueChart'), {
    type: 'line',
    data: {
        labels: revLabels,
        datasets: [{
            label: 'Revenue (৳)',
            data: revData,
            borderColor: '#0d6efd',
            backgroundColor: 'rgba(13,110,253,0.2)',
            fill: true,
            tension: 0.3
        }]
    },
    options: { responsive: true, scales: { y: { beginAtZero: true } } }
});

new Chart(document.getElementById('statusChart'), {
    type: 'pie',
    data: {
        labels: statusLabels,
        datasets: [{
            data: statusData,
            backgroundColor: ['#0d6efd', '#ffc107', '#198754', '#20c997', '#6f42c1', '#dc3545']
        }]
    },
    options: { responsive: true, plugins: { legend: { position: 'bottom' } } }
});

<?php if ($isAdmin): ?>
const branchLabels = <?php echo json_encode($branchLabels); ?>;
const branchData = <?php echo json_encode($branchData); ?>;
new Chart(document.getElementById('branchRevenueChart'), {
    type: 'bar',
    data: {
        labels: branchLabels,
        datasets: [{
            label: 'Branch Revenue (৳)',
            data: branchData,
            backgroundColor: '#198754'
        }]
    },
    options: { responsive: true, scales: { y: { beginAtZero: true } } }
});
<?php endif; ?>
</script>
