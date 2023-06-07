<?php

// Function to create plan
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

// Function to get plans
function getActivePlans($conn)
{
    $sql = "select id, title from subscription_plans where status = 1";
    $result = $conn->query($sql);
    return $result;
}

// Function to create subscription
function createSubscription($conn, $param)
{
    extract($param);
    ## Validation start
    if (empty($plan_id)) {
        $result = array("error" => "Plan selection is required");
        return $result;
    } else if (empty($student_id)) {
        $result = array("error" => "Student selection is required");
        return $result;
    }
    ## Validation end

    $datetime = date("Y-m-d H:i:s");
    $start_date = date("Y-m-d");
    $end_date = date("Y-m-d");

    ## Get plan
    $plan = getPlanById($conn, $plan_id);
    if ($plan->num_rows > 0) {
        $plan = mysqli_fetch_assoc($plan);
        $duration = $plan['duration'];

        ## start date - end date calculation
        $start_date = date("Y-m-d");
        $start_time = strtotime($start_date);
        $end_date = date("Y-m-d", strtotime("+$duration month", $start_time));
        $amount = $plan['amount'];

        $sql = "INSERT INTO subscriptions (student_id, plan_id, start_date, end_date, amount, created_at)
        VALUES ($student_id, $plan_id, '$start_date', '$end_date', $amount, '$datetime')";
        $result['success'] = $conn->query($sql);
        return $result;
    } else {
        $result = array("error" => "Invalid plan selection");
        return $result;
    }
}

// Function to get all purchase history
function getPurchaseHistory($conn, $from, $to)
{
    $sql = "select s.*, p.title as plan_name, st.name as student_name 
        from subscriptions s
        inner join subscription_plans p on p.id = s.plan_id
        inner join students st on st.id = s.student_id where s.id != 0";

    if (!empty($from)) {
        $sql .= " AND s.start_date >= '$from'";
    }

    if (!empty($to)) {
        $sql .= " AND s.end_date <= '$to'";
    }

    $sql .= " order by s.id desc";



    $result = $conn->query($sql);
    return $result;
}
