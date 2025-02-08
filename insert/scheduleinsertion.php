<?php
include ("../src/conn.php");
if (isset($_POST['save'])){

    $time_in = date('h.i.s A', strtotime($_POST['time_in']));
    $time_out= date('h.i.s A', strtotime($_POST['time_out']));
   
    $query = mysqli_query($conn,"INSERT INTO `schedule` (`time_in`,`time_out`) VALUES ('$time_in','$time_out')");

    if($query){
        echo'<script>alert("Successfully record Saved");</script>';
        header("location: ../schedule_list.php");
    }else{
        echo "Error: ";
    }
}

