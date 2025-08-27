<?php
if (isset($_POST['btn_update'])) {

    $id = $_POST['id'];
    $order_id = $_POST['order_id'];

    $created_by = $_POST['created_by'];

    $sender_name = $_POST['sender_name'];

    $sender_address = $_POST['sender_address'];

    $sender_contact = $_POST['sender_contact'];

    $sender_nid = $_POST['sender_nid'];

    $recipient_name = $_POST['recipient_name'];

    $recipient_address = $_POST['recipient_address'];

    $recipient_contact = $_POST['recipient_contact'];

    $from_branch = $_POST['from_branch'];

    $to_branch = $_POST['to_branch'];

    $parcel_weight = $_POST['parcel_weight'];

    $parcel_risk_level = $_POST['parcel_risk_level'];

    $parcel_price = $_POST['parcel_price'];

    $parcel_status = $_POST['parcel_status'];

    $sql = "UPDATE parcels SET order_id='$order_id', created_by='$created_by', sender_name='$sender_name', sender_address='$sender_address', sender_contact='$sender_contact', sender_nid='$sender_nid', recipient_name='$recipient_name', recipient_add='$recipient_address', recipient_contact='$recipient_contact', from_br_id='$from_branch', to_br_id='$to_branch', weight='$parcel_weight', risk_type='$parcel_risk_level', price='$parcel_price', status='$parcel_status' WHERE id='$id'";

    $result = $conn->query($sql);

    if ($result == TRUE) {
        $mesg = "Parcel Updated Successfully";
        echo $mesg;


    } else {

        $mesg = "Parcel creation failed";
        echo $mesg;

    }


    $conn->close();

};


if(isset($_POST['btnEdit'])){
    $id = $_POST["id"];
    $parcel_table = $conn->query("SELECT * FROM parcels WHERE id='$id'");
    list($_id, $order_id, $created_by, $sender_name, $sender_address, $sender_contact, $sender_nid ,  $recipient_name, $recipient_add,  $recipient_contact, $from_br_id,  $to_br_id, $weight,$risk_type, $price, $status) = $parcel_table->fetch_row();
};


?>



