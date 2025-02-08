<?php


include ("../src/conn.php");

if(isset($_POST['delete']))
{
    $id = $_POST['delete_id'];
    $query = mysqli_query($conn,"DELETE FROM `attendanc` WHERE `att_id` = $id");
    if ($query)
    {
        echo "<script>alert('Attendence Deleted successfully!');</script>";
        header("Location: ../attendence_list.php");
    }
    else
    {
        echo "<script>alert('Failed to update attendence!');</script>";
    }
}