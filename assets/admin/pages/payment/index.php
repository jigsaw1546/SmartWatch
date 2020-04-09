<?php include_once('../authen.php') ?>
<?php 
include_once('../../../../includes/function.php');
include_once('../../connect.php');
  $sql="SELECT* FROM payment,members,orders where members.mem_id  and payment.mem_id=members.mem_id and orders.order_id = payment.order_id";
  $res=mysqli_query($conn,$sql);

?>
<style>
.successa {
 
 color: #fff;

 background-color: #28a745;
 border-radius: 35px;

 padding:5px;
}
.infos {
 
 color: #fff;
 background-color: #17a2b8;
 border-radius: 35px;
 border: 1px solid rgba(23, 162, 184, 0.75); 
 padding:5px;

}

</style>
<?php 

if($_REQUEST['admin']=='update'){

  //แก้ไขข้อมูลลง table ที่กำหนด โดยให้ชื่อฟิลด์ใน table ใน db = ค่าที่รับมา โดยข้อมูลที่แก้จะเปลี่ยนแปลงตาม id ของ รายการนั้น
  $sql = $conn->query("update payment set payment_status = '$_REQUEST[status]' where payment_id = '$_REQUEST[id]'");
  
  $sql = $conn->query("update orders set order_status = '2' where order_id = '$_REQUEST[order_id]'");
  
  //function check แก้ไขข้อมูล จะมี alert ขึ้นมา ตามเงื่อนไข
  Chk_Update($sql,'อัพเดทข้อมูลเรียบร้อย');
  
  }

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Payment Management</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Favicons -->
  <link rel="stylesheet" href="../../../../node_modules/responsive/responsive.bootstrap4.min.js">
  <link rel="apple-touch-icon" sizes="180x180" href="../../dist/img/favicons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../../dist/img/favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../../dist/img/favicons/favicon-16x16.png">
  <link rel="manifest" href="../../dist/img/favicons/site.webmanifest">
  <link rel="mask-icon" href="../../dist/img/favicons/safari-pinned-tab.svg" color="#5bbad5">
  <link rel="shortcut icon" href="../../dist/img/favicons/favicon.ico">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="msapplication-config" content="../../dist/img/favicons/browserconfig.xml">
  <meta name="theme-color" content="#ffffff">
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
  <link rel="stylesheet" href="../../plugins/responsive/responsive.bootstrap4.min.css"><!-- responsive-->
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar & Main Sidebar Container -->
  <?php include_once('../includes/sidebar.php') ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Payment Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Payment Management</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title d-inline-block">Payment List</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="dataTable" class="table table-bordered table-striped w-100 ">
            <thead>
            <tr>
              <th>ID.</th>
              <th>NAME</th>
              <th>ORDER ID</th>
              <th>PRICE</th>
              <th>BANK NAME</th>
              <th>TRANSFER DATE</th>
              <th>TRANSFER TIME</th>
              <th>ADDRESS</th>
              <th>TELEPHONE</th>
              <th>PAYMENT STATUS</th>
              <th>MORE</th>
            </tr>
            </thead>
            <tbody>
            <?php $i=1; while($row=mysqli_fetch_array($res)) { ?>
              <tr>
              <td><?php echo $i; ?></td>
                <td><?php echo $row['mem_fname']." ".$row['mem_lname']; ?></td>
                <td><a href="../../../../print_payment.php?order_number=<?php echo $row['order_number']; ?>"target="_blank" ><?php echo $row['order_number']; ?></td>
                <td><?php echo $row['payment_price']; ?></td>
                <td><?php echo $row['payment_bank']; ?></td>
                <td><?php echo $row['payment_date']; ?></td>
                <td><?php echo $row['payment_time']; ?></td>
                <td><?php echo $row['mem_address']; ?></td>
                <td><?php echo $row['mem_tel']; ?></td>
                <td><?php echo $row['payment_status']; ?></td>
                <td>
                <a href="#payment<?php echo $row['payment_id']; ?>" data-toggle="modal">
                    <button name="" type="button" class="btn btn-sm btn-warning text-white" ><i class='fas fa-edit'> </i>Checking</button>
                  </a> 
                  <a href="delete.php?payment_id=<?php echo $row['payment_id']?>" onClick="return confirm('คุณต้องการลบข้อมูลนี้หรือไม่');" class="btn btn-sm btn-danger">
                    <i class="fas fa-trash-alt"></i> Delete</a>
                </td>
              </tr>

            <div class="modal fade" id="payment<?php echo $row['payment_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      
                      <h5 class="modal-title" id="exampleModalLabel">Update Payment </h5>
                      
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    <form id="myform1" method="post" action="?admin=update&id=<?php echo $row['payment_id'];?>">
                    <div class="form-group">
                    <?php 
                  $sql3 = $conn->query("select * from payment where payment_id = '$row[payment_id]'");
                  $show3 = $sql3->fetch_assoc();
                  ?>
                  <input type="hidden" name="order_id" value="<?php echo $show3['order_id'];?>">
            <lable>หลักฐานการโอนเงิน:<lable>
            <a href="../../../image/payments/<?php echo $show3['payment_file'];?>" target="_blank"><img src="../../../image/payments/<?php echo $show3['payment_file'];?>" width="460"></a>
            </div>

            <div class="form-group">
            <lable>สถานะ:<lable>
           <select name="status" class="form-control">
           <option value="ตรวจสอบ"<?php if($show3['pay_status']==0){echo 'selected';}?>>ตรวจสอบ</option>
           <option value="ชำระเรียบร้อย"<?php if($show3['pay_status']==1){echo 'selected';}?>>ชำระเรียบร้อย</option>
           </select>
          </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                      
                    </div>
                  </form>
                  </div>
                </div>
              </div>




              
            <?php $i++;} ?>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

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
<!-- DataTables -->
<script src="../../../../node_modules/jquery-datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/responsive/dataTables.responsive.min.js"></script> <!-- responsive-->


<script>
  $(function () {
    $('#dataTable').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true
    });
  });

  function deleteItem (mem_id) { 
    if( confirm('คุณต้องการลบข้อมูลนี้หรือไม่') == true){
      window.location=`delete.php?mem_id=${mem_id}`;
      // window.location='delete.php?id='+id;
    }else{

    }
  };

</script>

</body>
</html>
