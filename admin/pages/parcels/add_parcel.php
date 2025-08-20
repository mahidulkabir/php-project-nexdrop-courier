<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title fs-3 fw-semibold">Create New Parcel</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->

    <form method="POST">
        <div class="card-body">

            <!-- branch section  -->
            <div class="row bg-white">
                <div class="col-lg-12 shadow  row mt-2">
                    <h3>Branch Information</h3>
                    <div class="form-group col-6 ">

                        <label>Order ID</label> <br>
                        <input type="text" class="form-control" name="order_id" placeholder="Enter Order ID">
                    </div>
                    <div class="form-group col-6 ">
                        <label>Created By</label> <br>
                        <input type="text" class="form-control" name="created_by" placeholder="Select Your ID">
                    </div>
                </div>

                <div class="col-lg-12 shadow row my-4 justify-content-between">
                    <!-- sender section  -->

                    <div class="col-lg-6 col-md-6 p-2  rounded">
                        <h3>Sender Information</h3>
                        <div class="form-group ">
                            <label>Sender Name</label> <br>
                            <input type="text" class="form-control" name="sender_name" placeholder="Enter Sender Name">
                        </div>
                        <div class="form-group ">
                            <label>Sender Contact</label>
                            <input type="text" class="form-control" name="sender_contact"
                                placeholder="Enter Contact No">
                        </div>
                        <div class="form-group ">
                            <label>Sender NID</label> <br>
                            <input type="text" class="form-control" name="sender_nid" placeholder="Enter Sender NID">
                        </div>


                        <div class="form-group ">
                            <label>Sender address</label> <br>
                            <textarea class="form-control" name="sender_address" placeholder="Enter Sender Address"
                                rows="3" style="resize: none;"></textarea>
                        </div>
                    </div>


                    <!-- recipient section -->
                    <div class="col-lg-5 col-md-5 p-2  rounded">
                        <h3>Recipient Information</h3>
                        <div class="form-group ">
                            <label>Recipient Name</label> <br>
                            <input type="text" class="form-control" name="recipient_name"
                                placeholder="Enter Recipient Name">
                        </div>
                        <div class="form-group ">
                            <label>Recipient Contact</label> <br>
                            <input type="text" class="form-control" name="recipient_contact"
                                placeholder="Enter Recipient Contact">
                        </div>
                        
                        <div class="form-group ">
                            <label>Recipient address</label> <br>
                            <textarea class="form-control" name="recipient_address" placeholder="Enter Recipient Address"
                                rows="3" style="resize: none;"></textarea>
                        </div>
                    </div>
                </div>



            <div class="row col-lg-12 shadow">
                <h3>Parcel Information</h3>

                <div class="form-group col-lg-3 col-md-3 ">
                    <label>From Branch</label> <br>
                    <input type="text" class="form-control" name="from_branch" placeholder="Enter Sender Branch">
                </div>
                <div class="form-group col-lg-3 col-md-3">
                    <label>To Branch</label> <br>
                    <input type="text" class="form-control" name="to_branch" placeholder="Enter Recipient Branch">
                </div>
                <!-- parcel section  -->
                <div class="form-group col-lg-3 col-md-3">
                    <label>Parcel Weight</label> <br>
                    <input type="text" class="form-control" name="parcel_weight" placeholder="Enter Parcel Weight">
                </div>
                <div class="form-group col-lg-3 col-md-3">
                    <label>Parcel Risk Level</label> <br>
                    <input type="text" class="form-control" name="parcel_risk_level"
                        placeholder="Enter Parcel Risk Level">
                </div>
                <div class="form-group col-lg-6 col-md-6">
                    <label>Parcel Price</label> <br>
                    <input type="text" class="form-control" name="parcel_price" placeholder="Enter Parcel Price">
                </div>
                <div class="form-group col-lg-6 col-md-6">
                    <label>Parcel Status</label> <br>
                    <input type="text" class="form-control" name="parcel_status" placeholder="Enter Parcel Status">
                </div>
            </div>

            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary" name="btn-submit-User">Recieve Parcel</button>
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


    } else {

        $mesg = "User creation failed";
        echo $mesg;

    }


    $conn->close();

}
?>