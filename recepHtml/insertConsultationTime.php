<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dataBaseName = "WeCare";

$conn = mysqli_connect($serverName,$userName,$password,$dataBaseName) or die("Connection failed: " . mysqli_connect_error());

if (!$conn){
    die ("Error: ".mysqli_connect_error());
}

if(isset($_POST['insertdata']))
{
    $consultation_id = $_POST['consultation_id'];
    $time1 = $_POST['time1'];
    $date1 = $_POST['date1'];
    $time2 = $_POST['time2'];
    $date2 = $_POST['date2'];
    $time3 = $_POST['time3'];
    $date3 = $_POST['date3'];
    $time4 = $_POST['time4'];
    $date4 = $_POST['date4'];
    $time5 = $_POST['time5'];
    $date5 = $_POST['date5'];
    $time6 = $_POST['time6'];
    $date6 = $_POST['date6'];

  
    $query = "INSERT INTO consultation_time (consultation_id,time1,date1,time2,date2,time3,date3,time4,date4,time5,date5,time6,date6) VALUES ('$consultation_id','$time1','$date1','$time2','$date2','$time3','$date3','$time4','$date4','$time5','$date5','$time6','$date6')";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: recordTime.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
        
    }
}

?>