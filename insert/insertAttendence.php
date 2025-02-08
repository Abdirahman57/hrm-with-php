<?php

include ("../src/conn.php");

if (isset($_POST['save'])) {
    $emp_id = $_POST['emp_id'];
    $date = $_POST['date'];
    $time_In = date('h:i:s a', strtotime($_POST['time_in']));

    $readquary = mysqli_query($conn, "SELECT schedule.time_in , schedule.time_out FROM schedule, employee WHERE employee.sch_id = schedule.sch_id AND emp_id = '$emp_id'");

    if($readquary){
        foreach($readquary as $row){
            $timeIn = date('h:i:s a',strtotime($row['time_in']));
            $timeOut = date('h:i:s a',strtotime($row['time_out']));
            if($timeIn == $time_In){
                $status= 1;
            }else{
                $status= 0;
            } 
            $monthDate = date('M');
            $query = mysqli_query($conn, "INSERT INTO attendanc (`emp_id`, `date`, `monthly`, `status`,`time_in`,`time_out`) VALUES('".$emp_id."', '".$date."', '".$monthDate."', '".$status."', '".$time_In."', '".$timeOut."')");

            if($query){
            echo '<script>alert("Attendance saved successfully.") </script>';
            echo '<script> window.location.href ="../attendence_list.php" </script>';
        } else {
            echo '<script> alert("some thing is wrong ") </script>';
        }
        } 
    }else{
        echo '<script> alert("some thing is wrong to your DB ") </script>';
    }
      

}





?>