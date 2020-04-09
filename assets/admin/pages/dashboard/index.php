<?php include_once('../authen.php');
include_once('../../connect.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard</title>
  <!-- Favicons -->
  <link rel="apple-touch-icon" sizes="180x180" href="../../dist/img/favicons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../../dist/img/favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../../dist/img/favicons/favicon-16x16.png">
  <link rel="manifest" href="../../dist/img/favicons/site.webmanifest">
  <link rel="mask-icon" href="../../dist/img/favicons/safari-pinned-tab.svg" color="#5bbad5">
  <link rel="shortcut icon" href="../../dist/img/favicons/favicon.ico">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="msapplication-config" content="../../dist/img/favicons/browserconfig.xml">
  <meta name="theme-color" content="#ffffff">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap4.min.css">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <?php include_once('../includes/sidebar.php') ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="row">
          <!-- Left col -->
          <div class="col-md-12">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-info-active text-center">
                <h3 class="widget-user-username">Page All Views</h3>
              </div>
              <div class="card-footer">
                <div class="row">
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                    <?php $sql="SELECT COUNT(*) as summember FROM `members`"; 
                          $res=mysqli_query($conn,$sql);
                          $row=mysqli_fetch_array($res);
                    ?>
                    
               
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.widget-user -->
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $row['summember']?></h3>
                <p>All Members</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-6">
            <div class="small-box bg-success">
              <div class="inner">
              <?php $sql1="SELECT COUNT(*) as sumnews FROM news";
                    $res1=mysqli_query($conn,$sql1);
                    $row1=mysqli_fetch_array($res1);
                    ?>
                <h3><?php echo $row1['sumnews']?></h3>
                <p>All News</p>
              </div>
              <div class="icon">
              <i class="fas fa-newspaper"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-6">
            <div class="small-box bg-primary">
              <div class="inner">
              <?php $sql2="SELECT COUNT(*) as sumstore FROM product";
                    $res2=mysqli_query($conn,$sql2);
                    $row2=mysqli_fetch_array($res2);
                    ?>
                <h3><?php echo $row2['sumstore']?></h3>
                <p>All Product</p>
              </div>
              <div class="icon">
                <i class="fa fa-shopping-cart"></i>
              </div>
            </div>
          </div>

          <div class="col-lg-6 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
              <?php $sql3="SELECT COUNT(*) as sumpayment FROM payment";
                    $res3=mysqli_query($conn,$sql3);
                    $row3=mysqli_fetch_array($res3);
                    ?>
                <h3><?php echo $row3['sumpayment']?></h3>
                <p>All Payment</p>
              </div>
              <div class="icon">
              <i class="far fa-credit-card"></i></i>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- footer -->
  <?php include_once('../includes/footer.php') ?>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SlimScroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>

</body>
</html>
