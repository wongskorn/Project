<?php
error_reporting(0);
session_start();
if($_POST) {
    include "dblink.php";
    $MemberIDSave = $_SESSION['MenberID'];
    $post_name = trim($_POST['post_name']," ");
 	$post_type = $_POST['type'];
    $post_rate = $_POST['rate'];
    $post_detail = trim($_POST['detail']," ");
    if(!empty($post_name) && !empty($post_type) && !empty($post_rate) && !empty($post_detail)){
            if(is_uploaded_file($_FILES['file']['tmp_name']))  {
                $error =  $_FILES['file']['error'];
                if($error == 0) {
                    include "lib/IMager/imager.php";
                    $img = image_upload('file');
                    $img = image_to_jpg($img);
                    $file = image_store_db($img, "image/jpeg");
                    $sql = "REPLACE INTO post VALUES('','$MemberIDSave','$post_name','$post_rate','$post_detail','$file')";
                    if(mysqli_query($link, $sql)){
                        $post_id = mysqli_insert_id($link);
                        foreach($post_type as $type){
                            $sql = "REPLACE INTO post_type VALUES('','$post_id','$type')";
                            mysqli_query($link, $sql);
                        } 
                        echo "<script>setInterval(function() { location.href = 'Post.php'; }, 100);
                        alert('เพิ่มสำเร็จ'); </script>";
                    }else{
                        echo "<script>alert('2');</script>";
                    }
                }else{
                    
                        echo "<script>alert('5');</script>";
                }
            }else{
                echo "<script>alert('กรุณาใส่โลโก้ทีม');</script>";
            }
    }else{
        echo "<script>alert('โปรดกรอกข้อมูลให้ครบ');</script>";
    }
    mysqli_close($link);
}
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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">

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
            </li>  -->
            <!-----------------------------------------------------------------------------  -->
            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item active">
                <a class="nav-link" href="MyProfile.php">

                    <span style="color: #FFFFFF;"> My Profile </span></a>
            </li>
            <!-----------------------------------------------------------------------------  -->


            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item active">
                <a class="nav-link" href="TopOnWeek.php">

                    <span style="color: #FFFFFF;"> Top on week </span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-----------------------------------------------------------------------------  -->

            <li class="nav-item active">
                <a class="nav-link" href="NewOnWeek.php">

                    <span style="color: #FFFFFF;"> New on week </span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-----------------------------------------------------------------------------  -->

            <li class="nav-item active">
                <a class="nav-link" href="News.php">

                    <span style="color: #FFFFFF;"> News </span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-----------------------------------------------------------------------------  -->
            <li class="nav-item active">
                <a class="nav-link" href="Category.php">

                    <span style="color: #FFFFFF;"> Category </span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-----------------------------------------------------------------------------  -->
            <li class="nav-item active">
                <a class="nav-link" href="Contact.php">

                    <span style="color: #FFFFFF;"> Contact </span></a>
            </li>
              <!-----------------------------------------------------------------------------  -->
              <li class="nav-item active">
                <a class="nav-link" href="HomeUnLogin.php">

                    <span style="color: #FFFFFF;"> Logout </span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
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
                        <!-- Nav Item - User Information -->
                        <?php if(isset($_SESSION['Email'])){?>
                        <li class="nav-item dropdown no-arrow">
                            <div class="nav-link dropdown-toggle"  >
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['Email'] ?> </span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </div>
                        </li>
                        <?php } ?>
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">POST</h1>
                    </div>
                    <form method="post" enctype="multipart/form-data">
                        <!-- Content Row -->
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="row">
                            <p class="col-1">ชื่อเรื่อง</p>
                            <input class="form-control col-8" name="post_name" type="text">
                        </div>
                        <br>
                        <div class="row">
                            <p class="col-1">แนวการ์ตูน</p>
                            <div class="col-11">
                                <?php
                                include "dblink.php";
                                $sql = "SELECT * FROM type";
                                $result = mysqli_query($link, $sql);
                                while($type = mysqli_fetch_array($result)) {
                                    echo "<input type='checkbox' name='type[]' value='{$type['type_id']}''>";
                                    echo "<label>{$type['type_name']}</label>";
                                    echo "&nbsp;&nbsp;";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-1">เรท</p>
                            <div class="col-11">
                                <input type="radio" name="rate" value="7+">
                                <label>7+</label>
                                <input type="radio" name="rate" value="13+">
                                <label>13+</label>
                                <input type="radio" name="rate" value="18+">
                                <label>18+</label>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-1">เนื้อเรื่อง </p>
                            <textarea class="form-control col-8" name="detail" id="" cols="80" rows="10"></textarea>
                        </div>
                        <br>
                        <div class="row">
                            <p class="col-1">รูปหน้าปก </p>
                            
                            <div class="col-6 input-group mb-3">
                                <div class="custom-file">
                                    <input type="file" class="custom-file" name="file">
                                </div>
                            </div><br></br>
                        </div><p class="col-3">โปรดใส่รูปขนาดไม่เกิด1MB </p><br>
                        <div class="row">
                            <button type="submit" class="btn btn-primary col-1">อัพโหลด</button>
                        </div>
                        <br>
                    </form>
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