<?php session_start(); ?>



<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Change Password</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Roboto', sans-serif;
    }

    /* body{
    display: grid;
    grid-template-columns: repeat(2, 1fr);
} */


    .maincontainer1 {
        display: flex;
        flex-direction: row;
        /* grid-template-columns: repeat(2, 1fr); */
        justify-content: center;
        gap: -5px;
        margin-top: 10px;
        /* align-items: center; */
    }

    .container1 {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background-color: #2551b4;
        /* background-image:   url(pexels-pixabay-270348.jpg); */
        background-size: cover;
        opacity: 90%;
        width: 500px;
        /* margin-top: 10px;  */
        height: 500px;
        gap: 10px;
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
        border-radius: 5px;
    }

    .container1 h2 {
        color: white;
    }

    .container1 img {
        width: 150px;
        height: 150px;
    }



    .container2 {
        display: flex;
        align-items: center;
        flex-direction: column;
        justify-content: center;
        width: 500px;
        height: 500px;
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
        gap: 10px;
        /* margin-top: 10px;  */
        background-color: #afadc46e;
    }

    /* .form-group{
    display: flex;
    flex-direction: column;
    gap: 5px;
} */
    label {
        font-weight: 700;
    }

    #form {
        margin-top: -100px;
        margin-left: -50px;

    }

    .form-group input {
        display: block;
        padding: 10px 100px 10px 10px;
        text-align: left;
        border: none;

        background-color: #e0ddf9;
        border-radius: 3px;
        box-shadow: 0px 0px 5px #4d4a6044;
    }

    /* #passtxt{
    display: block;
    padding: 10px 100px 10px 10px;
    text-align: left;
    border: none;
} */
    #login {
        /* margin-left: 115px; */
        padding: 5px 5px 5px 5px;
        font-size: 1rem;
        font-weight: 600;
        background-color: #2551b4;
        color: white;
        border: none;
        width: 100%;
        border-radius: 5px;
        cursor: pointer;

    }

    .container2 small {
        visibility: hidden;
        color: red;
    }

    .form-group.error input {
        display: block;
        /* padding: 10px 100px 10px 10px;
    text-align: left; */

        border: 1.3px solid rgba(255, 0, 0, 0.641);

    }

    .Message {
        display: flex;
        width: 400px;
        padding: 10px 50px;
        border-radius: 3px;
        visibility: hidden;
    }

    .success {
        display: flex;

        background-color: rgb(18, 137, 98);
        color: white;

        /* padding: 5px 100px 5px 100px; */
    }

    .error2 {
        display: flex;

        background-color: rgb(180, 6, 47);
        color: white;

        /* padding: 5px 100px 5px 100px; */
    }

    #forget {
        margin-left: 115px;
        text-decoration: none;
        position: relative;


    }
    #profile{
        display: none;
    }
    @media screen and (max-width: 600px) {
        .container1{
            display: none;
        }
        .container2{
            display: flex;
            flex-direction: column;
            margin-top: 50px;
            width: 350px;
            height: 600px;
            justify-content: center;
            align-items: center;
        }
        #form{
            margin-left: 10px;
        }
        #profile{
            display: flex;
            width: 100px;
            border-radius: 100px;
        }
    }
    
    
    </style>
</head>

<body>


    <div class="maincontainer1">
        <div class="container1">
            <img src="lock.png" alt="">
            <h2>Change Your Password</h2>
        </div>
        .<div class="container2">
           
            
            <form action="" id="form" method="post">

                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" placeholder="Enter your username" name="username" >
                <div class="form-group">
                    <label for="Password">Password</label>
                    <input type="Password" placeholder="Enter current Password" name="password" class="form-control"
                        id="currentpassword">
                    <span></span>
                </div>
                
               

                <a href="" id="forget">Forget your Password ?</a>
                <br>
                <div class="modal-footer">
                    
                    <button type="submit" id="login" name="login" class="btn btn-success">Login</button>

                </div>

            </form>
        </div>
       
        <?php
      include ("src/conn.php");
      if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $login = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' AND password = '$password'");
        $counterresult = mysqli_num_rows($login);
        $result = mysqli_fetch_array($login);
        if ($counterresult > 0) {
            $_SESSION['user_id'] = $result[0];
            $_SESSION['fullname'] = $result[1];
            $_SESSION['username'] = $result[2];
            $_SESSION['password'] = $result[3];
            $_SESSION['role'] = $result[4];
            $_SESSION['user_photo'] = $result[5];

            echo '<script> alert("Succesfully signed")</script>';
            echo '<script> window.location.href ="dashboard.php" </script>';
            
        }else{
            echo '<script> alert("Invalid username or password!")</script>';
            echo '<script> window.location.href ="index.php" </script>';

        }

      }

      
      
      ?>

    </div>
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
    <!-- <script src="main.js"></script> -->
    <script>

    </script>
</body>

</html>