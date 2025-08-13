<?php
require('./includes/header.php');

require('./configs/config.php');

?>

<body class="hold-transition login-page starter-page-page">

  <?php
  if (isset($_POST['btnlogin'])) {
    $email_given = trim($_POST['email']);
    $password_given = trim($_POST['password']);
    $user_table = $conn->query("select email, password form users where email = '$email_given' and passwoed = '$password_given'");
    list($_email, $_password) = $user_table->fetch_row();
    if(isset($_email)){}
    $_SESSION['s_email'] = $_email;
    header('location: admin/home.php');
  } else{
    $error = "Invalid Email or Password";
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

        <form action="#" method="post">
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