<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title fs-3 fw-semibold" >Add New Employee</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="POST">
        <div class="card-body">
            <div class="form-group">
                <label>First Name</label> <br>
                <input type="text" class="form-control"  name="user_f_name" placeholder="Enter First Name"> 
            </div>
            <div class="form-group">
                <label>Last Name</label> <br>
                <input type="text" class="form-control"  name="user_l_name" placeholder="Enter Last Name"> 
            </div>
            <div class="form-group">
                <label>Email</label> <br>
                <input type="email" class="form-control"  name="user_email" placeholder="Enter Email"> 
            </div>
            <div class="form-group">
                <label>Password</label> <br>
                <input type="password" class="form-control"  name="user_password" placeholder="Enter Password"> 
            </div>
            <div class="form-group">
              <label >Contact</label>
              <input type="text" class="form-control"  name="user_contact" placeholder="Enter Contact No">
            </div>
            <div class="form-group">
                <label>Role</label> <br>
                <input type="text" class="form-control"  name="user_role" placeholder="Enter Role"> 
            </div>
            
            <div class="form-group">
                <label>Branch ID</label> <br>
                <input type="text" class="form-control"  name="user_branch_id" placeholder="Enter Branch ID"> 
            </div>


        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary" name="btn-submit-br">Create Branch</button>
        </div>
    </form>
</div>

<?php
if (isset($_POST['btn-submit-br'])) {

    $br_road = $_POST['br_road'];

    $br_upazilla = $_POST['br_upazilla'];

    $br_zilla = $_POST['br_zilla'];

    $br_contact = $_POST['br_contact'];

    $sql = "INSERT INTO `branches`(`road`, `upazilla`, `zilla`, `contact`) 

           VALUES ('$br_road','$br_upazilla','$br_zilla','$br_contact')";

    $result = $conn->query($sql);

     if ($result == TRUE) {
      $mesg = "<script> alert('branch added successfully')</script>";
    echo $mesg;
     

    }else{

     $mesg = "<script> alert('something wrong')</script>";
    echo $mesg;

    }

    $conn->close();

  } 
?>