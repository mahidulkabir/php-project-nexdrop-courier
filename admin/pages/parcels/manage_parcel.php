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
                        tb.br_name AS to_branch
                        FROM parcels p
                        JOIN branches fb ON p.from_br_id = fb.id
                        JOIN branches tb ON p.to_br_id = tb.id";
        if($user_branch_id != 0){
          $sql .= " WHERE p.from_br_id = $user_branch_id OR p.to_br_id = $user_branch_id";
        };
        $result = mysqli_query($conn, $sql);
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
          <form action='home.php?page=2' method='post'>
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
					</td>
				</tr>";
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