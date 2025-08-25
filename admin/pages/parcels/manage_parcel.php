
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
                      <th >Recipient Name</th>
                      <th >From Branch</th>
                      <th >To Branch</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                $br_manage = $conn->query("SELECT id, order_id, sender_name, recipient_name, from_br_id, to_br_id FROM parcels");
                while (list($id, $order_id, $sender_name, $recipient_name, $from_branch, $to_branch) = $br_manage->fetch_row()) {
                  echo "<tr> 
					<td>$order_id</td>
					<td>$sender_name</td>
					<td>$recipient_name</td>
					<td>$from_branch</td>
					<td>$to_branch</td>
					<td> 
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
              </div>
					</td>
				</tr>";
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