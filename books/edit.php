<?php
include_once("../config/config.php");
include_once(DIR_URL . "config/database.php");
include_once(DIR_URL . "include/middleware.php");
include_once(DIR_URL . "models/book.php");

// Update Book Functionality
if (isset($_POST['update'])) {
    $res = updateBook($conn, $_POST);
    if (isset($res['success'])) {
        $_SESSION['success'] = "Book has been updated successfully";
        header("LOCATION: " . BASE_URL . "books");
        exit;
    } else {
        $_SESSION['error'] = $res['error'];
        header("LOCATION: " . BASE_URL . "books/edit.php");
        exit;
    }
}

// Read get parameter to get book data
if (isset($_GET['id']) && $_GET['id'] > 0) {
    $book = getBookById($conn, $_GET['id']);
    if ($book->num_rows > 0) {
        $book = mysqli_fetch_assoc($book);
    }
} else {
    header("LOCATION: " . BASE_URL . "books");
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
                <h4 class="fw-bold text-uppercase">Edit Book</h4>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Fill the form
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php echo BASE_URL ?>books/edit.php">
                            <input type="hidden" name="id" value="<?php echo $book['id'] ?>" />
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Book Title</label>
                                        <input type="text" name="title" class="form-control" value="<?php echo $book['title'] ?>" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">ISBN Number</label>
                                        <input type="text" name="isbn" class="form-control" required="required" value="<?php echo $book['isbn'] ?>" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Author Name</label>
                                        <input type="text" name="author" class="form-control" required value="<?php echo $book['author'] ?>" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Publication Year</label>
                                        <input type="number" name="publication_year" class="form-control" required value="<?php echo $book['publication_year'] ?>" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Category</label>
                                        <?php
                                        $cats = getCategories($conn);
                                        ?>
                                        <select name="category_id" class="form-control" required>
                                            <option value="">Please select</option>
                                            <?php
                                            $selected = "";
                                            while ($row = $cats->fetch_assoc()) {
                                                if ($row['id'] === $book['category_id'])
                                                    $selected = "selected";

                                                ?>
                                                <option <?php echo $selected ?> value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button name="update" type="submit" class="btn btn-success">
                                        Update
                                    </button>

                                    <a href="<?php echo BASE_URL ?>books" class="btn btn-secondary">
                                        Back
                                    </a>
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