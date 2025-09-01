<div class="card">
              <div class="card-header">
                <h3 class="card-title fs-3 fw-semibold">Branch Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-striped">
                  <thead class="thead-dark">
                    <tr>
                      <th >Br Name</th>
                      <th>Road</th>
                      <th>Upazilla</th>
                      <th >Zilla</th>
                      <th >Contact No</th>
                      <th >Manage</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                $br_add = $conn->query("select * from branches");
                while (list($id,$brname, $road, $upazilla, $zilla, $contact) = $br_add->fetch_row()) {
                  echo "<tr> 
					<td>$brname</td>
					<td>$road</td>
					<td>$upazilla</td>
					<td>$zilla</td>
					<td>$contact</td>
					<td> 
					<div class='d-flex gap-2'>
          <form action='home.php?page=2' method='post'>
            <input type='hidden' name='txtId' value='$id' />
            <button type='submit' name='btnDelete' class='btn btn-danger'>
                 <i class='bi bi-trash'></i>
           </button>
          </form>
          <form action='home.php?page=6' method='post' style='display:inline'>
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