<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title fs-3 fw-semibold">Edit Parcel</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->

    <form method="POST">
        <div class="card-body">

            <!-- branch section  -->
            <div class="row bg-white">
                <div class="col-lg-12 shadow  row mt-2">
                    <h3>Branch Information</h3>
                    <div class="form-group">
                <input type="hidden" class="form-control"  name="id" value="<?php echo $id ?>">
              </div>
                    <div class="form-group col-6 ">

                        <label>Order ID</label> <br>
                        <input type="text" class="form-control" name="order_id" value="<?php echo $order_id ?>">
                    </div>
                    <div class="form-group col-6 ">
                        <label>Created By</label> <br>

                        <!-- mysql selected dropdown menu syntax  -->
                        <select name="created_by" class="form-control">
                <?php
                $sql_2 = "SELECT id, emp_id FROM users";
                $my_query_2 = $conn->query($sql_2);
                while ($data = mysqli_fetch_array($my_query_2)) {
                  $br_id = $data['id'];
                  $emp_id = $data['emp_id'];
                ?>

                  <option value='<?php echo $br_id ?>'
                    <?php if ($br_id == $id) {
                      echo 'selected';
                    } ?>><?php echo $emp_id ?></option>;

                  
                  <!-- here selected gets the exact value and match the product category  -->
                <?php
                }

                ?>


              </select>
                    </div>
                </div>

                <div class="col-lg-12 shadow row my-4 justify-content-between">
                    <!-- sender section  -->

                    <div class="col-lg-6 col-md-6 p-2  rounded">
                        <h3>Sender Information</h3>
                        <div class="form-group ">
                            <label>Sender Name</label> <br>
                            <input type="text" class="form-control" name="sender_name" value="<?php echo $sender_name ?>">
                        </div>
                        <div class="form-group ">
                            <label>Sender Contact</label>
                            <input type="text" class="form-control" name="sender_contact"
                                value="<?php echo $sender_contact ?>" >
                        </div>
                        <div class="form-group ">
                            <label>Sender NID</label> <br>
                            <input type="text" class="form-control" name="sender_nid" value="<?php echo $sender_nid ?>" >
                        </div>


                        <div class="form-group ">
                            <label>Sender address</label> <br>
                            <textarea class="form-control" name="sender_address"  
                                rows="3" style="resize: none;"> <?php echo $sender_address ?></textarea>
                        </div>
                    </div>


                    <!-- recipient section -->
                    <div class="col-lg-5 col-md-5 p-2  rounded">
                        <h3>Recipient Information</h3>
                        <div class="form-group ">
                            <label>Recipient Name</label> <br>
                            <input type="text" class="form-control" name="recipient_name"
                                value="<?php echo $recipient_name ?>" >
                        </div>
                        <div class="form-group ">
                            <label>Recipient Contact</label> <br>
                            <input type="text" class="form-control" name="recipient_contact"
                                value="<?php echo $recipient_contact ?>" >
                        </div>
                        
                        <div class="form-group ">
                            <label>Recipient address</label> <br>
                            <textarea class="form-control" name="recipient_address"  
                                rows="3" style="resize: none;" > <?php echo $recipient_add ?></textarea>
                        </div>
                    </div>
                </div>



            <div class="row col-lg-12 shadow">
                <h3>Parcel Information</h3>

                <div class="form-group col-lg-3 col-md-3 ">
                    <label>From Branch</label> <br>

                    <!-- selected dropdown syntax  -->
                   <select name="from_branch" class="form-control">
                <?php
                $sql_2 = "SELECT id, br_name FROM branches";
                $my_query_2 = $conn->query($sql_2);
                while ($data = mysqli_fetch_array($my_query_2)) {
                  $br_id = $data['id'];
                  $br_name = $data['br_name'];
                ?>

                  <option value='<?php echo $br_id ?>'
                    <?php if ($from_br_id == $br_id) {
                      echo 'selected';
                    } ?>><?php echo $br_name ?></option>;

                  
                  <!-- here selected gets the exact value and match the product category  -->
                <?php
                }

                ?>


              </select> 



                </div>
                <div class="form-group col-lg-3 col-md-3">
                    <label>To Branch</label> <br>
                    <!-- to branch syntax  -->
                    <select name="to_branch" class="form-control">
                <?php
                $sql_2 = "SELECT id, br_name FROM branches";
                $my_query_2 = $conn->query($sql_2);
                while ($data = mysqli_fetch_array($my_query_2)) {
                  $br_id = $data['id'];
                  $br_name = $data['br_name'];
                ?>

                  <option value='<?php echo $br_id ?>'
                    <?php if ($to_br_id == $br_id) {
                      echo 'selected';
                    } ?>><?php echo $br_name ?></option>;

                  
                  <!-- here selected gets the exact value and match the product category  -->
                <?php
                }

                ?>


              </select> 
                </div>
                <!-- parcel section  -->
                <div class="form-group col-lg-3 col-md-3">
                    <label>Parcel Weight</label> <br>
                    <input type="text" class="form-control" name="parcel_weight" value="<?php echo $weight ?>">
                </div>
                <div class="form-group col-lg-3 col-md-3">
                    <label>Parcel Risk Level</label> <br>
                    <input type="text" class="form-control" name="parcel_risk_level"
                        value="<?php echo $risk_type ?>" >
                </div>
                <div class="form-group col-lg-6 col-md-6">
                    <label>Parcel Price</label> <br>
                    <input type="text" class="form-control" name="parcel_price" value="<?php echo $price ?>" >
                </div>
                <div class="form-group col-lg-6 col-md-6">
                    <label>Parcel Status</label> <br>
                    <input type="text" class="form-control" name="parcel_status" value="<?php echo $status ?>">
                </div>
            </div>

            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary" name="btn_update">Update Parcel</button>
        </div>
    </form>
</div>

