<?php
include ("../src/conn.php");
if (isset($_POST['save'])){

    
    $department_name= ($_POST['department_name']);
   
    $query = mysqli_query($conn,"INSERT INTO `department` (`department_name`) VALUES ('$department_name')");

    if($query){
        echo'<script>alert("Successfully record Saved");</script>';
        header("location: ../department_list.php");
    }else{
        echo "Error: ";
    }
}


