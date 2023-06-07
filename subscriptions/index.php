<?php
include_once("../config/config.php");
include_once(DIR_URL . "config/database.php");
include_once(DIR_URL . "include/middleware.php");
include_once(DIR_URL . "models/subscription.php");

// Add-Edit plan functionality
if (isset($_POST['submit'])) {

    //Create 
    if ($_POST['id'] == '') {
        $res = create($conn, $_POST);
        if (isset($res['success'])) {
            $_SESSION['success'] = "Plan has been created successfully";
            header("LOCATION: " . BASE_URL . "subscriptions");
            exit;
        } else {
            $_SESSION['error'] = $res['error'];
            header("LOCATION: " . BASE_URL . "subscriptions");
            exit;
        }
    } else { // Update
        $res = update($conn, $_POST);
        if (isset($res['success'])) {
            $_SESSION['success'] = "Plan has been updated successfully";
            header("LOCATION: " . BASE_URL . "subscriptions");
            exit;
        } else {
            $_SESSION['error'] = $res['error'];
            header("LOCATION: " . BASE_URL . "subscriptions");
            exit;
        }
    }
}

## Get Plans
$plans = getPlans($conn);
if (!isset($plans->num_rows)) {
    $_SESSION['error'] = "Error: " . $conn->error;
}

## Delete Plans
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $del = delete($conn, $_GET['id']);
    if ($del) {
        $_SESSION['success'] = "Plan has been deleted successfully";
    } else {
        $_SESSION['error'] = "Something went wrong";
    }
    header("LOCATION: " . BASE_URL . "subscriptions");
    exit;
}

## Status update of plan
if (isset($_GET['action']) && $_GET['action'] == 'status') {
    $update = updateStatus($conn, $_GET['id'], $_GET['status']);
    if ($update) {
        if ($_GET['status'] == 1)
            $msg = "Plan has been activated successfully";
        else $msg = "Plan has been deactivated successfully";

        $_SESSION['success'] = $msg;
    } else {
        $_SESSION['error'] = "Something went wrong";
    }
    header("LOCATION: " . BASE_URL . "subscriptions");
    exit;
}

## Get data on edit
if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id']) && $_GET['id'] > 0) {
    $plan = getPlanById($conn, $_GET['id']);
    if ($plan->num_rows > 0) {
        $plan = mysqli_fetch_assoc($plan);
    }
} else {
    $plan = array('title' => '', 'amount' => '', 'duration' => '', 'id' => '');
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
                <h4 class="fw-bold text-uppercase">Subscription Plan</h4>
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        All Plans
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="data-table" class="table table-responsive table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Duration</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($plans->num_rows > 0) {
                                        $i = 1;
                                        while ($row = $plans->fetch_assoc()) {
                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $i++ ?></th>
                                                <td><?php echo $row['title'] ?></td>
                                                <td>
                                                    <i class="fa-solid fa-indian-rupee-sign me-1"></i> <?php echo $row['amount'] ?>
                                                </td>
                                                <td><?php echo $row['duration'] ?> month</td>
                                                <td>
                                                    <?php
                                                    if ($row['status'] == 1)
                                                        echo '<span class="badge text-bg-success">Active</span>';
                                                    else echo '<span class="badge text-bg-danger">Inactive</span>';

                                                    ?>
                                                </td>
                                                <td>
                                                    <a href="<?php echo BASE_URL ?>subscriptions?action=edit&id=<?php echo $row['id'] ?>" class="btn btn-primary btn-sm">
                                                        Edit
                                                    </a>
                                                    <a onclick="return confirm('Do you want to delete this?')" href="<?php echo BASE_URL ?>subscriptions?action=delete&id=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm">
                                                        Delete
                                                    </a>

                                                    <?php if ($row['status'] == 1) { ?>
                                                        <a href="<?php echo BASE_URL ?>subscriptions?action=status&id=<?php echo $row['id'] ?>&status=0" class="btn btn-warning btn-sm">
                                                            Inactive
                                                        </a>
                                                    <?php }
                                                if ($row['status'] == 0) {  ?>

                                                        <a href="<?php echo BASE_URL ?>subscriptions?action=status&id=<?php echo $row['id'] ?>&status=1" class="btn btn-success btn-sm">
                                                            Active
                                                        </a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php }
                                } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Add New Plan
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php echo BASE_URL ?>subscriptions/index.php">
                            <input type="hidden" name="id" value="<?php echo $plan['id'] ?>" />
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Title</label>
                                        <input type="text" class="form-control" name="title" value="<?php echo $plan['title'] ?>" />
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Amount</label>
                                        <input type="text" class="form-control" name="amount" value="<?php echo $plan['amount'] ?>" />
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Duration</label>
                                        <select class="form-control" name="duration">
                                            <option value="">Please select</option>
                                            <?php
                                            for ($i = 1; $i < 13; $i++) {
                                                $selected = "";
                                                if ($i == $plan['duration'])
                                                    $selected = "selected";
                                                ?>
                                                <option <?php echo $selected ?> value="<?php echo $i ?>"><?php echo $i ?> month(s)</option>
                                            <?php } ?>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" name="submit" class="btn btn-success">
                                        Save
                                    </button>

                                    <?php if ($plan['id'] == '') { ?>
                                        <button type="reset" class="btn btn-secondary">
                                            Cancel
                                        </button>
                                    <?php } else { ?>
                                        <a href="<?php echo BASE_URL ?>subscriptions" class="btn btn-secondary">
                                            Cancel
                                        </a>
                                    <?php } ?>
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