<?php 
    include("./config.php");
    session_start();
    $id = $_SESSION['unique_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = mysqli_query($conn,"SELECT * FROM users WHERE unique_id='$id'");
    $row = mysqli_fetch_assoc($sql);
    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
        if(md5($password) == $row['password']){
            $sql1 = mysqli_query($conn,"UPDATE `users` SET `fname`='$fname',`lname`='$lname',`email`='$email' WHERE unique_id='$id'");
            if($sql1){
                echo "success";
            }
            else{
                echo "Something Went Wrong";
            }
        }
        else{
            echo "Wrong Password";
        }
    }
    else{
        echo "All Inputs Are required";
    }