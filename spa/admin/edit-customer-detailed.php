<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
	$name=$_POST['name'];
	$email=$_POST['email'];
	$mobilenum=$_POST['mobilenum'];
	$gender=$_POST['gender'];
	$details=$_POST['details'];
	$eid=$_GET['editid'];
    $query=mysqli_query($con, "update  tblkhachhang set Ten='$name',Email='$email',Sodienthoai='$mobilenum',Gioitinh='$gender',Chitiet='$details' where ID='$eid' ");
    if ($query) {
    $msg="Cập nhật khách hàng thành công !";
  	}
 	 else
    {
      $msg="Đã có lỗi xảy ra. Vui lòng thử lại !";
    }
}
  ?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>SPA | Cập nhật khách hàng</title>
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/font-awesome.css" rel="stylesheet"> 
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/modernizr.custom.js"></script>
	<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
	<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
	<script src="js/wow.min.js"></script>
		<script>
			new WOW().init();
		</script>
	<script src="js/metisMenu.min.js"></script>
	<script src="js/custom.js"></script>
	<link href="css/custom.css" rel="stylesheet">
</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
		 <?php include_once('includes/sidebar.php');?>
	 <?php include_once('includes/header.php');?>
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<h3 class="title1">Update Services</h3>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>Update Parlour Services:</h4>
						</div>
						<div class="form-body">
							<form method="post">
								<p style="font-size:16px; color:red" align="center"> <?php if($msg){
								echo $msg;
							}  ?> </p>
							<?php
								$cid=$_GET['editid'];
								$ret=mysqli_query($con,"select * from  tblkhachhang where ID='$cid'");
								$cnt=1;
								while ($row=mysqli_fetch_array($ret)) {
							?> 
							 <div class="form-group"> <label for="exampleInputEmail1">Tên</label> <input type="text" class="form-control" id="name" name="name"  value="<?php  echo $row['Ten'];?>" required="true"> </div> <div class="form-group"> <label for="exampleInputPassword1">Email</label> <input type="text" id="email" name="email" class="form-control"  value="<?php  echo $row['Email'];?>" required="true"> </div>
							 <div class="form-group"> <label for="exampleInputPassword1">Số điện thoại</label> <input type="text" id="mobilenum" name="mobilenum" class="form-control"  value="<?php  echo $row['Sodienthoai'];?>" required="true"> </div>
							 <div class="form-group"> <label for="exampleInputPassword1">Giới tính</label> <?php if($row['Gioitinh']=="Male")
							{?>
							<input type="radio" id="gender" name="gender" value="Male" checked="true">Nam
							<input type="radio" name="gender" value="Female">Nữ
							<input type="radio" name="gender" value="Transgender">Chuyển giới
							<?php } ?>
							<?php if($row['Gioitinh']=="Female")
							{?><input type="radio" id="gender" name="gender" value="Male" >Nam
							<input type="radio" name="gender" value="Female" checked="true">Nữ
							<input type="radio" name="gender" value="Transgender">Chuyển giới
							<?php } 
                    		else {?>
							<input type="radio" id="gender" name="gender" value="Male" >Nam
							<input type="radio" name="gender" value="Female" >Nữ
							<input type="radio" name="gender" value="Transgender" checked="true">Chuyển giới
							<?php }?>
							<div class="form-group"> <label for="exampleInputEmail1">Chi tiết</label> <textarea type="text" class="form-control" id="details" name="details" placeholder="Chi tiết" required="true" rows="12" cols="4"><?php  echo $row['Chitiet'];?></textarea> </div>
							<div class="form-group"> <label for="exampleInputPassword1">Ngày tạo</label> <input type="text" id="" name="" class="form-control"  value="<?php  echo $row['Ngaytao'];?>" readonly='true'> </div>
							 <?php } ?>
							  <button type="submit" name="submit" class="btn btn-default">Cập nhật</button> </form> 
						</div>
					</div>
			</div>
		</div>
		 <?php include_once('includes/footer.php');?>
	</div>
		<script src="js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
   <script src="js/bootstrap.js"> </script>
</body>
</html>
<?php } ?>