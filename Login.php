<?php
error_reporting(0);
session_start();
if($_POST) { 
    include "dblink.php";
    $login = $_POST['id'];
    $pw = $_POST['pw'];
    $sql = "SELECT * FROM member WHERE Email = '$login' AND Password = '$pw'";
    if(mysqli_query($link, $sql)) {
        
        $r = mysqli_num_rows(mysqli_query($link, $sql));
        echo $r;
        if($r == 1) {
            $row = mysqli_fetch_array(mysqli_query($link, $sql));
            $_SESSION['Email'] = $row["Email"];
            $_SESSION['MenberID'] = $row["MenberID"];
            header("location: home.php");
            exit;
        }
        else {
            
        }
    }
    else { 
        
        
    }
}
mysqli_close($link);
?>






<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Animo</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">


</head>

<body>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient sidebar sidebaraccordion" id="accordionSidebar"
            style="background-color:#FF9966;">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="HomeUnLogin.php">

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->

                <div class="sidebar-brand-text mx-3" style="color: #FFFFFF; ">Animo</div>
            </a>
            <!-----------------------------------------------------------------------------  -->
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <!-- <li class="nav-item active">
                <a class="nav-link" href="Post.php">

                    <span style="color: #FFFFFF;"> Post </span></a>
            </li> -->
            <!-----------------------------------------------------------------------------  -->
            <!-- Divider -->
            <!-- <hr class="sidebar-divider">

            <li class="nav-item active">
                <a class="nav-link" href="index.html">

                    <span style="color: #FFFFFF;"> My Profile </span></a>
            </li> -->
            <!-----------------------------------------------------------------------------  -->


            <!-- Divider -->
            <!-- <hr class="sidebar-divider">

            <li class="nav-item active">
                <a class="nav-link" href="index.html">

                    <span style="color: #FFFFFF;"> Top Week </span></a>
            </li> -->
            <!-- Divider -->
            <!-- <hr class="sidebar-divider"> -->
            <!-----------------------------------------------------------------------------  -->

            <!-- <li class="nav-item active">
                <a class="nav-link" href="index.html">

                    <span style="color: #FFFFFF;"> New On Week </span></a>
            </li> -->
            <!-- Divider -->
            <!-- <hr class="sidebar-divider"> -->
            <!-----------------------------------------------------------------------------  -->

            <!-- <li class="nav-item active">
                <a class="nav-link" href="index.html">

                    <span style="color: #FFFFFF;"> News </span></a>
            </li> -->
            <!-- Divider -->
            <!-- <hr class="sidebar-divider"> -->
            <!-----------------------------------------------------------------------------  -->
            <!-- <li class="nav-item active">
                <a class="nav-link" href="index.html">

                    <span style="color: #FFFFFF;"> Category </span></a>
            </li> -->
            <!-- Divider -->
            <!-- <hr class="sidebar-divider"> -->
            <!-----------------------------------------------------------------------------  -->
            <!-- <li class="nav-item active">
                <a class="nav-link" href="index.html">

                    <span style="color: #FFFFFF;"> Contact </span></a>
            </li> -->



            <!-- Divider -->
            <!-- <hr class="sidebar-divider"> -->
            <!-----------------------------------------------------------------------------  -->
            <!-- <li class="nav-item active">
                <a class="nav-link" href="Register.php">

                    <span style="color: #FFFFFF;"> Register </span></a>
            </li> -->
            <!-----------------------------------------------------------------------------  -->
        </ul>
        <!-- Divider -->
        <hr class="sidebar-divider">
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                       

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Login</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                    <form method="post">
                        <div align="center">
                            <input  name="id" class="form-control" type="text" placeholder="Email"><br>
                            <input  name="pw" class="form-control" type="password" placeholder="PASSWORD"><br>
                            <button class="btn btn-secondary" type="submit">ตกลง</button>&emsp;&emsp;&emsp;&emsp;&emsp;
                            <a class="btn btn-secondary" href="HomeUnLogin.php">ยกเลิก</a>
                        </div>
                    </form>
                        
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-----------------------------------------------------------------------------  -->
    </div>




    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>