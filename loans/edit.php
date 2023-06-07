<?php
include_once("../config/config.php");
include_once(DIR_URL . "config/database.php");
include_once(DIR_URL . "include/middleware.php");
include_once(DIR_URL . "models/loan.php");

// Update Functionality
if (isset($_POST['submit'])) {
    $res = update($conn, $_POST);
    if (isset($res['success'])) {
        $_SESSION['success'] = "Book loan has been updated successfully";
        header("LOCATION: " . BASE_URL . "loans");
        exit;
    } else {
        $_SESSION['error'] = $res['error'];
        header("LOCATION: " . BASE_URL . "loans/edit.php");
        exit;
    }
}

// Read get parameter to get data
if (isset($_GET['id']) && $_GET['id'] > 0) {
    $loan = getLoanById($conn, $_GET['id']);
    if ($loan->num_rows > 0) {
        $loan = mysqli_fetch_assoc($loan);
    }
} else {
    header("LOCATION: " . BASE_URL . "loans");
    exit;
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
                <h4 class="fw-bold text-uppercase">Edit Loan</h4>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Fill the form
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php echo BASE_URL ?>loans/edit.php">
                            <input type="hidden" name="id" value="<?php echo $loan['id'] ?>" />

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Select Book</label>
                                        <?php
                                        $books = getBooks($conn);
                                        ?>
                                        <select name="book_id" class="form-control">
                                            <option value="">Please select</option>
                                            <?php
                                            $selected = "";
                                            while ($row = $books->fetch_assoc()) {
                                                if ($row['id'] === $loan['book_id'])
                                                    $selected = "selected";
                                                ?>
                                                <option <?php echo $selected ?> value="<?php echo $row['id'] ?>"><?php echo $row['title'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Select Student</label>
                                        <?php
                                        $students = getStudents($conn);
                                        ?>
                                        <select name="student_id" class="form-control">
                                            <option value="">Please select</option>
                                            <?php
                                            $selected = "";
                                            while ($row = $students->fetch_assoc()) {
                                                if ($row['id'] === $loan['student_id'])
                                                    $selected = "selected";
                                                ?>
                                                <option <?php echo $selected ?> value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Loan Date</label>
                                        <input type="date" class="form-control" name="loan_date" required value="<?php echo $loan['loan_date'] ?>" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Return/Due Date</label>
                                        <input type="date" class="form-control" name="return_date" required value="<?php echo $loan['return_date'] ?>" />
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