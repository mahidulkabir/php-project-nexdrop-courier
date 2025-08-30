<?php
require('./includes/header.php');

require('./configs/config.php');

?>
<!-- Extra CSS -->
  <style>
    .card {
      transition: transform 0.2s ease, box-shadow 0.3s ease;
    }
    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
    }
    .form-control:focus {
      border-color: #4e73df;
      box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
    }
    .btn:hover {
      background: linear-gradient(135deg, #1e3c72, #4e73df) !important;
      transform: scale(1.02);
    }
  </style>

<body class="hold-transition login-page starter-page-page">

  <?php
  // filtering function 
  function input_filter($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  ;


  if (isset($_POST['btnlogin'])) {
    // filtering user input 
    $email_given = input_filter($_POST['email']);
    $password_given = input_filter($_POST['password']);

    // escaping special symbols used in sql commands 
    $email_given = mysqli_real_escape_string($conn, $email_given);
    $password_given = mysqli_real_escape_string($conn, $password_given);

    // query template 
    // $query = "SELECT first_name, email, password FROM users WHERE email =? and password =?";
    $query = "SELECT emp_id, first_name, email, password, role, branch_id FROM users WHERE email =? and password =?";


    // prepared statement 
    if ($stmt = mysqli_prepare($conn, $query)) {
      mysqli_stmt_bind_param($stmt, "ss", $email_given, $password_given); // binding values
      mysqli_stmt_execute($stmt); // execute prepared stmt
      mysqli_stmt_store_result($stmt); // storing result
  
      if (mysqli_stmt_num_rows($stmt) == 1) {
        // bind the actual columns from result to PHP variables
        // mysqli_stmt_bind_result($stmt, $_first_name, $_email, $_password);
        // mysqli_stmt_bind_result($stmt, $_id, $_first_name, $_role, $_email, $_password);
        mysqli_stmt_bind_result($stmt, $_emp_id, $_first_name, $_email, $_password, $_role, $_branch_id);

        mysqli_stmt_fetch($stmt); // fetch the data into variables
  
        session_start();
        $_SESSION['s_id'] = $_emp_id;           // user id
        $_SESSION['s_f_name'] = $_first_name;
        $_SESSION['s_role'] = $_role;
        $_SESSION['s_br_id'] = $_branch_id;

        header('location:home.php?page=11');
      } 
      ;
    }
    ;
    mysqli_stmt_close($stmt);
  }
  ;
  ?>


      <div class="login-box">
    <div class="card shadow-lg border-0 rounded-4">
      <!-- Header -->
      <div class="card-header text-center text-white rounded-top" 
           style="background: linear-gradient(135deg, #4e73df, #1e3c72);">
        <h3 class="mb-0 fw-bold">NexDrop Courier</h3>
        <small class="text-light">The next step in delivery</small>
      </div>

      <!-- Body -->
      <div class="card-body p-4">
        <p class="text-center text-muted fw-semibold mb-4">Admin and Employee login only</p>

        <?php if (!empty($error)) { ?>
          <div class="alert alert-danger py-2 text-center">
            <?= $error ?>
          </div>
        <?php } ?>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
          <!-- Email -->
          <div class="mb-3">
            <label for="email" class="form-label fw-semibold">Email</label>
            <div class="input-group">
              <span class="input-group-text bg-light"><i class="fas fa-envelope text-primary"></i></span>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
            </div>
          </div>

          <!-- Password -->
          <div class="mb-3">
            <label for="password" class="form-label fw-semibold">Password</label>
            <div class="input-group">
              <span class="input-group-text bg-light"><i class="fas fa-lock text-primary"></i></span>
              <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
            </div>
          </div>

          <!-- Remember + Forgot -->
          <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="form-check">
              <input class="form-check-input border-primary" type="checkbox" id="remember">
              <label class="form-check-label" for="remember">Remember Me</label>
            </div>
            <a href="forgot-password.html" class="small text-decoration-none text-primary fw-semibold">Forgot password?</a>
          </div>

          <!-- Submit -->
          <button type="submit" name="btnlogin" 
                  class="btn w-100 fw-semibold text-white" 
                  style="background: linear-gradient(135deg, #4e73df, #1e3c72); border: none; border-radius: 8px; transition: 0.3s;">
            <i class="fas fa-sign-in-alt me-1"></i> Sign In
          </button>
        </form>
      </div>
    </div>
  </div>

  

  



  <?php
  require('./includes/scripts.php');
  ?>
</body>

</html>