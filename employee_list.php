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
  <?php 
        if($_SESSION['role'] == 'admin'){
        
  ?>
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
          <div class="col-12">
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
              <button type="button" class="btn btn-info" data-toggle="modal"
                                        data-target="#userModal">
                                        Add new Employee</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <?php
                    $query = mysqli_query($conn,"SELECT * FROM `employee`");

                    
                    ?>
                  <tr>
                    <th>#</th>
                    <th>Emp_Photo</th>
                    <th>Emp_name</th>
                    <th>Emp_Phone </th>
                    <th>Address</th>
                    <th>Gender</th>
                    
                    <th>Department</th>
                    <th>Schedule</th>
                   

                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    if($query)
                    {

                    foreach($query as $row){
                    
                    
                    ?>
                    <tr>
                    <td><?php echo $row['emp_id']?></td>
                    <td><img src="<?php echo $row['emp_photo']?>" width="50px" height="50px" alt="Employee Photo" class="img-circle"></td>
                    
                    <td><?php echo $row['emp_name']?></td>
                    <td><?php echo $row['emp_phone']?></td>
                    <td><?php echo $row['emp_address']?></td>
                    <td><?php echo $row['gender']?></td>
                    
                    <td>
                      <?php 

                       $id = $row['dep_id'];
                      $depquery =  mysqli_query($conn, "SELECT * FROM department WHERE dep_id = '$id'");
                      while ($result = mysqli_fetch_array($depquery))
                      {
                        echo $result['department_name'];
                      }
                       ?>
                    </td>
                    <td>
                    <?php 

                      $sch_id = $row['sch_id'];
                      $schquery =  mysqli_query($conn, "SELECT * FROM schedule WHERE sch_id = '$sch_id'");
                      while ($result = mysqli_fetch_array($schquery))
                      {
                       echo $result['time_in'] ,'-',  $result['time_out'];
                      }
                      ?>
                    </td>
                  <?php  ?>
                    <td >
                      <form action="updateEmployee.php" method="post">
                        <input type="hidden" name="update_id" value="<?php echo $row['emp_id']?>">
                        <button  type="submit"class="btn btn-info " name="update_emp"><i class="fa fa-edit"></i></button>
                        <butto type="button" class="btn btn-danger deletebtn"><i class="fa fa-trash"></i></button>
                    
                    </form>
                  </td>

                    </tr>
                    <?php
                    }
                    }
                   ?>
                  </tbody>
                    
                </table>
              </div>
              <div class="modal fade" id="userModal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Add New Employee</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="insert/insertEmployee.php" method="post" enctype="multipart/form-data">
                                                  <div class="modal-body">

                                                        <div class="form-group">
                                                            <label for="photo">Emp_Photo</label>
                                                            <input type="file" class="form-control" name="em_photo"
                                                                id="photo" placeholder="Upload Photo">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="emp_name">Emp_Name</label>
                                                            <input type="text" class="form-control" name="emp_name"
                                                                id="emp_name" placeholder="Enter Emp name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="phone">Phone</label>
                                                            <input type="text" class="form-control" name="phone"
                                                                id="phone" placeholder="Enter your phone">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="address">Address</label>
                                                            <input type="text" class="form-control" name="address"
                                                                id="address" placeholder="address">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="gender">Gender</label>
                                                            <input type="radio" class="form-control-sm-4 ml-3" name="gender"
                                                                id="gender" placeholder="gender" value="male"> male
                                                            <input type="radio" class="form-control-sm-4 ml-3" name="gender"
                                                                id="gender" placeholder="gender" value="female"> Female
                                                        </div>


                                                        <div class="form-group">
                                                          <label for="department">Department</label>
                                                          <?php 
                                                            $Selectdept = mysqli_query($conn,"SELECT * FROM department ");
                                                          ?>
                                                           <select name="department" id="select_dept" class="form-control">
                                                            <option value="">Select department</option>
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
                                                            <option value="">select schedule</option>
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
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" name="save"class="btn btn-primary">Save changes</button>
                                                  </div>
                                             
                                                  </div>
                                            </form>
                                        </div>
                                    </div>
              <!-- /.card-body -->
            </div>
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Employee</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="delete/deleteEmployee.php" method="post" enctype="multipart/form-data">
                                                  <div class="modal-body">
                                                    <input type="hidden" name="delete_id" id="delete_id">

                                                       <h3> Are you sure to delete </h3>

                                                        
                                                           
                                                  
                                                         
                                                        <!-- <div class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="exampleCheck1">
                                                            <label class="form-check-label" for="exampleCheck1">Check me
                                                                out</label>
                                                        </div>
                                                         -->
                                                    
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" name="delete" class="btn btn-danger btndelete">Yes ! delete it</button>
                                                  </div>
                                             
                                                  </div>
                                            </form>
                                        </div>
                                    </div>
              <!-- /.card-body -->
            </div>
            
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php 
        }elseif($_SESSION['role'] == 'user'){
          echo '<script> window.location.href ="attendence_list.php" </script>';
        }
   ?>
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

  


<script>
$(document).ready(function()
    {
        $(".deletebtn").on('click', function()
        {
            

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function()
             {
                return $(this).text();
            }).get();

            $("#delete_id").val(data[0]);
           
            
            $("#deleteModal").modal('show');
            console.log(data);

        });
    });
</script>
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
