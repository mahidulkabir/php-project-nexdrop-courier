<?php
// ===== UNIQUE ORDER ID GENERATOR =====
function generateUniqueOrderId($conn)
{
    do {
        $random_number = rand(1000, 999999); // generate 4-digit number
        $order_id = "NEX" . $random_number;

        // check in database
        $check_sql = "SELECT id FROM parcels WHERE order_id = '$order_id' LIMIT 1";
        $check_result = $conn->query($check_sql);
    } while ($check_result->num_rows > 0); // keep looping if exists

    return $order_id;
}

// Generate a new order ID
$order_id = generateUniqueOrderId($conn);
?>
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

                        <label class="form-label">Order ID</label>
                        <input type="text" class="form-control" name="order_id"
                            value="<?php echo $order_id; ?>" readonly>
                    </div>
                    <div class="form-group col-6 ">
                        <label>Created By</label> <br>
                        <input type="text" class="form-control" name="created_by"
                            value="<?php echo $_SESSION['s_id']; ?>" readonly>



                    </div>
                </div>


                <div class="col-lg-12 shadow row my-4 justify-content-between">
                    <!-- sender section  -->

                    <div class="col-lg-6 col-md-6 p-2  rounded">
                        <h3>Sender Information</h3>
                        <div class="form-group ">
                            <label>Sender Name</label> <br>
                            <input type="text" class="form-control" name="sender_name" placeholder="Enter Sender Name" required>
                        </div>
                        <div class="form-group ">
                            <label>Sender Contact</label>
                            <input type="text" class="form-control" name="sender_contact"
                                placeholder="Enter Contact No" required>
                        </div>
                        <div class="form-group ">
                            <label>Sender NID</label> <br>
                            <input type="text" class="form-control" name="sender_nid" placeholder="Enter Sender NID" required>
                        </div>


                        <div class="form-group ">
                            <label>Sender address</label> <br>
                            <textarea class="form-control" name="sender_address" placeholder="Enter Sender Address"
                                rows="3" style="resize: none;" required></textarea>
                        </div>
                    </div>


                    <!-- recipient section -->
                    <div class="col-lg-5 col-md-5 p-2  rounded">
                        <h3>Recipient Information</h3>
                        <div class="form-group ">
                            <label>Recipient Name</label> <br>
                            <input type="text" class="form-control" name="recipient_name"
                                placeholder="Enter Recipient Name" required>
                        </div>
                        <div class="form-group ">
                            <label>Recipient Contact</label> <br>
                            <input type="text" class="form-control" name="recipient_contact"
                                placeholder="Enter Recipient Contact" required>
                        </div>

                        <div class="form-group ">
                            <label>Recipient address</label> <br>
                            <textarea class="form-control" name="recipient_address" placeholder="Enter Recipient Address"
                                rows="3" style="resize: none;" required></textarea>
                        </div>
                    </div>
                </div>



                <div class="row col-lg-12 shadow">
                    <h3>Parcel Information</h3>

                    <div class="form-group col-lg-3 col-md-3 ">
                        <label>From Branch</label> <br>
                        <!-- <input type="text"  placeholder="Enter Sender Branch"> -->
                        <select name="from_branch" class="form-control" required>
                            <?php
                            $sql_2 = "SELECT id, br_name FROM branches";
                            $my_query_2 = $conn->query($sql_2);
                            while ($data = mysqli_fetch_array($my_query_2)) {
                                $user_id = $data['id'];
                                $emp_id = $data['br_name'];
                            ?>

                                <option value='<?php echo $user_id ?>'
                                    <?php if ($user_id == $_SESSION['s_br_id']) {
                                        echo 'selected';
                                    } ?>><?php echo $emp_id ?></option>;


                                <!-- here selected gets the exact value and match the product category  -->
                            <?php
                            }

                            ?>


                        </select>
                    </div>
                    <div class="form-group col-lg-3 col-md-3">
                        <label>To Branch</label> <br>
                        <!-- <input type="text" class="form-control" name="to_branch" placeholder="Enter Recipient Branch"> -->
                        <select class="form-control" name="to_branch" required>
                            <?php
                            $sql = "SELECT id, br_name FROM branches";
                            $my_query = $conn->query($sql);
                            while ($data = mysqli_fetch_array($my_query)) {
                                $data_id = $data['id'];
                                $data_name = $data['br_name'];
                                echo "<option value='$data_id'> $data_name </option>";
                            }
                            ?>
                        </select>


                    </div>
                    <!-- parcel section  -->
                    <div class="form-group col-lg-3 col-md-3">
                        <label>Parcel Weight (kg)</label> <br>
                        <input type="number" step="0.01" class="form-control" name="parcel_weight" id="parcel_weight" placeholder="Enter Parcel Weight" required>

                    </div>
                    <div class="form-group col-lg-3 col-md-3">
                        <label>Parcel Risk Level</label> <br>
                        <select name="parcel_risk_level" id="risk_type" class="form-control" required>
                            <option value="low" selected>Low Risk</option>
                            <option value="high">High Risk</option>
                        </select>
                    </div>
                    <div class="form-group col-lg-6 col-md-6">
                        <label>Parcel Price</label> <br>
                        <input type="text" class="form-control" name="parcel_price" id="parcel_price" readonly>
                    </div>
                    <div class="form-group col-lg-6 col-md-6">
                        <label>Parcel Status</label> <br>
                        <input type="text" class="form-control" name="parcel_status" value="1" placeholder="Accepted By Courier">
                    </div>
                </div>

            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary" name="btn-submit-user">Recieve Parcel</button>
        </div>
    </form>
</div>

<?php
if (isset($_POST['btn-submit-user'])) {

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

    $sql = "INSERT INTO `parcels`(`order_id`, `created_by`, `sender_name`, `sender_address`, `sender_contact`, `sender_nid`, `recipient_name`, `recipient_add`, `recipient_contact`, `from_br_id`, `to_br_id`, `weight`, `risk_type`, `price`, `status_id`)  VALUES ('$order_id','$created_by','$sender_name','$sender_address','$sender_contact','$sender_nid','$recipient_name','$recipient_address','$recipient_contact','$from_branch','$to_branch','$parcel_weight','$parcel_risk_level','$parcel_price','$parcel_status')";

    $result = $conn->query($sql);

    if ($result == TRUE) {
        $mesg = "Created Parcel Successfully";
        echo $mesg;
    } else {

        $mesg = "Parcel creation failed";
        echo $mesg;
    }


    $conn->close();
}
?>
<script>
    function calculatePrice() {
        let weight = parseFloat(document.getElementById("parcel_weight").value) || 0;
        let risk = document.getElementById("risk_type").value;
        let price = 0;
        // basic rule for price
        if (weight > 0 && weight <= 0.1) price = 50;
        else if (weight > 0.1 && weight <= 0.2) price = 70;
        else if (weight > 0.2 && weight <= 0.3) price = 100;
        else if (weight > 0.3 && weight <= 0.5) price = 120;
        else if (weight > 0.5 && weight <= 1) price = 150;
        else if (weight > 1) {
            // 150 for 1kg, then +20 for every extra kg
            price = 150 + (Math.ceil(weight - 1) * 20);
        }

        // If high risk → add 50
        if (risk === "high") {
            price += 50;
        }
        document.getElementById("parcel_price").value = price;
        
    };
    document.getElementById("parcel_weight").addEventListener("input", calculatePrice);
    document.getElementById("risk_type").addEventListener("change", calculatePrice);
</script>