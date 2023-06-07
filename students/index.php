<?php
include_once("../config/config.php");
include_once(DIR_URL . "config/database.php");
include_once(DIR_URL . "include/middleware.php");
include_once(DIR_URL . "models/student.php");

## Get Students
$students = getStudents($conn);
if (!isset($students->num_rows)) {
    $_SESSION['error'] = "Error: " . $conn->error;
}

## Delete Students
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $del = delete($conn, $_GET['id']);
    if ($del) {
        $_SESSION['success'] = "Student has been deleted successfully";
    } else {
        $_SESSION['error'] = "Something went wrong";
    }
    header("LOCATION: " . BASE_URL . "students");
    exit;
}

## Status update of Student
if (isset($_GET['action']) && $_GET['action'] == 'status') {
    $update = updateStatus($conn, $_GET['id'], $_GET['status']);
    if ($update) {
        if ($_GET['status'] == 1)
            $msg = "Student has been successfully activated";
        else $msg = "Student has been successfully deactivated";

        $_SESSION['success'] = $msg;
    } else {
        $_SESSION['error'] = "Something went wrong";
    }
    header("LOCATION: " . BASE_URL . "students");
    exit;
}



include_once(DIR_URL . "include/header.php");
include_once(DIR_URL . "include/topbar.php");
include_once(DIR_URL . "include/sidebar.php");


?>
<!--Main content start-->
<main class="mt-5 pt-3">
    <div class="container-fluid">
        <!--Cards-->
        <div class="row dashboard-counts">
            <div class="col-md-12">
                <?php include_once(DIR_URL . "include/alerts.php"); ?>
                <h4 class="fw-bold text-uppercase">Manage Students</h4>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        All Students
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="data-table" class="table table-responsive table-striped" style="width:100%">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone No</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($students->num_rows > 0) {
                                        $i = 1;
                                        while ($row = $students->fetch_assoc()) {
                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $i++ ?></th>
                                                <td><?php echo $row['name'] ?></td>
                                                <td><?php echo $row['email'] ?></td>
                                                <td><?php echo $row['phone_no'] ?></td>

                                                <td>
                                                    <?php
                                                    if ($row['status'] == 1)
                                                        echo '<span class="badge text-bg-success">Active</span>';
                                                    else echo '<span class="badge text-bg-danger">Inactive</span>';

                                                    ?>
                                                </td>
                                                <td><?php echo date("d-m-Y h:i A", strtotime($row['created_at'])) ?></td>
                                                <td>
                                                    <a href="<?php echo BASE_URL ?>students/edit.php?id=<?php echo $row['id'] ?>" class="btn btn-primary btn-sm">
                                                        Edit
                                                    </a>
                                                    <a onclick="return confirm('Are you sure?')" href="<?php echo BASE_URL ?>students?action=delete&id=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm">
                                                        Delete
                                                    </a>

                                                    <?php if ($row['status'] == 1) { ?>
                                                        <a href="<?php echo BASE_URL ?>students?action=status&id=<?php echo $row['id'] ?>&status=0" class="btn btn-warning btn-sm">
                                                            Inactive
                                                        </a>
                                                    <?php }
                                                if ($row['status'] == 0) {  ?>

                                                        <a href="<?php echo BASE_URL ?>students?action=status&id=<?php echo $row['id'] ?>&status=1" class="btn btn-success btn-sm">
                                                            Active
                                                        </a>
                                                    </td>
                                                <?php } ?>
                                            </tr>
                                        <?php }
                                } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!--Main content end-->

<?php include_once(DIR_URL . "include/footer.php") ?>