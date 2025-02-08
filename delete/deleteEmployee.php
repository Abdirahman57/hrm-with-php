<?php


include ("../src/conn.php");

if(isset($_POST['delete']))
{
    $id = $_POST['delete_id'];
    $query = mysqli_query($conn,"DELETE FROM `employee` WHERE `emp_id` = $id");
    if ($query)
    {
        echo "<script>alert('Department updated successfully!');</script>";
        header("Location: ../employee_list.php");
    }
    else
    {
        echo "<script>alert('Failed to update department!');</script>";
    }
}