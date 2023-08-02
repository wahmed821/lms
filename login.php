<?php
include_once("config/config.php");
include_once(DIR_URL . "config/database.php");
include_once(DIR_URL . "models/auth.php");

# check cookies
if (isset($_COOKIE['login_status'])) {
    //Read user info from cookies
    $user_json = $_COOKIE['login_user'];
    $user = json_decode($user_json, true);
    $_SESSION['is_user_login'] = true;
    $_SESSION['user'] = $user;

    header("LOCATION: " . BASE_URL . 'dashboard.php');
    exit;
}

# Form submission
if (isset($_POST['submit'])) {
    $res = login($conn, $_POST);
    if ($res['status'] == true) {
        $_SESSION['is_user_login'] = true;
        $_SESSION['user'] = $res['user'];

        # Keep me logged in
        if (isset($_POST['keep_logged_in']) && $_POST['keep_logged_in'] == 'on') {
            # 7 days seconds
            $expire_time = time() + (7 * (24 * 60 * 60));
            setcookie("login_status", "login", $expire_time, "/");

            // Array to json conversion
            $user_json = json_encode($_SESSION['user'], true);
            setcookie("login_user", $user_json, $expire_time, "/");
        }

        header("LOCATION: " . BASE_URL . 'dashboard.php');
        exit;
    } else {
        $_SESSION['error'] = "Invalid login information";
        header("LOCATION: " . BASE_URL);
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
    <title>Login | Star Library</title>
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
                                <p class="card-text">Enter email and password to login</p>
                                <?php include_once(DIR_URL . "include/alerts.php"); ?>
                                <form method="post" action="<?php echo BASE_URL ?>login.php">
                                    <div class="mb-3">
                                        <label class="form-label">Email address</label>
                                        <input type="email" class="form-control" name="email" required />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password" required />
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="keep_logged_in" id="keep_logged_in">
                                        <label class="form-check-label" for="keep_logged_in">
                                            Keep me logged in for 7 days
                                        </label>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary mt-4">Login</button>
                                </form>

                                <hr />

                                <a href="./forgot-password.php" class="card-text text-center link-underline-light">Forgot Password?</a>
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