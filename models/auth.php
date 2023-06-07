<?php

// Function to login
function login($conn, $param)
{
    extract($param);
    $sql = "select * from users where email = '$email'";
    $res = $conn->query($sql);
    if ($res->num_rows > 0) {
        $user = mysqli_fetch_assoc($res);
        $hash = $user['password'];

        if (password_verify($password, $hash)) {
            $result = array('status' => true, 'user' => $user);
        } else {
            $result = array('status' => false);
        }
    } else {
        $result = array('status' => false);
    }
    return $result;
}

// Function to forgot password
function forgotPassword($conn, $param)
{
    extract($param);

    $sql = "select * from users where email = '$email'";
    $res = $conn->query($sql);
    if ($res->num_rows > 0) {
        $user = mysqli_fetch_assoc($res);
        $user_id = $user['id'];
        $datetime = date("Y-m-d H:i:s");

        //Generate OTP
        $otp = rand(1111, 9999);
        $message = "Please use this OTP <b>$otp</b> to reset your password";

        //Send reset password email
        $to = $email;
        $subject = "Forgot password request";
        $headers = "From: webmaster@lms.com" . "\r\n";

        $res = mail($to, $subject, $message, $headers);
        if ($res) {
            $sql = "INSERT INTO reset_password (user_id, reset_code, created_at)
                VALUES ($user_id, '$otp', '$datetime')";
            $conn->query($sql);

            $result = array('status' => true);
        } else {
            $result = array('status' => false);
        }
    } else {
        $result = array('status' => false);
    }
    return $result;
}

// Function to reset password
function resetPassword($conn, $param)
{
    extract($param);

    $sql = "select * from reset_password where reset_code = '$reset_code'";
    $res = $conn->query($sql);
    if ($res->num_rows > 0) {
        $code = mysqli_fetch_assoc($res);

        if ($password == $conf_pass) {
            $hash = password_hash($password, PASSWORD_DEFAULT);

            // Update password
            $sql = "UPDATE users SET password = '$hash' where id = " . $code['user_id'];
            $conn->query($sql);

            // Delete reset password
            $sql = "DELETE FROM reset_password where id = " . $code['id'];
            $conn->query($sql);

            $result = array('status' => true, "message" => "Password has been reset successfully");
        } else {
            $result = array('status' => false, "message" => "Confirm password doesn't match");
        }
    } else {
        $result = array('status' => false, "message" => "Invalid reset code");
    }
    return $result;
}

// Function to change password
function changePassword($conn, $param)
{
    extract($param);
    $hash = $_SESSION['user']['password'];
    if (password_verify($current_pass, $hash)) {
        if ($new_pass == $conf_pass) {
            $hash = password_hash($new_pass, PASSWORD_DEFAULT);

            // Update password
            $sql = "UPDATE users SET password = '$hash' where id = " . $_SESSION['user']['id'];
            $conn->query($sql);
            $result = array('status' => true, "message" => "Password has been changed successfully");
        } else {
            $result = array('status' => false, "message" => "Confirm password doesn't match");
        }
    } else {

        $result = array('status' => false, "message" => "Invalid current password");
    }




    return $result;
}

// Function to update profile
function updateProfile($conn, $param)
{
    extract($param);

    //Upload image start
    $uploadTo = "assets/uploads/";
    $allowedFileTypes = array("jpg", "png", "jpeg", "gif");
    $fileName = $_FILES['profile_pic']['name'];
    $tempPath = $_FILES['profile_pic']['tmp_name'];

    //$basename = basename($fileName);
    $originalPath = $uploadTo . $fileName;
    $fileType = pathinfo($originalPath, PATHINFO_EXTENSION);

    if (!empty($fileName)) {
        if (in_array($fileType, $allowedFileTypes)) {
            $upload = move_uploaded_file($tempPath, $originalPath);
        } else {
            $result = array('status' => false, "message" => "Invalid file formate");
            return $result;
        }
    }
    //Upload image end


    $user_id = $_SESSION['user']['id'];
    $datetime = date("Y-m-d H:i:s");
    $sql = "UPDATE users SET 
        name = '$name', 
        email = '$email', 
        phone_no = '$phone_no',
        updated_at = '$datetime'";

    if (isset($upload)) {
        $sql .= ",profile_pic = '$fileName'";
        $_SESSION['user']['profile_pic'] = $fileName;
    }

    $sql .= " WHERE id = $user_id";
    $conn->query($sql);

    // Update session user data
    $_SESSION['user']['name'] = $name;
    $_SESSION['user']['email'] = $email;
    $_SESSION['user']['phone_no'] = $phone_no;

    $result = array('status' => true, "message" => "Profile has been updated successfully");
    return $result;
}
