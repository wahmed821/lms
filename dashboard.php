<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./assets/css/style.css" />
    <script src="./assets/js/1c26fb5c51.js" crossorigin="anonymous"></script>
    <title>Star Library</title>
</head>

<body>
    <!--Top Navbar Start-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <!--offcanvar trigger start-->
            <button class="navbar-toggler me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!--offcanvar trigger start-->

            <a class="navbar-brand fw-bold text-uppercase me-auto" href="#">Star Library</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="d-flex ms-auto" role="search">
                    <div class="input-group my-3 my-lg-0">
                        <input type="text" class="form-control" placeholder="Search" aria-describedby="button-addon2" />
                        <button class="btn btn-outline-secondary bg-primary text-white" type="button" id="button-addon2">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>

                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="./assets/images/user.jpg" class="user-icon" />
                            Admin
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">My Profle</a></li>
                            <li><a class="dropdown-item" href="#">Change Password</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--Top Navbar End-->

    <!--Offcanvas Menu start-->
    <div class="offcanvas offcanvas-start bg-dark text-white sidebar-nav" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-body">
            <nav class="navbar-dark">
                <ul class="navbar-nav">
                    <li>
                        <div class="text-secondary small fw-bold text-uppercase">
                            Core
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./dashboard.html">
                            <i class="fas fa-tachometer-alt-fast me-2"></i> Dashboard</a>
                    </li>
                    <li class="my-0">
                        <hr />
                    </li>

                    <li>
                        <div class="text-secondary small fw-bold text-uppercase">
                            Inventory
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link sidebar-link" data-bs-toggle="collapse" href="#booksManagement" role="button" aria-expanded="false" aria-controls="booksManagement">
                            <i class="fa-solid fa-book me-2"></i>
                            Books Management
                            <span class="right-icon float-end"><i class="bi bi-chevron-down"></i></span>
                        </a>

                        <div class="collapse" id="booksManagement">
                            <div>
                                <ul class="navbar-nav ps-3">
                                    <li>
                                        <a href="./add-book.html" class="nav-link"><i class="fa-solid fa-plus me-2"></i> Add New</a>
                                    </li>
                                    <li>
                                        <a href="./books.html" class="nav-link"><i class="fa-solid fa-list me-2"></i> Manage All</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link sidebar-link" data-bs-toggle="collapse" href="#studentsManagement" role="button" aria-expanded="false" aria-controls="studentsManagement">
                            <i class="fa-solid fa-users me-2"></i>
                            Students
                            <span class="right-icon float-end"><i class="bi bi-chevron-down"></i></span>
                        </a>

                        <div class="collapse" id="studentsManagement">
                            <div>
                                <ul class="navbar-nav ps-3">
                                    <li>
                                        <a href="./add-student.html" class="nav-link"><i class="fa-solid fa-plus me-2"></i> Add New</a>
                                    </li>
                                    <li>
                                        <a href="./students.html" class="nav-link"><i class="fa-solid fa-list me-2"></i> Manage All</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="my-0">
                        <hr />
                    </li>

                    <li>
                        <div class="text-secondary small fw-bold text-uppercase">
                            Business
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link sidebar-link" data-bs-toggle="collapse" href="#loanManagement" role="button" aria-expanded="false" aria-controls="loanManagement">
                            <i class="fas fa-book-reader me-2"></i>
                            Books Loan
                            <span class="right-icon float-end"><i class="bi bi-chevron-down"></i></span>
                        </a>

                        <div class="collapse" id="loanManagement">
                            <div>
                                <ul class="navbar-nav ps-3">
                                    <li>
                                        <a href="./add-loan.html" class="nav-link"><i class="fa-solid fa-plus me-2"></i> Add New</a>
                                    </li>
                                    <li>
                                        <a href="./loans.html" class="nav-link"><i class="fa-solid fa-list me-2"></i> Manage All</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link sidebar-link" data-bs-toggle="collapse" href="#subscriptionManagement" role="button" aria-expanded="false" aria-controls="subscriptionManagement">
                            <i class="fa-solid fa-indian-rupee-sign me-2"></i>
                            Subscription
                            <span class="right-icon float-end"><i class="bi bi-chevron-down"></i></span>
                        </a>

                        <div class="collapse" id="subscriptionManagement">
                            <div>
                                <ul class="navbar-nav ps-3">
                                    <li>
                                        <a href="./subscription-plans.html" class="nav-link"><i class="fa-solid fa-plus me-2"></i> Plans</a>
                                    </li>
                                    <li>
                                        <a href="./purchase-history.html" class="nav-link"><i class="fa-solid fa-list me-2"></i> Purchase
                                            History</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="my-0">
                        <hr />
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link"><i class="fa-solid fa-right-from-bracket me-2"></i> Logout</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!--Offcanvas Menu end-->

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

    <script src="./assets/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>