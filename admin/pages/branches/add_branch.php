<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Add New Branch</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="POST">
        <div class="card-body">
            <div class="form-group">
                <label>Branch Address</label> <br>
                <input type="text" class="form-control"  name="br_road" placeholder="Enter road"> <br>
                <input type="text" class="form-control"  name="br_upazilla" placeholder="Enter Upazilla"> <br>
                <input type="text" class="form-control"  name="br_zilla" placeholder="Enter zilla">
            </div>
            <div class="form-group">
                <label for="br_contact">Contact</label>
                <input type="text" class="form-control" id="br_contact" name="br_contact" placeholder="Enter Contact">
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