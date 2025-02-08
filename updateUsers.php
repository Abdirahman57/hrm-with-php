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
            <h1>Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">update users</li>
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
                 if(isset($_POST['update_user']))
                 {

                    $id = $_POST['update_id'];
                    $query = mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id` = '$id'");
                    foreach($query as $row){
                    ?>
                    <form action="" method="post"
                                                enctype="multipart/form-data">
                                                <div class="modal-body">
                                                <input type="hidden" name="user_id" id="user_id" value="<?php echo $row['user_id'] ?>">
                                                    <div class="form-group">
                                                        <label for="photo">Photo</label>
                                                        <input type="file" class="form-control" name="user_photo" id="photo" placeholder="Upload Photo">
                                                            <input type="hidden" name="old_photo" id="old_photo" value="<?php echo $row['user_photo'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="fullname">Fullname</label>
                                                        <input type="text" class="form-control" name="fullname"
                                                            id="fullname" placeholder="fullname" value="<?php echo $row['fullname'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="username">Username</label>
                                                        <input type="text" class="form-control" name="username"
                                                            id="username" placeholder="username" value="<?php echo $row['username'] ?>">
                                                        <span id="uspan" class="uspan"></span>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="role">Role</label>
                                                        <select name="role" id="role" class="form-control">
                                                            <option value="<?php echo $row['role'] ?>"><?php echo $row['role'] ?></option>
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
                                                    <button type="submit" name="updateUser" id="userID"
                                                        class="btn btn-success">Update</button>
                                                </div>

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
        if (isset($_POST['updateUser']))

        {
            
            $allowed = array('png', 'jpg', 'jpeg', 'gif','PNG','JPG','JPEG','GIF','');
            
            $filename = $_FILES['user_photo']['name'];
            $EXT = pathinfo($filename, PATHINFO_EXTENSION);
        
            if(in_array($EXT, $allowed))
            {
                
                move_uploaded_file($_FILES['user_photo']['tmp_name'], 'img/'.$filename);
                if( $filename == "")
                {
                    $oldphoto = $_POST['old_photo'];
                    $path = $oldphoto;
                }else{
                    $path = 'img/'.$filename;
                }
           
                $id = $_POST['user_id'];
                $fullname = $_POST['fullname'];
                $username = $_POST['username'];
                $role = $_POST['role'];
                $update_date = date('Y-m-d h:i:s');
                
                $query = mysqli_query($conn, "UPDATE `users` SET `fullname`='$fullname', `username`='$username', `role`='$role', `user_photo`='$path', `updated_at`='$update_date' WHERE `user_id` = '$id'");
                 
                 if ($query) {
                     echo "<script>alert('user Updated successfully'); window.location.href='users_list.php';</script>";
                 } else {
                echo "<script>alert('Error Happened while updating the  user'); </script>";
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
