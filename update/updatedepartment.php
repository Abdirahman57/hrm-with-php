<?php

include ("../src/conn.php");

if (isset($_POST['update']))
{
    $id = $_POST['update_id'];
    $name = $_POST['department_name'];

    $query = mysqli_query($conn, "UPDATE `department` SET `department_name` = '$name' WHERE `dep_id` = '$id'");

    if ($query)
    {
        echo "<script>alert('Department updated successfully!');</script>";
        header("Location: ../department_list.php");
    }
    else
    {
        echo "<script>alert('Failed to update department!');</script>";
    }

}