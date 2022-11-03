<?php
ob_start();

// session_start();
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container px-4 px-lg-5">
    <a class="navbar-brand" href="#!"><img src="./assets/favicon.ico" width="30px"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
        <li class="nav-item"><a class="nav-link active" aria-current="page" href="./index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">All Products</a></li>
            <li>
              <hr class="dropdown-divider" />
            </li>
            <li><a class="dropdown-item" href="#">Popular Items</a></li>
            <li><a class="dropdown-item" href="#">New Arrivals</a></li>
          </ul>
        </li>
      </ul>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
        <?php
        if (isset($_SESSION['id'])) {
          echo " <li class='nav-item'><a class='nav-link active' aria-current='page' href='?success'>Logout</a></li>";
          if ($_SESSION['role'] == 'admin') {
            echo " <li class='nav-item'><a class='nav-link active' aria-current='page' href='./admin/index.php?core'>dashboard</a></li>";
          }
        } else {
          echo " <li class='nav-item'><a class='nav-link active' aria-current='page' href='./admin/login.php'>Login</a></li>";
          echo " <li class='nav-item'><a class='nav-link active' aria-current='page' href='./admin/register.php'>Signup</a></li>";

          echo "<li class='nav-item'><a class='nav-link' data-toggle='modal' data-target='#login-signup' href='#'>Login | Register</a></li>";
        }
        ?>

      </ul>
      <form class="d-flex">
        <button class="btn btn-outline-dark" type="submit">
          <i class="bi-cart-fill me-1"></i>
          Cart
          <span id="cart" class="badge bg-dark text-white ms-1 rounded-pill">0</span>
        </button>
      </form>
    </div>
  </div>
</nav>
<?php
// session_start();
if (isset($_GET['success'])) {
  session_destroy();
  echo "<script>setTimeout(function(){window.location.href='./index.php'}, 2000)</script>";
}
?>
<!-- Modal Dialog - Login/Signup ============================================= -->
<div id="login-signup" class="modal fade" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content p-sm-3">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item"> <a id="login-tab" class="nav-link active text-4" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Login</a> </li>
          <li class="nav-item"> <a id="signup-tab" class="nav-link text-4" data-toggle="tab" href="#signup" role="tab" aria-controls="signup" aria-selected="false">Sign Up</a> </li>
        </ul>
        <div class="tab-content pt-4">
          <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
            <div id="login-message-holder" style="text-align:center;color:red;"></div>
            <form id="login-form" action="https://www.btctrades.com/login" method="post">
              <input type="hidden" name="_token" value="V4nqKjhOpPB1rIqYPrlUPgWoraXXSZNJCFKnOf6Q">
              <div class="form-group">
                <input type="text" name="email" class="form-control" id="login-email" required placeholder="Username or Email">
              </div>
              <div class="form-group">
                <input type="password" name="password" class="form-control" id="login-password" required placeholder="Password">
              </div>
              <div class="row mb-4">
                <div class="col-sm">
                  <div class="form-check custom-control custom-checkbox">
                    <input id="remember-me" name="remember" class="custom-control-input" type="checkbox">
                    <label class="custom-control-label" for="remember-me">Remember Me</label>
                  </div>
                </div>
                <div class="col-sm text-right"> <a class="justify-content-end" href="forgot-password.html">Forgot Password ?</a> </div>
              </div>
              <button name="loginbtn" class="btn btn-primary btn-block" id="login-submit" type="submit">Login</button>
            </form>
          </div>
          <div class="tab-pane fade" id="signup" role="tabpanel" aria-labelledby="signup-tab">
            <div id="register-message-holder" style="text-align:center;color:red;"></div>
            <form id="register-form" action="https://www.btctrades.com/register" method="post">
              <input type="hidden" name="_token" value="V4nqKjhOpPB1rIqYPrlUPgWoraXXSZNJCFKnOf6Q">
              <div class="form-group">
                <input type="text" name="email" class="form-control" data-bv-field="number" id="register-email" required placeholder="Email Address">
              </div>
              <div class="form-group">
                <input type="text" name="phone" class="form-control" id="register-phone" required placeholder="Phone Number">
              </div>
              <div class="form-group">
                <input type="password" name="password" class="form-control" id="register-password" required placeholder="Password">
              </div>
              <button name="signupbtn" class="btn btn-primary btn-block" id="register-submit" type="submit">Signup</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>