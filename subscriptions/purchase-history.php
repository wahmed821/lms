<?php
include_once("../config/config.php");
include_once(DIR_URL . "config/database.php");
include_once(DIR_URL . "include/middleware.php");
include_once(DIR_URL . "models/subscription.php");

// Create subscription functionality
if (isset($_POST['submit'])) {
    $res = createSubscription($conn, $_POST);
    if (isset($res['success'])) {
        $_SESSION['success'] = "Subscription has been created successfully";
        header("LOCATION: " . BASE_URL . "subscriptions/purchase-history.php");
        exit;
    } else {
        $_SESSION['error'] = $res['error'];
        header("LOCATION: " . BASE_URL . "subscriptions/purchase-history.php");
        exit;
    }
}

## Get PurchaseHistory
$from = "";
if (isset($_GET['from']))
    $from = $_GET['from'];

$to = "";
if (isset($_GET['to']))
    $to = $_GET['to'];

$purchaseHistory = getPurchaseHistory($conn, $from, $to);
if (!isset($purchaseHistory->num_rows)) {
    $_SESSION['error'] = "Error: " . $conn->error;
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
                <h4 class="fw-bold text-uppercase">Purchase History
                    <button type="button" style="float:right" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#subsModal">
                        Create Subscription
                    </button>
                </h4>

            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Subscription Purchase History
                    </div>
                    <div class="card-body">
                        <!--Search form-->
                        <form method="get">
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <h5 class="fw-bold text-uppercase">Search</h5>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">From</label>
                                    <input type="date" class="form-control" name="from" value="<?php echo $from ?>" />
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">To</label>
                                    <input type="date" class="form-control" name="to" value="<?php echo $to ?>" />
                                </div>

                                <div class="col-md-3">
                                    <button type="submit" name="search" class="btn btn-primary btn-sm" style="margin-top:35px">
                                        Search
                                    </button>
                                </div>

                            </div>
                        </form>

                        <!--Table-->
                        <div class="table-responsive">
                            <table id="data-table" class="table table-responsive table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Student Name</th>
                                        <th scope="col">Plan</th>
                                        <th scope="col">Start Date</th>
                                        <th scope="col">End Date</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($purchaseHistory->num_rows > 0) {
                                        $i = 1;
                                        while ($row = $purchaseHistory->fetch_assoc()) {
                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $i++ ?></th>
                                                <td><?php echo $row['student_name'] ?></td>
                                                <td>
                                                    <span class="badge text-bg-info me-1"><?php echo $row['plan_name'] ?></span>
                                                    <i class="fa-solid fa-indian-rupee-sign"></i>
                                                    <?php echo $row['amount'] ?>
                                                </td>
                                                <td><?php echo date("d-m-Y", strtotime($row['start_date'])) ?></td>
                                                <td><?php echo date("d-m-Y", strtotime($row['end_date'])) ?></td>
                                                <td>
                                                    <?php
                                                    $today = date("Y-m-d");
                                                    if ($row['end_date'] >= $today)
                                                        echo '<span class="badge text-bg-success">Active</span>';
                                                    else
                                                        echo  '<span class="badge text-bg-danger">Expired</span>';
                                                    ?>
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
        </div>
    </div>
</main>
<!--Main content end-->

<!-- Modal to create subscription -->
<div class="modal fade" id="subsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Create Subscription</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo BASE_URL ?>subscriptions/purchase-history.php">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Select Student</label>
                                <?php
                                $students = getStudents($conn);
                                ?>
                                <select name="student_id" class="form-control">
                                    <option value="">Please select</option>
                                    <?php while ($row = $students->fetch_assoc()) { ?>
                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Select Plan</label>
                                <?php
                                $plans = getActivePlans($conn);
                                ?>
                                <select name="plan_id" class="form-control">
                                    <option value="">Please select</option>
                                    <?php while ($row = $plans->fetch_assoc()) { ?>
                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['title'] ?></option>
                                    <?php } ?>
                                </select>
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

<?php include_once(DIR_URL . "include/footer.php") ?>