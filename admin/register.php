<?php include '../includes/header.php';
$msg = "";
if (isset($_POST['signup'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
    // echo $pwd_confirm = password_hash($_POST['pwd_confirm'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    // $sex = $_POST['sex'];

    $select = mysqli_query($conn, "SELECT fname, email FROM customer WHERE email = '$email' && fname = '$fname'");
    $count = ($select->num_rows);
    if ($count > 0) {
        $msg = "<div class='alert alert-info'>Username already exist! </div>";
    }
    // } elseif ($pwd !== $pwd_confirm) {
    //     $msg = "<div class='alert alert-info'>Password Mis-matched </div>";    } 
    elseif ($fname == '' || $email == '' || $pwd == '') {
        $msg = "<div class='alert alert-info'>All fields are required </div>";
    } else {
        $qry = mysqli_query($conn, "INSERT INTO customer(fname,lname,phone, email,dob,address, city,image,  password) VALUES('$fname', '$lname','', '$email','','','','', '$pwd')");
        if ($qry) {
            $msg = "<div class='alert alert-info'>Your account has been created, Login to continue!</div>";
        } else {
            $msg = "<div class='alert alert-info'>Query Failed</div>" . die(mysqli_error($conn));
        }
    }
}

?>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Create Account</h3>
                                </div>
                                <div class="card-body">
                                    <?php echo $msg; ?>
                                    <form action="./login.php?account_create" method="post" enctype="multi/data">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input name="fname" class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" />
                                                    <label for="inputFirstName">First name</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input name="lname" class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" />
                                                    <label for="inputLastName">Last name</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input name="email" class="form-control" id="inputEmail" type="email" placeholder="name@example.com" />
                                            <label for="inputEmail">Email address</label>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input name="pwd" class="form-control" id="inputPassword" type="password" placeholder="Create a password" />
                                                    <label for="inputPassword">Password</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input name="pwd_confirm" class="form-control" id="inputPasswordConfirm" type="password" placeholder="Confirm password" />
                                                    <label for="inputPasswordConfirm">Confirm Password</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-4 mb-0">
                                            <div class="d-grid"><button type="submit" name="signup" class="btn btn-primary btn-block">Create Account</button></div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="login.php">Have an account? Go to login</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2022</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>