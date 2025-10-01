<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require('./configs/config.php');

// Check if user is logged in
if (!isset($_SESSION['s_id'])) {
    header("location: index.php");
    exit();
}

$user_emp_id = $_SESSION['s_id']; // "nexemp001"

// Handle form submission
if (isset($_POST['btnUpdate'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $contact = $_POST['contact'];

    $stmt = $conn->prepare("UPDATE users SET email=?, password=?, contact=? WHERE emp_id=?");
    $stmt->bind_param("ssss", $email, $password, $contact, $user_emp_id);
    $stmt->execute();

    $msg = "Profile updated successfully!";
}

// Fetch current user data from DB using emp_id
$stmt = $conn->prepare("SELECT email, password, contact FROM users WHERE emp_id=?");
$stmt->bind_param("s", $user_emp_id);
$stmt->execute();
$result = $stmt->get_result();
$userData = $result->fetch_assoc();
$stmt->close();

// Safe fallback
$emailVal = $userData['email'] ?? '';
$passVal = $userData['password'] ?? '';
$contactVal = $userData['contact'] ?? '';
?>

<div class="content-wrapper">
  <section class="content">
    <div class="card">
      <div class="card-header bg-primary text-white">
        <h3 class="card-title">Edit Your Profile</h3>
      </div>
      <div class="card-body">

        <?php if (!empty($msg)): ?>
          <div class="alert alert-success"><?php echo $msg; ?></div>
        <?php endif; ?>

        <form method="post">
          <div class="form-group mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control"
                   value="<?php echo htmlspecialchars($emailVal); ?>" required>
          </div>

          <div class="form-group mb-3">
            <label>Password</label>
            <input type="text" name="password" class="form-control"
                   value="<?php echo htmlspecialchars($passVal); ?>" required>
          </div>

          <div class="form-group mb-3">
            <label>Contact</label>
            <input type="text" name="contact" class="form-control"
                   value="<?php echo htmlspecialchars($contactVal); ?>" required>
          </div>

          <button type="submit" name="btnUpdate" class="btn btn-success">Update</button>
          <a href="home.php?page=11" class="btn btn-secondary">Back</a>
        </form>
      </div>
    </div>
  </section>
</div>
