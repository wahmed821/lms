<?php

// Function to create student
function create($conn, $param)
{
    extract($param);

    ## Validation start
    if (empty($name)) {
        $result = array("error" => "Name is required");
        return $result;
    } else if (empty($email)) {
        $result = array("error" => "Email is required");
        return $result;
    } else if (isEmailUnique($conn, $email)) {
        $result = array("error" => "Email is already registered");
        return $result;
    } else if (empty($phone_no)) {
        $result = array("error" => "Phone no is required");
        return $result;
    } else if (isPhoneUnique($conn, $phone_no)) {
        $result = array("error" => "Phone no is already registered");
        return $result;
    } else if (isPhoneValid($phone_no)) {
        $result = array("error" => "Phone no is not valid");
        return $result;
    }
    ## Validation end

    $datetime = date("Y-m-d H:i:s");
    $sql = "INSERT INTO students (name, phone_no, email, address, created_at)
        VALUES ('$name', '$phone_no', '$email', '$addres', '$datetime')";
    $result['success'] = $conn->query($sql);
    return $result;
}

// Function to get all students
function getStudents($conn)
{
    $sql = "select * from students order by id desc";
    $result = $conn->query($sql);
    return $result;
}

// Function to get student details
function getStudentById($conn, $id)
{
    $sql = "select * from students where id = $id";
    $result = $conn->query($sql);
    return $result;
}

// Function to delete
function delete($conn, $id)
{
    $sql = "delete from students where id = $id";
    $result = $conn->query($sql);
    return $result;
}

// Function to update student status
function updateStatus($conn, $id, $status)
{
    $sql = "update students set status = '$status' where id = $id";
    $result = $conn->query($sql);
    return $result;
}

// Function to update
function update($conn, $param)
{
    extract($param);
    ## Validation start
    if (empty($name)) {
        $result = array("error" => "Name is required");
        return $result;
    } else if (empty($email)) {
        $result = array("error" => "Email is required");
        return $result;
    } else if (isEmailUnique($conn, $email, $id)) {
        $result = array("error" => "Email is already registered");
        return $result;
    } else if (empty($phone_no)) {
        $result = array("error" => "Phone no is required");
        return $result;
    } else if (isPhoneUnique($conn, $phone_no, $id)) {
        $result = array("error" => "Phone no is already registered");
        return $result;
    } else if (isPhoneValid($phone_no)) {
        $result = array("error" => "Phone no is not valid");
        return $result;
    }
    ## Validation end

    $datetime = date("Y-m-d H:i:s");
    $sql = "UPDATE students SET 
        name = '$name', 
        email = '$email', 
        phone_no = '$phone_no',
        address = '$address',
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

// Function to check email
function isEmailUnique($conn, $email, $id = NULL)
{
    $sql = "select id from students where email = '$email'";
    if ($id) {
        $sql .= " and id != $id";
    }
    $result = $conn->query($sql);
    if ($result->num_rows > 0)
        return true;
    else return false;
}

// Function to check phone no
function isPhoneUnique($conn, $phone_no, $id = NULL)
{
    $sql = "select id from students where phone_no = '$phone_no'";
    if ($id) {
        $sql .= " and id != $id";
    }
    $result = $conn->query($sql);
    if ($result->num_rows > 0)
        return true;
    else return false;
}


// Function to check valid phone no
function isPhoneValid($phone_no)
{
    if (is_numeric($phone_no) && strlen($phone_no) == 10)
        return false;
    else return true;
}
