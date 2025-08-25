<?php
if(isset($_POST['btnUpdate'])){
$id = $_POST["id"];
$br_road = $_POST["br_road"];
$br_upazilla = $_POST["br_upazilla"];
$br_zilla = $_POST["br_zilla"];
$contact = $_POST["br_contact"];
$update_user = $conn->query("update branches set road='$br_road', upazilla='$br_upazilla', zilla='$br_zilla', contact='$contact' where id='$id'");

$r = "update successful";
echo $r;
};


if(isset($_POST['btnEdit'])){
    $id = $_POST["id"];
    $branch_table = $conn->query("SELECT road, upazilla, zilla, contact FROM branches WHERE id='$id'");
    list($road, $upazilla, $zilla, $contact) = $branch_table->fetch_row();
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
                <h3 class="card-title">Branch Info Update Form</h3>
              </div>
              <!-- /.card-header -->
        
  </div>
  <div class="ftitle text-center"> 
			
		</div>
              <!-- form start -->
             <form action="#" method="post">
                  <div class="card-body">

              <div class="form-group">
                <input type="hidden" class="form-control"  name="id" value="<?php echo $id ?>">
              </div>
              <div class="form-group">
                <label for="y">Road</label>
                <input type="text" class="form-control" id="y" name="br_road" value="<?php echo $road ?>">
              </div>
              <div class="form-group">
                <label for="y">Upazilla</label>
                <input type="text" class="form-control" id="y" name="br_upazilla" value="<?php echo $upazilla ?>">
              </div>
               <div class="form-group">
                <label for="p">Zilla</label>
                <input type="text" class="form-control" id="p" name="br_zilla" value="<?php echo $zilla ?>">
              </div>
               <div class="form-group">
                <label for="r">Contact</label>
                <input type="text" class="form-control" id="r" name="br_contact" value="<?php echo $contact ?>">
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