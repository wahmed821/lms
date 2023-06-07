<?php
include_once("config/config.php");
include_once(DIR_URL . "config/database.php");
include_once(DIR_URL . "include/middleware.php");
include_once(DIR_URL . "models/auth.php");
$user = $_SESSION['user'];

// Change password functionality
if (isset($_POST['password_submit'])) {
    $res = changePassword($conn, $_POST);
    if ($res['status'] == true) {
        $_SESSION['success'] = $res['message'];
        header("LOCATION: " . BASE_URL . 'my-profile.php');
        exit;
    } else {
        $_SESSION['error'] = $res['message'];
        header("LOCATION: " . BASE_URL . 'my-profile.php');
        exit;
    }
}

// profile update functionality
if (isset($_POST['profile_submit'])) {
    $res = updateProfile($conn, $_POST);
    if ($res['status'] == true) {
        $_SESSION['success'] = $res['message'];
        header("LOCATION: " . BASE_URL . 'my-profile.php');
        exit;
    } else {
        $_SESSION['error'] = $res['message'];
        header("LOCATION: " . BASE_URL . 'my-profile.php');
        exit;
    }
}

include_once(DIR_URL . "include/header.php");
include_once(DIR_URL . "include/topbar.php");
include_once(DIR_URL . "include/sidebar.php");
?>

<!--Main Container Start-->
<main class="mt-5 pt-3">
    <div class="container-fluid">
        <!--Cards-->
        <div class="row">
            <div class="col-md-12">
                <h4 class="fw-bold text-uppercase">My Profile</h4>
                <?php include_once(DIR_URL . "include/alerts.php"); ?>
            </div>

            <!--Account info form-->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Account Information
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php echo BASE_URL ?>my-profile.php" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Full Name</label>
                                        <input type="text" class="form-control" name="name" value="<?php echo $user['name'] ?>" />
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="text" class="form-control" name="email" value="<?php echo $user['email'] ?>" />
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Phone Number</label>
                                        <input type="text" class="form-control" name="phone_no" value="<?php echo $user['phone_no'] ?>" />
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3 position-relative">
                                        <label class="form-label">Profile Picture</label>
                                        <input type="file" class="form-control" name="profile_pic" />
                                        <?php if ($_SESSION['user']['profile_pic']) { ?>
                                            <img src="
                                                    <?php echo BASE_URL . 'assets/uploads/' . $_SESSION['user']['profile_pic'] ?>" class="profile-pic" />
                                        <?php } else { ?>
                                            <img src="
                                                    <?php echo BASE_URL . 'assets/images/user.jpg' ?>" class="profile-pic" />
                                        <?php } ?>

                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" name="profile_submit" class="btn btn-success">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!--Change password form-->
            <div class="col-md-6">
                <div class="card" style="min-height:457px;">
                    <div class="card-header">
                        Change Password
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php echo BASE_URL ?>my-profile.php">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Current Password</label>
                                        <input type="password" class="form-control" required name="current_pass" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">New Password</label>
                                        <input type="password" class="form-control" required name="new_pass" />
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" required name="conf_pass" />
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" name="password_submit" class="btn btn-success">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!--Main Container End-->

<?php include_once(DIR_URL . "include/footer.php") ?>