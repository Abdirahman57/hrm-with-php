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
                            <h1>Users</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">users list</li>
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
                                        data-target="#userModal">
                                        Add new user</button>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <?php
                                            include ("src/conn.php");
                                                $runQuery = mysqli_query($conn, "SELECT * FROM users");
                                                
                                            ?>
                                            <tr>
                                                <th>#</th>
                                                <th>Photo</th>
                                                <th>Fullname</th>
                                                <th>Username</th>
                                                <th>Password</th>
                                                <th>Role</th>
                                                <th>created_at</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            if($runQuery){
                                            foreach ($runQuery as $row) {

                                         
                                            
                                            ?>
                                            <tr>
                                                <td><?php echo $row['user_id'] ?></td>
                                                <td><img src="<?php echo $row['user_photo']?>" width="50px"
                                                        height="50px" alt="user Photo" class="img-circle"></td>
                                                <td><?php echo $row['fullname']?> </td>
                                                <td><?php echo $row['username']?> </td>
                                                <td><?php echo $row['password']?> </td>
                                                <td><?php echo $row['role']?> </td>
                                                <td><?php echo $row['created_at']?> </td>
                                                <td>
                                                <form action="updateUsers.php" method="post">
                                                    <input type="hidden" name="update_id"
                                                        value="<?php echo $row['user_id']?>">
                                                    <button type="submit" class="btn btn-info " name="update_user"><i
                                                            class="fa fa-edit"></i></button>
                                                    <butto type="button" class="btn btn-danger deletebtn"><i
                                                            class="fa fa-trash deletebtn"></i></button>
                                                        
                                                </form></td>
                                            </tr>
                                            <?php 
                                         }
                                        } 
                                        ?>
                                        </tbody>

                                    </table>
                                </div>
                                <!-- Button trigger modal -->


                                <!-- Modal -->

                                <!-- Button trigger modal -->


                                <!-- Modal -->

                                <div class="modal fade" id="userModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="insert/insertUser.php" method="post"
                                                enctype="multipart/form-data">
                                                <div class="modal-body">

                                                    <div class="form-group">
                                                        <label for="photo">Photo</label>
                                                        <input type="file" class="form-control" name="photo" id="photo"
                                                            placeholder="Upload Photo">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="fullname">Fullname</label>
                                                        <input type="text" class="form-control" name="fullname"
                                                            id="fullname" placeholder="fullname">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="username">Username</label>
                                                        <input type="text" class="form-control" name="username"
                                                            id="username" placeholder="username">
                                                        <span id="uspan" class="uspan"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="passowrd">Password</label>
                                                        <input type="password" class="form-control" name="password"
                                                            id="password" placeholder="Password">
                                                        <span id="passspan"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="confirmPassword">confirm Password</label>
                                                        <input type="password" class="form-control"
                                                            name="confirmPassword" id="confirmPassword"
                                                            placeholder="confirm Password">
                                                        <span id="confirm"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="confirmPassword">confirm Password</label>
                                                        <select name="role" id="role" class="form-control">
                                                            <option value="">select role</option>
                                                            <option value="admin">Admin</option>
                                                            <option value="user">User</option>
                                                        </select>
                                                    </div>

                                                    <!-- <div class="form-group">
                                                            <label for="created_at">created_at</label>
                                                            <input type="date" class="form-control" name="created_at"
                                                                id="created_at" placeholder="created_at">
                                                        </div> -->

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
                                                    <button type="submit" name="insertUser" id="userID"
                                                        class="btn btn-primary">Save changes</button>
                                                </div>

                                        </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="delete/deleteUser.php" method="post"
                                                enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <input type="hidden" name="delete_id" id="delete_id">

                                                    
                                                    
                                                    
                                                <h3>Are you sure to delete this!</h3>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" name="deleteUser" id="userID"
                                                        class="btn btn-danger"> Yes! Delete it</button>
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
                </div>
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
    <script>
    $(document).ready(function(){
        $(".deletebtn").on('click', function()
        {
            

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function()
             {
                return $(this).text();
            }).get();

            $("#delete_id").val(data[0]);
            
            $("#deleteModal").modal('show');
            
        });
    })

    
    $(document).ready(function() {
        $("#confirmPassword").keyup(function() {
            var pass1 = $("#password").val();
            var confirmPass = $(this).val();
            // alert(confirmPass);
            if (confirmPass == "") {
                $("#confirm").html("<span></span>");
                $("#userID").prop("disabled", true);
            } else if (pass1 != confirmPass) {
                $("#confirm").html('<span class="badge badge-danger">Password is not same as</span>');
                $("#userID").prop("disabled", true);
            } else {
                $("#confirm").html('<span class="badge badge-success">Correct</span>');
                $("#userID").prop("disabled", false);
            }
        })
    })
    $(document).ready(function() {
        $("#password").keyup(function() {
            var passOne = $(this).val();
            if (passOne == "") {
                $("#passspan").html('<span></span>');
            } else if (passOne.length >= 1 && passOne.length <= 5) {
                $("#passspan").html(
                    '<span class="badge badge-danger">Your Password is Very Weak </span>');
            } else if (passOne.length >= 6 && passOne.length <= 10) {
                $("#passspan").html('<span class="badge badge-warning">Your Password is Medium</span>');
            } else {
                $("#passspan").html('<span class="badge badge-success">Your Password is Strong</span>');
            }
        });
    })
    </script>
    <!-- Page specific script -->
    <script>
    $(function() {

        $(document).ready(function() {
            $("#username").keyup(function() {
                var usname = $(this).val();
                $.ajax({
                    url: "checkUsername.php",
                    type: "POST",
                    datatype: "text",
                    data: {
                        username: usname
                    },
                    success: function(response) {
                        $("#uspan").html(response);
                    }
                });
            })
        });




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