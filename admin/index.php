<?php
require('./includes/header.php');

require('./configs/config.php');

?>

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
    $query = "SELECT emp_id, first_name, email, password, role FROM users WHERE email =? and password =?";


    // prepared statement 
    if ($stmt = mysqli_prepare($conn, $query)) {
      mysqli_stmt_bind_param($stmt, "ss", $email_given, $password_given); // binding values
      mysqli_stmt_execute($stmt); // execute prepared stmt
      mysqli_stmt_store_result($stmt); // storing result
  
      if (mysqli_stmt_num_rows($stmt) == 1) {
        // bind the actual columns from result to PHP variables
        // mysqli_stmt_bind_result($stmt, $_first_name, $_email, $_password);
        // mysqli_stmt_bind_result($stmt, $_id, $_first_name, $_role, $_email, $_password);
        mysqli_stmt_bind_result($stmt, $_emp_id, $_first_name, $_email, $_password, $_role);

        mysqli_stmt_fetch($stmt); // fetch the data into variables
  
        session_start();
        $_SESSION['s_id'] = $_emp_id;           // user id
        $_SESSION['s_f_name'] = $_first_name;
        $_SESSION['s_role'] = $_role;

        header('location:home.php');
      } else {
        $error = "Invalid email or password";
        echo $error;
      }
      ;
    }
    ;
    mysqli_stmt_close($stmt);
  }
  ;
  ?>


  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="../../index2.html" class="h1"><b>NexDrop Courier</b></a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Sign in to start working</p>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
          <div class="input-group mb-3">
            <input type="email" class="form-control" name="email" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">

              <button type="submit" name="btnlogin" class="btn btn-primary btn-block">Sign In</button>


            </div>
            <!-- /.col -->
          </div>
        </form>


        <!-- /.social-auth-links -->

        <p class="mb-1">
          <a href="forgot-password.html">I forgot my password</a>
        </p>

      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <?php
  require('./includes/scripts.php');
  ?>
</body>

</html>