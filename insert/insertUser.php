<?php
include ("../src/conn.php");

if (isset($_POST['insertUser']))

{
    
    $allowed = array('png', 'jpg', 'jpeg', 'gif','PNG','JPG','JPEG','GIF','');
    
    $filename = $_FILES['photo']['name'];
    $EXT = pathinfo($filename, PATHINFO_EXTENSION);

    if(in_array($EXT, $allowed))
    {
        
        move_uploaded_file($_FILES['photo']['tmp_name'], '../img/'.$filename);
        if( $filename == "")
        {
            $path = 'img/no-img.png';
        }else{
            $path = 'img/'.$filename;
        }
   

         $name = $_POST['fullname'];
         $username = $_POST['username'];
         $password = $_POST['password'];
         $role = $_POST['role'];
         $created_date = date('Y-m-d H:i:s');

         $query = mysqli_query($conn,"INSERT INTO `users` (`fullname`, `username`, `password`,  `role`, `created_at`, `user_photo`) VALUES ('$name', '$username', '$password', '$role','$created_date','$path')");
    
         
         if ($query) {
             echo "<script>alert('user added successfully'); window.location.href='../users_list.php';</script>";
            //  echo "<script> <div>
			// 	alert('Employee added successfully'); 
            //     window.location.href='../employee_list.php';
			//     </div>
            // </script>";
            
         } 
         else {
        echo "<script>alert('Error adding Users'); </script>";
         }
    }else {
        echo $EXT. '<script>alert("Please check if its not png, jpg, jpeg,gift")</script>';
    }

}



?>