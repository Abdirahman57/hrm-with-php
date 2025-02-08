<?php


include ("../src/conn.php");

if(isset($_POST['deleteUser']))
{
    $id = $_POST['delete_id'];
    $query = mysqli_query($conn,"DELETE FROM `users` WHERE `user_id` = $id");
    if ($query)
    {
        echo "<script>alert('Users Deleted successfully!');</script>";
        header("Location: ../users_list.php");
    }
    else
    {
        echo "<script>alert('Failed to delete users!');</script>";
    }
}