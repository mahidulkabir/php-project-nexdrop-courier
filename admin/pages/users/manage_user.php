

<div class="card">
              <div class="card-header">
                <h3 class="card-title fs-3 fw-semibold">Employee Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th >Employee ID</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th >Email</th>
                      <th >Password</th>
                      <th >Contact No</th>
                      <th >Role</th>
                      <th >Branch ID</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                $user_add = $conn->query("select * from users");
                    while (list($id, $f_name, $l_name, $email, $password, $contact,$role,$br_id) = $user_add->fetch_row()) {
                  echo "<tr> 
					<td>$id</td>
					<td>$f_name</td>
					<td>$l_name</td>
					<td>$email</td>
					<td>$password</td>
					<td>$contact</td>
					<td>$role</td>
					<td>$br_id</td>
					<td> 
					
          <form action='home.php?page=2' method='post'>
            <input type='hidden' name='txtId' value='$id' />
            <input type='submit' name='btnDelete' class='material-icons red600' value='delete'>
          </form>
          <form action='home.php?page=3' method='post' style='display:inline'>
           <input type='hidden' name='id' value='$id' />
           <input type='submit' name='btnEdit'  class='material-icons red600' value='edit'>
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