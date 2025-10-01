<?php
if (isset($_POST['btnUpdate'])) {
  $id = $_POST["id"];
  $fname = $_POST["fname"];
  $lname = $_POST["lname"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $contact = $_POST["contact"];
  $update_user = $conn->query("UPDATE users SET first_name = '$fname', last_name = '$lname', email = '$email',password = '$password', contact = '$contact' where id = '$id'");
  $r = "update successful";
  echo $r;
};


if (isset($_POST['btnEdit'])) {
  $id = $_POST["id"];
  $user_table = $conn->query("SELECT first_name, last_name, email, password,contact, role, branch_id FROM users WHERE id='$id'");
  list($f_name, $l_name, $email, $password, $contact, $role, $br_id) = $user_table->fetch_row();
};
?>

<!-- content wrapper. contains page content  -->
 
<!-- Content Wrapper. Contains page content -->


<div class="content-wrapper">

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
      </div>
      <div class="card-body">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">User Update Form</h3>
          </div>
          <!-- /.card-header -->

        </div>
        <div class="ftitle text-center">

        </div>
        <!-- form start -->
        <form action="#" method="post">
          <div class="card-body">

            <div class="form-group">
              <input type="hidden" class="form-control" name="id" value="<?php echo $id ?>">
            </div>
            <div class="form-group">
              <label for="y">First Name</label>
              <input type="text" class="form-control" id="y" name="fname" value="<?php echo $f_name ?>">
            </div>
            <div class="form-group">
              <label for="y">Last Name</label>
              <input type="text" class="form-control" id="y" name="lname" value="<?php echo $l_name ?>">
            </div>
            <div class="form-group">
              <label for="p">Email</label>
              <input type="text" class="form-control" id="p" name="email" value="<?php echo $email ?>">
            </div>
            <div class="form-group">
              <label for="r">password</label>
              <input type="text" class="form-control" id="r" name="password" value="<?php echo $password ?>">
            </div>
            <div class="form-group">
              <label for="r">Contact</label>
              <input type="text" class="form-control" id="r" name="contact" value="<?php echo $contact ?>">
            </div>
            <div class="form-group">
              <label for="r">Branch</label>

              <select name="br_name" class="form-control">
                <?php
                $sql_2 = "SELECT id, br_name FROM branches";
                $my_query_2 = $conn->query($sql_2);
                while ($data = mysqli_fetch_array($my_query_2)) {
                  $br_id = $data['id'];
                  $br_name = $data['br_name'];
                ?>

                  <option value='<?php echo $br_id ?>'
                    <?php if ($br_id == $id) {
                      echo 'selected';
                    } ?>><?php echo $br_name ?></option>;

                  
                  <!-- here selected gets the exact value and match the product category  -->
                <?php
                }

                ?>


              </select>
            </div>

          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary" name="btnUpdate">Update</button>
          </div>
        </form>
      </div>
    </div>

    <!-- /.card-footer-->
</div>
</div>
</div>

<!-- /.card-footer-->
</div>
<!-- /.card -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->