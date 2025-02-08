<?php 

include ("src/conn.php");

$username = $_POST['username'];




 $userquery = mysqli_query($conn, "SELECT * FROM users where username = '$username'");
 $usercount = mysqli_num_rows($userquery);
if($username == ''){
    echo "<span></span>";
    // echo ('#uspan').html("<span class='badge badge-success'>$username  is availabe</span>");

}else if($usercount <= 0){
    echo "<span class='badge badge-success'> $username is available</span>";
    echo "<script> document.getElementById('userID').disabled = false</script>";
}else if($usercount > 0){
    echo "<span class='badge badge-danger'>$username is already taken</span>";
    echo "<script> document.getElementById('userID').disabled = true</script>";
}




?>
