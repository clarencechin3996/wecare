<?php
require_once 'db.php';
session_start();

if(isset($_POST))
{
    extract($_POST);
    $sql=mysqli_query($conn,"SELECT * FROM receptionist where password='$pass' and username='$username'");
    $row  = mysqli_fetch_array($sql);
    
    if(is_array($row)) //check if there is a vlue in the array ROW
    // we can use if (empty) to check if there no element on the array ROW
    {
    	
     $_SESSION["username"] = $username;
     $_SESSION["repID"]=$row['receptionist_id'];
     $_SESSION["loggedin"] = true;

     header("refresh:1; url=../recepHtml/homepage.php");
    }

    else{

    $sql=mysqli_query($conn,"SELECT * FROM patient where password='$pass' and fullName='$username'");
    $row  = mysqli_fetch_array($sql);
    if(is_array($row)) //check if there is a vlue in the array ROW
    // we can use if (empty) to check if there no element on the array ROW
    {

      $_SESSION["username"]=$username;
      $_SESSION["userID"]=$row['patient_id'];
      $_SESSION["loggedin"] = true;
 
      header("refresh:1; url=volunteer_homepage.php");
    }

    else {
        header("refresh:1; url=signin.html");
        echo '<script>alert("Invalid Username Or Password")</script>';
    }
    }
}

?>
