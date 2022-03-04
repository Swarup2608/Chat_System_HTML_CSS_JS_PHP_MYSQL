<?php
    session_start();
    include_once "config.php";
    $otp = $_POST['otp'];
    $id = $_SESSION['unique_id'];
    $query = mysqli_query($conn,"SELECT * FROM verification WHERE otp='$otp' AND user_id='$id'");
    if(mysqli_num_rows($query) > 0){
        $query1 = mysqli_query($conn,"DELETE FROM verification WHERE user_id='$id'");
        $query2 = mysqli_query($conn,"UPDATE users SET v_sts='V' WHERE unique_id='$id'");
        echo "success";
    }
    else{
        echo "Incorrect Otp";
    }