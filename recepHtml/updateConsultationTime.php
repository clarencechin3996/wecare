<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'WeCare');


    if(isset($_POST['updatedata']))
    {   


        $id = $_POST['consultation_time_id'];

        $time1 = $_POST['time1'];
        $date1 = $_POST['date1'];
        $newTime1 = date("H:i:s",strtotime($time1));
        $newDate1 = date("Y-m-d", strtotime($date1));  
        
       
        $time2 = $_POST['time2'];
        $date2 = $_POST['date2'];
        $newTime2 = date("H:i:s",strtotime($time2));
        $newDate2 = date("Y-m-d", strtotime($date2));  
 

        
        $time3 = $_POST['time3'];
        $date3 = $_POST['date3'];
        $newTime3 = date("H:i:s",strtotime($time3));
        $newDate3 = date("Y-m-d", strtotime($date3));  


        $time4 = $_POST['time4'];
        $date4 = $_POST['date4'];
        $newTime4 = date("H:i:s",strtotime($time4));
        $newDate4 = date("Y-m-d", strtotime($date4));  
  

        $time5 = $_POST['time5'];
        $date5 = $_POST['date5'];
        $newTime5 = date("H:i:s",strtotime($time5));
        $newDate5 = date("Y-m-d", strtotime($date5));  
   

        $time6 = $_POST['time6'];
        $date6 = $_POST['date6'];
        $newTime6 = date("H:i:s",strtotime($time6));
        $newDate6 = date("Y-m-d", strtotime($date6));  
   


        $query = "UPDATE consultation_time SET time1='$newTime1', date1='$newDate1' , time2='$newTime2', date2='$newDate2' , time3='$newTime3', date3='$newDate3', time4='$newTime4', date4='$newDate4', time5='$newTime5', date5='$newDate5', time6='$newTime6', date6='$newDate6' WHERE consultation_time_id='$id'  ";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:recordTime.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
