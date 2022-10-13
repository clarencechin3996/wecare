<?php
require_once 'db.php';

function checkEmpty($var){
    if (empty($var)){
        return false;
    }
    else {
        return true;
    }
}

if (isset($_POST)){
    extract($_POST);
    if ( checkEmpty($username) and checkEmpty($email) and checkEmpty($gender) and checkEmpty($password) and checkEmpty($phone) and checkEmpty($address) and checkEmpty($ic) )
    {
        $check_exist = "SELECT * FROM patient where fullName = '".$username."'";
        $res = mysqli_query($conn,$check_exist);
        $count = mysqli_num_rows($res);
        if($count == 0){
            $query="INSERT INTO patient (fullName, email, gender, password, phone, address, ic_passport) VALUES ( '$username', '$email', '$gender', '$password', '$phone', '$address', '$ic')";
            $sql=mysqli_query($conn,$query)or die(mysqli_error($conn));
            header("refresh:1; url=signin.html");
            echo '<script>alert("Patient Account Created!")</script>';
        }else{
            header("refresh:1; url=signup.php");
            echo '<script>alert("Username is already taken!")</script>';
        }
    }
    else{
        header("refresh:1; url=signup.php");
        echo '<script>alert("Please fill the form!")</script>';
    }


}
