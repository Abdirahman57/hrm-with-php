<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | DataTables</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
                            <h1>Schedule</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">schedule list</li>
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
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#attendenceModal">
                                        Add Attendance</button>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <?php  
                                    include ("src/conn.php"); 
                                    $query = mysqli_query($conn, "SELECT * FROM `attendanc`");
                                    ?>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Employee ID</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Time In </th>
                                                <th>Time Out </th>
                                                
                                               
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
                                            <td><?php echo $row['att_id'] ?></td>
                                            <td><?php echo $row['emp_id'] ?> </td>
                                            <td><?php echo $row['date'] ?> </td>
                                            <td><?php 
                                            if ($row['status'] == 1){ ?> 
                                              <span class="badge badge-success"> Ontime </span>
                                            
                                            <?php }else { ?>
                                             <span class="badge badge-danger"> Late </span>
                                            
                                            <?php }?> </td>
                                            
                                           
                                            <td><?php echo $row['time_in'] ?> </td>
                                            <td><?php echo $row['time_out'] ?> </td>
                                                
                                            <td>
                                                <!-- <button  type="button"class="btn btn-info editbtn" ><i class="fa fa-edit"></i></button> -->
                                                <button  type="button" class="btn btn-danger deletebtn"><i class="fa fa-trash"></i></button>
                                            </td>
                                                </tr>
                                                <?php 
                                                }
                                            } ?>
                                        </tbody>

                                    </table>
                                </div>
                                <!-- Button trigger modal -->


                                <!-- Modal -->

                                <!-- Button trigger modal -->


                                <!-- Modal -->
                                <!-- add popup modal -->
                                    <div class="modal fade" id="attendenceModal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Add New Attendence</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                               
                                                
                                                
                                                <div class="modal-body">
                                                <form action="insert/insertAttendence.php" method="post" enctype="multipart/form-data">
                                                        
                                                        <div class="form-group">
                                                            <label for="emp_id">Employee id</label>
                                                            <input type="text" class="form-control" name="emp_id"
                                                                id="emp_id" placeholder="Enter Employee id">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="date">Date</label>
                                                            <input type="date" class="form-control" name="date"
                                                                id="date" placeholder="Password">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="time_in">Time in</label>
                                                            <input type="time" class="form-control" name="time_in"
                                                                id="time_in" placeholder="Password">
                                                        </div>
                                                         
                                                        <!-- <div class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="exampleCheck1">
                                                            <label class="form-check-label" for="exampleCheck1">Check me
                                                                out</label>
                                                        </div>
                                                         -->
                                                         <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" name="save" class="btn btn-primary">Save changes</button>
                                                </div>
                                                </form>
                                                </div>
                                                
                                            </div>
                                           
                                        </div>
                                    </div>
                                <!-- update popup model-->
                                    
                               <!-- delete popup model-->
                               <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update Schedule</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                               
                                                
                                                
                                                <div class="modal-body">
                                                <form action="delete/deleteAttendence.php" method="post" enctype="multipart/form-data">
                                                    <input type="hidden" name="delete_id" id="delete_id">
                                                        
                                                       <h3>Are you sure to delete this</h3>
                                                         
                                                        <!-- <div class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="exampleCheck1">
                                                            <label class="form-check-label" for="exampleCheck1">Check me
                                                                out</label>
                                                        </div>
                                                         -->
                                                         <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" name="delete" class="btn btn-danger">Yes! Delete </button>
                                                </div>
                                                </form>
                                                </div>
                                                
                                            </div>
                                           
                                        </div>
                                    </div>

                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
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
    <script>
    
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
            $("#timeIn").val(data[1]);
            $("#timeOut").val(data[2]);
            $("#updateModal").modal('show');
            console.log(data);

        });
    });
    
    
    </script>
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


    <!-- Page specific script -->
    <script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,

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