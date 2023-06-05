<?php
include_once("config/config.php");
include_once("config/database.php");
include_once(DIR_URL . "include/header.php");
include_once(DIR_URL . "include/topbar.php");
include_once(DIR_URL . "include/sidebar.php");
?>

<!--Main Container Start-->
<main class="mt-5 pt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 my-3">
                <h4 class="fw-bold text-uppercase">Dashboard</h4>
                <p>Statistics of the system!</p>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-body text-center">
                        <h6 class="card-title text-uppercase text-muted">
                            Total Books
                        </h6>
                        <p class="h1 fw-bold">130</p>
                        <a href="#" class="card-link link-underline-light">View more
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-body text-center">
                        <h6 class="card-title text-uppercase text-muted">
                            Total Students
                        </h6>
                        <p class="h1 fw-bold">84</p>
                        <a href="#" class="card-link link-underline-light">View more</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-body text-center">
                        <h6 class="card-title text-uppercase text-muted">
                            Total Revenue
                        </h6>
                        <p class="h1 fw-bold">
                            <i class="fa-solid fa-indian-rupee-sign"></i> 1,20,300
                        </p>
                        <a href="#" class="card-link link-underline-light">View more
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-body text-center">
                        <h6 class="card-title text-uppercase text-muted">
                            Total Books Loan
                        </h6>
                        <p class="h1 fw-bold">35</p>
                        <a href="loans.html" class="card-link link-underline-light">View more</a>
                    </div>
                </div>
            </div>
        </div>

        <!--Tabs-->
        <div class="row mt-5">
            <div class="col-md-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link text-uppercase active" id="new-students" data-bs-toggle="tab" data-bs-target="#new-students-pane" type="button" role="tab" aria-controls="new-students-pane" aria-selected="true">
                            New Students
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link text-uppercase" id="recent-loans" data-bs-toggle="tab" data-bs-target="#recent-loans-pane" type="button" role="tab" aria-controls="recent-loans-pane" aria-selected="false">
                            Recent Loans
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link text-uppercase" id="recent-subscription" data-bs-toggle="tab" data-bs-target="#recent-subscription-pane" type="button" role="tab" aria-controls="recent-subscription-pane" aria-selected="false">
                            Recent Subscriptions
                        </button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="new-students-pane" role="tabpanel" aria-labelledby="new-students" tabindex="0">
                        <div class="table-responsive">
                            <table class="table table-responsive table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Preparing For</th>
                                        <th scope="col">Registered On</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>1</th>
                                        <td>Mark</td>
                                        <td>UPSC</td>
                                        <td>10-05-2023, 10:15 AM</td>
                                        <td>
                                            <span class="badge text-bg-success">Active</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>2</th>
                                        <td>Jai</td>
                                        <td>GATE</td>
                                        <td>12-05-2023, 11:35 AM</td>
                                        <td>
                                            <span class="badge text-bg-success">Active</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>3</th>
                                        <td>Nitin Kumar</td>
                                        <td>IAS</td>
                                        <td>09-05-2023, 06:15 PM</td>
                                        <td>
                                            <span class="badge text-bg-success">Active</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>4</th>
                                        <td>Rakesh Saini</td>
                                        <td>GATE</td>
                                        <td>09-05-2022, 11:35 AM</td>
                                        <td>
                                            <span class="badge text-bg-danger">Inactive</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="recent-loans-pane" role="tabpanel" aria-labelledby="recent-loans" tabindex="0">
                        <div class="table-responsive">
                            <table class="table table-responsive table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Book Name</th>
                                        <th scope="col">Student Name</th>
                                        <th scope="col">Loan Date</th>
                                        <th scope="col">Due Date</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>1</th>
                                        <td>Indian Art and Culture</td>
                                        <td>Jai Sharma</td>
                                        <td>26-05-2023</td>
                                        <td>20-06-2023</td>
                                        <td>
                                            <span class="badge text-bg-success">Active</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>2</th>
                                        <td>Certificate Physical Geography</td>
                                        <td>Rohan Suthar</td>
                                        <td>25-05-2023</td>
                                        <td>31-05-2023</td>
                                        <td>
                                            <span class="badge text-bg-success">Active</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>3</th>
                                        <td>Indian Economy by Nitin Singhania</td>
                                        <td>Nitin Saini</td>
                                        <td>20-05-2023</td>
                                        <td>29-05-2023</td>
                                        <td>
                                            <span class="badge text-bg-success">Active</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>4</th>
                                        <td>Tata McGraw Hill CSAT Manual</td>
                                        <td>Joy</td>
                                        <td>20-05-2023</td>
                                        <td>25-05-2023</td>
                                        <td>
                                            <span class="badge text-bg-danger">Returned</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="recent-subscription-pane" role="tabpanel" aria-labelledby="recent-subscription" tabindex="0">
                        <div class="table-responsive">
                            <table class="table table-responsive table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Student Name</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Start Date</th>
                                        <th scope="col">End Date</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>1</th>
                                        <td>Jai Kaushik</td>
                                        <td>
                                            <i class="fa-solid fa-indian-rupee-sign"></i> 500
                                        </td>
                                        <td>25-05-2023</td>
                                        <td>24-06-2023</td>
                                        <td>
                                            <span class="badge text-bg-success">Active</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>2</th>
                                        <td>Narayan Soni</td>
                                        <td>
                                            <i class="fa-solid fa-indian-rupee-sign"></i> 750
                                        </td>
                                        <td>20-05-2023</td>
                                        <td>19-08-2023</td>
                                        <td>
                                            <span class="badge text-bg-success">Active</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>3</th>
                                        <td>Hemlata Khatri</td>
                                        <td>
                                            <i class="fa-solid fa-indian-rupee-sign"></i> 1000
                                        </td>
                                        <td>10-05-2023</td>
                                        <td>09-11-2023</td>
                                        <td>
                                            <span class="badge text-bg-success">Active</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>4</th>
                                        <td>Rakesh</td>
                                        <td>
                                            <i class="fa-solid fa-indian-rupee-sign"></i> 500
                                        </td>
                                        <td>20-04-2023</td>
                                        <td>19-05-2023</td>
                                        <td>
                                            <span class="badge text-bg-danger">Expired</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!--Main Container End-->

<?php include_once(DIR_URL . "include/footer.php") ?>