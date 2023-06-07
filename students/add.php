<?php
include_once("../config/config.php");
include_once(DIR_URL . "config/database.php");
include_once(DIR_URL . "include/middleware.php");
include_once(DIR_URL . "models/student.php");

// Add Student Functionality
if (isset($_POST['submit'])) {
    $res = create($conn, $_POST);
    if (isset($res['success'])) {
        $_SESSION['success'] = "Student has been created successfully";
        header("LOCATION: " . BASE_URL . "students");
        exit;
    } else {
        $_SESSION['error'] = $res['error'];
        header("LOCATION: " . BASE_URL . "students/add.php");
    }
}
?>
<?php
include_once(DIR_URL . "include/header.php");
include_once(DIR_URL . "include/topbar.php");
include_once(DIR_URL . "include/sidebar.php");
?>
<!--Main content start-->
<main class="mt-5 pt-3">
    <div class="container-fluid">
        <!--Cards-->
        <div class="row">
            <div class="col-md-12">
                <?php include_once(DIR_URL . "include/alerts.php"); ?>
                <h4 class="fw-bold text-uppercase">Add Student</h4>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Fill the form
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php echo BASE_URL ?>students/add.php">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Full Name</label>
                                        <input type="text" class="form-control" name="name" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Phone No</label>
                                        <input type="text" class="form-control" name="phone_no" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Address</label>
                                        <input type="text" class="form-control" name="address" />
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" name="submit" class="btn btn-success">
                                        Save
                                    </button>

                                    <button type="reset" class="btn btn-secondary">
                                        Cancel
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
<!--Main content end-->

<?php include_once(DIR_URL . "include/footer.php") ?>