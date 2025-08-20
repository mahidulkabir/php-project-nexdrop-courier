<h2>this is for adding new parcel </h2>
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
            <button type="submit" class="btn btn-primary" name="btn-submit-User">Create User</button>
        </div>
    </form>
</div>

<?php
if (isset($_POST['btn-submit-User'])) {

    $user_f_name = $_POST['user_f_name'];

    $user_l_name = $_POST['user_l_name'];

    $user_email = $_POST['user_email'];

    $user_password = $_POST['user_password'];

    $user_contact = $_POST['user_contact'];

    $user_role = $_POST['user_role'];

    $user_branch_id = $_POST['user_branch_id'];

    $sql = "INSERT INTO `users`(`first_name`, `last_name`, `email`, `password`,`contact`,`role`,`branch_id`) 

           VALUES ('$user_f_name','$user_l_name','$user_email','$user_password','$user_contact','$user_role','$user_branch_id')";

    $result = $conn->query($sql);

       if ($result == TRUE) {
      $mesg = "Created User Successfully";
    echo $mesg;
     

    }else{

     $mesg = "User creation failed";
    echo $mesg;

    }
    

    $conn->close();

  } 
?>