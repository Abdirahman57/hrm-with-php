<?php
include ("../src/conn.php");

if (isset($_POST['save']))

{
    
    $allowed = array('png', 'jpg', 'jpeg', 'gif','PNG','JPG','JPEG','GIF','');
    
    $filename = $_FILES['em_photo']['name'];
    $EXT = pathinfo($filename, PATHINFO_EXTENSION);

    if(in_array($EXT, $allowed))
    {
        
        move_uploaded_file($_FILES['em_photo']['tmp_name'], '../img/'.$filename);
        if( $filename == "")
        {
            $path = '../img/no-img.png';
        }else{
            $path = 'img/'.$filename;
        }
   

         $name = $_POST['emp_name'];
         $phone = $_POST['phone'];
         $address = $_POST['address'];
         $gender = $_POST['gender'];
         $department = $_POST['department'];
         $schedule = $_POST['schedule'];
         $created_date = date('Y-m-d H:i:s');

         $query = mysqli_query($conn,"INSERT INTO `employee` (`emp_name`, `emp_phone`, `emp_address`,  `gender`, `dep_id`, `sch_id`,`created_at`, `emp_photo`) VALUES ('$name', '$phone', '$address', '$gender','$department', '$schedule', '$created_date','$path')");
    
         
         if ($query) {
             echo "<script>alert('Employee added successfully'); window.location.href='../employee_list.php';</script>";
            //  echo "<script> <div>
			// 	alert('Employee added successfully'); 
            //     window.location.href='../employee_list.php';
			//     </div>
            // </script>";
            
         } 
         else {
        echo "<script>alert('Error adding employee'); </script>";
         }
    }else {
        echo $EXT. '<script>alert("Please check if its not png, jpg, jpeg,gift")</script>';
    }

}



?>