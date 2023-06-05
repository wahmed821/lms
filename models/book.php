<?php

// Function to store book
function storeBook($conn, $param)
{
    extract($param);

    ## Validation start
    if (empty($title)) {
        $result = array("error" => "Title is required");
        return $result;
    } else if (empty($isbn)) {
        $result = array("error" => "ISBN is required");
        return $result;
    } else if (isIsbnUnique($conn, $isbn)) {
        $result = array("error" => "ISBN is already registered");
        return $result;
    }
    ## Validation end

    $datetime = date("Y-m-d H:i:s");
    $sql = "INSERT INTO books (title, author, publication_year, isbn, category_id, created_at)
        VALUES ('$title', '$author', '$publication_year', '$isbn', $category_id, '$datetime')";
    $result['success'] = $conn->query($sql);
    return $result;
}

// Function to get all books
function getBooks($conn)
{
    $sql = "select b.*, c.name as cat_name from books b 
        left join categories c on c.id = b.category_id 
        order by id desc";
    $result = $conn->query($sql);
    return $result;
}

// Function to get book details
function getBookById($conn, $id)
{
    $sql = "select * from books where id = $id";
    $result = $conn->query($sql);
    return $result;
}

// Function to delete a book
function deleteBook($conn, $id)
{
    $sql = "delete from books where id = $id";
    $result = $conn->query($sql);
    return $result;
}

// Function to update book status
function updateBookStatus($conn, $id, $status)
{
    $sql = "update books set status = '$status' where id = $id";
    $result = $conn->query($sql);
    return $result;
}

// Function to update  book
function updateBook($conn, $param)
{
    extract($param);
    ## Validation start
    if (empty($title)) {
        $result = array("error" => "Title is required");
        return $result;
    } else if (empty($isbn)) {
        $result = array("error" => "ISBN is required");
        return $result;
    } else if (isIsbnUnique($conn, $isbn, $id)) {
        $result = array("error" => "ISBN is already registered");
        return $result;
    }
    ## Validation end

    $datetime = date("Y-m-d H:i:s");
    $sql = "UPDATE books SET 
        title = '$title', 
        author = '$author', 
        publication_year = '$publication_year',
        isbn = '$isbn',
        category_id = $category_id,
        updated_at = '$datetime'
        WHERE id = $id;
        ";
    $result['success'] = $conn->query($sql);
    return $result;
}

// Function to get categories
function getCategories($conn)
{
    $sql = "select id, name from categories";
    $result = $conn->query($sql);
    return $result;
}

// Function to check isbn no
function isIsbnUnique($conn, $isbn, $id = NULL)
{
    $sql = "select id from books where isbn = '$isbn'";
    if ($id) {
        $sql .= " and id != $id";
    }
    $result = $conn->query($sql);
    if ($result->num_rows > 0)
        return true;
    else return false;
}
