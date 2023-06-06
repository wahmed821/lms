<?php

// Function to create loan
function create($conn, $param)
{
    extract($param);
    ## Validation start
    if (empty($title)) {
        $result = array("error" => "Title is required");
        return $result;
    } else if (empty($amount)) {
        $result = array("error" => "Amount is required");
        return $result;
    } else if (empty($duration)) {
        $result = array("error" => "Duration is required");
        return $result;
    }
    ## Validation end

    $datetime = date("Y-m-d H:i:s");
    $sql = "INSERT INTO subscription_plans (title, amount, duration, created_at)
        VALUES ('$title', $amount, $duration, '$datetime')";
    $result['success'] = $conn->query($sql);
    return $result;
}

// Function to get all plans
function getPlans($conn)
{
    $sql = "select * from subscription_plans order by id asc";
    $result = $conn->query($sql);
    return $result;
}

// Function to get plan details
function getPlanById($conn, $id)
{
    $sql = "select * from subscription_plans where id = $id";
    $result = $conn->query($sql);
    return $result;
}

// Function to delete
function delete($conn, $id)
{
    $sql = "delete from subscription_plans where id = $id";
    $result = $conn->query($sql);
    return $result;
}

// Function to update plan status
function updateStatus($conn, $id, $status)
{
    $sql = "update subscription_plans set status = '$status' where id = $id";
    $result = $conn->query($sql);
    return $result;
}

// Function to update
function update($conn, $param)
{
    extract($param);
    ## Validation start
    if (empty($title)) {
        $result = array("error" => "Title is required");
        return $result;
    } else if (empty($amount)) {
        $result = array("error" => "Amount is required");
        return $result;
    } else if (empty($duration)) {
        $result = array("error" => "Duration is required");
        return $result;
    }
    ## Validation end

    $datetime = date("Y-m-d H:i:s");
    $sql = "UPDATE subscription_plans SET 
        title = '$title', 
        amount = '$amount', 
        duration = '$duration',
        updated_at = '$datetime'
        WHERE id = $id;
        ";
    $result['success'] = $conn->query($sql);
    return $result;
}

// Function to get students
function getStudents($conn)
{
    $sql = "select id, name from students";
    $result = $conn->query($sql);
    return $result;
}

// Function to get books
function getBooks($conn)
{
    $sql = "select id, title from books";
    $result = $conn->query($sql);
    return $result;
}
