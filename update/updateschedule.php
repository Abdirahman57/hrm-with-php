<?php

include ("../src/conn.php");


if(isset($_POST['update']))
{
    $time_in = date('h.i.s A', strtotime($_POST['time_in']));
    $time_out= date('h.i.s A', strtotime($_POST['time_out']));
    $update_id = $_POST['update_id']; // getting the id from the form data
    

   // $query = mysqli_query($conn,"UPDATE `schedule` where  `time_in` = $time_in, `time_out`= $time_out",);
   $query = mysqli_query($conn, "UPDATE `schedule` SET `time_in`='$time_in', `time_out`='$time_out' WHERE `sch_id`='$update_id'");

    if($query){
        echo'<script>alert("Successfully updated the record");</script>';
        header("location: ../schedule_list.php");
    }else{
        echo "Error: ";
    }

}
