<?php 

include ("../src/conn.php");


if(isset($_POST['delete']))
{
    $id = $_POST['delete_id'];
    
    $query = mysqli_query($conn, "DELETE FROM `schedule` WHERE `sch_id`=$id");
    
    if($query)
    {
        echo `<script>alert("successfully deleted");</script>`;
        header("Location: ../schedule_list.php");
    //    echo ` <script>
      
    //     setTimeout(()=>{
    //         alert("successfully deleted");
            
           
    //         setTimeout(()=>{
    //              header("location: ../schedule_list.php");
    //         },1000)
    //     },800)
    //     </script>`;
    }else
    {
       echo "error";
    }
    
    
    
}