<?php
include_once("config/config.php");
include_once(DIR_URL . "config/database.php");
include_once(DIR_URL . "models/auth.php");

// If already logged in
if (isset($_SESSION['is_user_login'])) {
    header("LOCATION: " . BASE_URL . 'dashboard.php');
    exit;
}

// Forgot password functionality
if (isset($_POST['submit'])) {
    $res = forgotPassword($conn, $_POST);
    if ($res['status'] == true) {
        //$_SESSION['success'] = "Reset password code has been sent on email";
        header("LOCATION: " . BASE_URL . 'reset-password.php');
        exit;
    } else {
        $_SESSION['error'] = "No email found";
        header("LOCATION: " . BASE_URL . 'forgot-password.php');
        exit;
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./assets/css/style.css" />

    <script src="./assets/js/1c26fb5c51.js" crossorigin="anonymous"></script>
    <title>Forgot Password | Star Library</title>
</head>

<body style="background-color: #212529">
    <div class="container d-flex align-items-center justify-content-center vh-100">
        <div class="row">
            <div class="col-md-12 login-form">
                <div class="card mb-3" style="max-width: 900px">
                    <div class="row g-0">
                        <div class="col-md-5">
                            <img src="./assets/images/login-bg.jpg" class="img-fluid rounded-start" />
                        </div>
                        <div class="col-md-7">
                            <div class="card-body">
                                <h1 class="card-title text-uppercase fw-bold">
                                    star library
                                </h1>
                                <p class="card-text">Enter email to reset password</p>
                                <?php include_once(DIR_URL . "include/alerts.php"); ?>

                                <form method="post" action="<?php echo BASE_URL ?>forgot-password.php">
                                    <div class="mb-3">
                                        <label class="form-label">Email address</label>
                                        <input type="email" class="form-control" name="email" />
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </form>

                                <hr />

                                <a href="./index.php" class="card-text text-center link-underline-light">Login Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="./assets/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>