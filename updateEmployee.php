<!DOCTYPE html>

<html lang="en">
<?php
    include ("src/conn.php");
  ?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | DataTables</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
    <?php include("src/header.php")?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employee</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employee list</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-10">
            <div class="card  ml-4">
            <div class="card-body">
               <?php 
                 if(isset($_POST['update_emp']))
                 {

                    $id = $_POST['update_id'];
                    $query = mysqli_query($conn,"SELECT * FROM `employee` WHERE `emp_id` = '$id'");
                    foreach($query as $row){
                    ?>
                     <form action="" method="post" enctype="multipart/form-data">
                                                  <div class="modal-body">
                                                    <input type="hidden" name="update_id" id="update_id" value="<?php echo $row['emp_id']?>">
                                                        <div class="form-group">
                                                            <label for="photo">Emp_Photo</label>
                                                            <input type="file" class="form-control" name="em_photo"
                                                                id="photo" placeholder="Upload Photo" value="<?php echo $row['emp_photo']?>">
                                                                <input type="hidden" name="old_photo" id="old_photo" value="<?php echo $row['emp_photo'] ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="emp_name">Emp_Name</label>
                                                            <input type="text" class="form-control" name="emp_name"
                                                                id="emp_name" placeholder="Enter Emp name" value= " <?php echo $row['emp_name']?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="phone">Phone</label>
                                                            <input type="text" class="form-control" name="phone"
                                                                id="phone" placeholder="Enter your phone" value ="<?php echo $row['emp_phone']?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="address">Address</label>
                                                            <input type="text" class="form-control" name="address"
                                                                id="address" placeholder="address" value="<?php echo $row['emp_address']?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="gender">Gender</label>
                                                            <input type="radio" class="form-control-sm-4 ml-3" name="gender"
                                                                id="gender" placeholder="gender" value="male" 
                                                                
                                                                <?php
                                                                if($row['gender'] == 'male'){
                                                                    echo 'checked';
                                                                }
                                                                 ?>> male
                                                            <input type="radio" class="form-control-sm-4 ml-3" name="gender"
                                                                id="gender" placeholder="gender" value="female" <?php
                                                                if($row['gender'] == 'female'){
                                                                    echo 'checked';
                                                                }
                                                                 ?>> Female
                                                        </div>


                                                        <div class="form-group">
                                                          <label for="department">Department</label>
                                                          <?php 
                                                            $Selectdept = mysqli_query($conn,"SELECT * FROM department ");
                                                          ?>
                                                           <select name="department" id="select_dept" class="form-control">
                                                            <option value="<?php echo $row['dep_id']?>">
                                                                <?php 
                                                                    $Depselect = $query = mysqli_query($conn,"SELECT * FROM department WHERE dep_id = '".$row['dep_id']."'");
                                                                     while($result = mysqli_fetch_array($Depselect))
                                                                     {
                                                                         echo $result['department_name'];
                                                                     }
                                                                ?>
                                                            </option>
                                                            <?php
                                                              while($result = mysqli_fetch_array($Selectdept))
                                                              { ?>
                                                                <option value="<?php echo $result['dep_id'] ?>"><?php echo $result['department_name'] ?></option>
                                                              
                                                              <?php
                                                              }
                                                            
                                                            ?>
                                                            
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="schedule">Schedule</label>
                                                            <?php 
                                                            $Selectdept = mysqli_query($conn,"SELECT * FROM schedule ");
                                                          ?>
                                                            <select name="schedule" id="select_sch" class="form-control">
                                                            <option value="<?php echo $row['sch_id']?>">
                                                                <?php 
                                                                    $schselect = $query = mysqli_query($conn,"SELECT * FROM schedule WHERE sch_id = '".$row['sch_id']."'");
                                                                     while($result = mysqli_fetch_array($schselect))
                                                                     {
                                                                         echo $result['time_in'], '-', $result['time_out'];
                                                                     }
                                                                ?>
                                                            </option>
                                                            <?php
                                                              while($result = mysqli_fetch_array($Selectdept))
                                                              { ?>
                                                                <option value="<?php echo $result['sch_id']?>"><?php echo $result['time_in'], '-' ,$result['time_out']?></option>
                                                              
                                                              <?php
                                                              }
                                                            
                                                            ?>
                                                            </select>
                                                        </div>
                                                         
                                                        <!-- <div class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="exampleCheck1">
                                                            <label class="form-check-label" for="exampleCheck1">Check me
                                                                out</label>
                                                        </div>
                                                         -->
                                                    
                                                  </div>
                                                  <div class="modal-footer">
                                                    <a href="employee_list.php"class="btn btn-secondary"
                                                        data-dismiss="modal">Close</a>
                                                    <button type="submit" name="update"class="btn btn-primary">Update changes</button>
                                                  </div>
                                             
                                                  
                     </form>
                    

                <?php    }
                 }
               ?>
            </div>
            </div>
            </div>
          </div>
          <!-- /.col -->
       
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>

    <?php 
        if (isset($_POST['update']))

        {
            
            $allowed = array('png', 'jpg', 'jpeg', 'gif','PNG','JPG','JPEG','GIF','');
            
            $filename = $_FILES['em_photo']['name'];
            $EXT = pathinfo($filename, PATHINFO_EXTENSION);
        
            if(in_array($EXT, $allowed))
            {
                
                move_uploaded_file($_FILES['em_photo']['tmp_name'], 'img/'.$filename);
                if( $filename == "")
                {
                    $oldphoto = $_POST['old_photo'];
                    $path = $oldphoto;
                }else{
                    $path = 'img/'.$filename;
                }
           
                $id = $_POST['update_id'];
                 $name = $_POST['emp_name'];
                 $phone = $_POST['phone'];
                 $address = $_POST['address'];
                 $gender = $_POST['gender'];
                 $department = $_POST['department'];
                 $schedule = $_POST['schedule'];
                 $update_data = date('Y-m-d H:i:s');
        
                 $query = mysqli_query($conn,"UPDATE `employee` SET `emp_name` ='$name', `emp_phone` ='$phone', `emp_address` ='$address',  `gender` = '$gender', `dep_id` ='$department', `sch_id`='$schedule', `updated_at` = '$update_data',`emp_photo` ='$path'  WHERE `emp_id` = '$id'");
            
                 
                 if ($query) {
                     echo "<script>alert('Employee Updated successfully'); window.location.href='employee_list.php';</script>";
                 } else {
                echo "<script>alert('Error Happened while updating the  employee'); </script>";
                 }
            }else {
                echo $EXT. '<script>alert("the file must be png, jpg, jpeg,gift")</script>';
            }
        
        }
        
        
    
    
    ?>
    <!-- /.content  -->
  </div>
  <!-- /.content-wrapper -->
  <?php include("src/footer.php") ?>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->

<!-- Page specific script -->

  


<!-- <script>
$(document).ready(function()
    {
        $(".editbtn").on('click', function()
        {
            

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function()
             {
                return $(this).text();
            }).get();

            $("#update_id").val(data[0]);
           
            $("#emp_name").val(data[2]);
            $("#phone").val(data[3]);
            $("#address").val(data[4]);
            $("#gender").val(data[5]);
            $("#select_dept").val(data[6]);
            $("#select_sch").val(data[7]);
            $("#updateModal").modal('show');
            console.log(data);

        });
    });
</script> -->
<script>
  
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
