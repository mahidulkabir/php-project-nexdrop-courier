<div class="card">
  <div class="card-header">
    <h3 class="card-title fs-3 fw-semibold">Manage Parcels </h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table class="table table-bordered">
      <thead>
        <tr>

          <th>Order ID</th>
          <th>Sender Name</th>
          <th>Recipient Name</th>
          <th>From Branch</th>
          <th>To Branch</th>
          <th>Parcel Actions</th>
          <th>Parcel Status</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT 
                        p.id,
                        p.order_id,
                        p.sender_name,
                        p.recipient_name,
                        fb.br_name AS from_branch,
                        tb.br_name AS to_branch,
                        ps.status_name,
                        p.status_id,
                        p.from_br_id,
                        p.to_br_id
                        FROM parcels p
                        JOIN branches fb ON p.from_br_id = fb.id
                        JOIN branches tb ON p.to_br_id = tb.id
                        JOIN parcel_status ps ON p.status_id = ps.id";


        if ($user_branch_id != 0) {
          $sql .= " WHERE p.from_br_id = $user_branch_id OR p.to_br_id = $user_branch_id";
        };
        $result = mysqli_query($conn, $sql);

        $all_status = [];
        $res_status = mysqli_query($conn, "SELECT * FROM parcel_status");
        while($result_status = mysqli_fetch_assoc($res_status)){
          $all_statuses[$result_status['id']] = $result_status['status_name'];
        };


        if (mysqli_num_rows($result) > 0) {

          while ($data = mysqli_fetch_assoc($result)) {
            $id = $data['id'];
            echo "<tr>";
            echo "<td>" . $data['order_id'] . "</td>";
            echo "<td>" . $data['sender_name'] . "</td>";
            echo "<td>" . $data['recipient_name'] . "</td>";
            echo "<td>" . $data['from_branch'] . "</td>";
            echo "<td>" . $data['to_branch'] . "</td>";


            echo " <td>
					<div class='d-flex gap-2'>
          <form  method='post'>
            <input type='hidden' name='txtId' value='$id' />
            <button type='submit' name='btnDelete' class='btn btn-danger'>
                 <i class='bi bi-trash'></i>
           </button>
          </form>
          <form action='home.php?page=9' method='post' style='display:inline'>
           <input type='hidden' name='id' value='$id' />
            <button type='submit' name='btnEdit' class='btn btn-warning'>
                         <i class='bi bi-pencil-square'></i>
             </button>
             </form>
          <form action='home.php?page=10' method='post' style='display:inline'>
           <input type='hidden' name='id' value='$id' />
            <button type='submit' name='btnEdit' class='btn btn-warning'>
                        <i class='bi bi-printer'></i>
             </button>
             </form>
              </div>
					</td>";
          $current_status_id = $data['status_id'];
          $current_status = $data['status_name'];

          // Check permissions
          $can_update = ($user_branch_id == 0 ||
                        $user_branch_id == $data['from_br_id'] ||
                        $user_branch_id == $data['to_br_id']);

          echo "<td>";
          if ($can_update) {
              echo "
              <form class='status-form d-flex gap-2' data-id='{$id}'>
                  <select name='status_id' class='form-select form-select-sm shadow-none fw-bold'>";
              foreach ($all_statuses as $sid => $sname) {
                  $selected = ($sid == $current_status_id) ? "selected" : "";
                  echo "<option value='$sid' $selected>$sname</option>";
              }
              echo "</select>
                    <button type='submit' class='btn btn-sm btn-primary'>Update</button>
              </form>";
          } else {
              echo $current_status;
          }
          echo "</td>";

                echo 	"</tr>";
                    };
                  }
        ?>
      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
  <div class="card-footer clearfix">
    <ul class="pagination pagination-sm m-0 float-right">
      <li class="page-item"><a class="page-link" href="#">«</a></li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item"><a class="page-link" href="#">»</a></li>
    </ul>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).on("submit", ".status-form", function(e) {
    e.preventDefault();

    var form = $(this);
    var parcel_id = form.data("id");
    var status_id = form.find("select[name='status_id']").val();

    $.ajax({
        url: "./pages/parcels/update_status_ajax.php",
        method: "POST",
        data: { parcel_id: parcel_id, status_id: status_id },
        success: function(response) {
            if (response === "ok") {
                alert("✅ Status updated successfully");
            } else if (response === "unauthorized") {
                alert("❌ You are not allowed to update this parcel.");
            } else {
                alert("⚠️ Error: " + response);
            }
        }
    });
});
</script>