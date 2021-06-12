<?php 
session_start();
error_reporting(0);
include('../includes/dbconnection.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else{
    if (!function_exists('currency_format')) {
        function currency_format($number, $suffix = 'đ') {
            if (!empty($number)) {
                return number_format($number, 0, ',', '.') . "{$suffix}";
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">

    <title>Lịch sử đặt hàng</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/green.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/owl.transitions.css">
    <link href="assets/css/lightbox.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/rateit.css">
    <link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="assets/css/config.css">
    <link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
    <link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
    <link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
    <link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
    <link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <script language="javascript" type="text/javascript">
    var popUpWin = 0;
    function popUpWindow(URLStr, left, top, width, height) {
        if (popUpWin) {
            if (!popUpWin.closed) popUpWin.close();
        }
        popUpWin = open(URLStr, 'popUpWin',
            'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' +
            600 + ',height=' + 600 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
    }
    </script>

</head>

<body class="cnt-home">
    <header class="header-style-1">
        <?php include('includes/top-header.php');?>
        <?php include('includes/main-header.php');?>
        <?php include('includes/menu-bar.php');?>
    </header>
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li class='active'>Lịch sử đơn hàng</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="body-content outer-top-xs" style="font-family:times new roman">
        <div class="container">
            <div class="row inner-bottom-sm">
                <div class="shopping-cart">
                    <div class="col-md-12 col-sm-12 shopping-cart-table ">
                    <h2 align="center" style="margin-top:-20px">Lịch sử đơn hàng</h2>
                        <div class="table-responsive">
                            <form name="cart" method="post">
                                <table class="table" style="border:0px">
                                    <thead>
                                        <tr style="background-color:#EEEEEE;color:black">
                                            <th class="cart-romove item">#</th>
                                            <th style="font-family:times new roman" class="cart-description item">Hình ảnh</th>
                                            <th style="font-family:times new roman" class="cart-product-name item">Tên sản phẩm</th>

                                            <th style="font-family:times new roman" class="cart-qty item">SL</th>
                                            <th style="font-family:times new roman" class="cart-sub-total item">Giá mỗi đơn vị</th>
                                            <th style="font-family:times new roman" class="cart-sub-total item">Phí</th>
                                            <th style="font-family:times new roman" class="cart-total item">Tổng cộng</th>
                                            <th style="font-family:times new roman" class="cart-total item">PTTT</th>
                                            <th style="font-family:times new roman" class="cart-description item">Ngày đặt</th>
                                            <th style="font-family:times new roman" class="cart-total last-item">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $query=mysqli_query($con,"select tblsanpham.Hinhanh1 as pimg1,tblsanpham.Tensanpham as pname,tblsanpham.Id as proid,tblorders.SanphamId as opid,tblorders.Soluong as qty,tblsanpham.Giasanpham as pprice,tblsanpham.Phivanchuyen as shippingcharge,tblorders.Phuongthucthanhtoan as paym,tblorders.Ngayorder as odate,tblorders.Id as orderid from tblorders join tblsanpham on tblorders.SanphamId=tblsanpham.Id where tblorders.UserId='".$_SESSION['id']."' and tblorders.Phuongthucthanhtoan is not null");
											$cnt=1;
											while($row=mysqli_fetch_array($query))
											{
										?>
                                        <tr style="border:0px;font-size:1.7rem">
                                            <td><?php echo $cnt;?></td>
                                            <td class="cart-image">
                                                <a class="entry-thumbnail" href="detail.html">
                                                    <img src="../admin/productimages/<?php echo $row['proid'];?>/<?php echo $row['pimg1'];?>"
                                                        alt="" width="84" height="146">
                                                </a>
                                            </td>
                                            <td class="cart-product-name-info">
                                                <h4 class='cart-product-description'><a style="font-family:times new roman"
                                                        href="product-details.php?pid=<?php echo $row['opid'];?>">
                                                        <?php echo $row['pname'];?></a></h4>


                                            </td>
                                            <td class="cart-product-quantity">
                                                <?php echo $qty=$row['qty']; ?>
                                            </td>
                                            <td class="cart-product-sub-total"><?php echo currency_format($price=$row['pprice']); ?>
                                            </td>
                                            <td class="cart-product-sub-total">
                                                <?php echo currency_format($shippcharge=$row['shippingcharge']); ?> </td>
                                            <td class="cart-product-grand-total">
                                                <?php echo currency_format(($qty*$price)+$shippcharge);?></td>
                                            <td class="cart-product-sub-total"><?php echo $row['paym']; ?> </td>
                                            <td class="cart-product-sub-total"><?php echo $row['odate']; ?> </td>

                                            <td>
                                                <a class="btn btn-danger" href="javascript:void(0);"
                                                    onClick="popUpWindow('track-order.php?oid=<?php echo htmlentities($row['orderid']);?>');"
                                                    title="Track order">
                                                    Theo dõi
                                            </td>
                                        </tr>
                                        <?php $cnt=$cnt+1;} ?>

                                    </tbody>
                                </table>

                        </div>
                    </div>

                </div>
            </div>
            </form>
        </div>
    </div>
    <?php include('includes/footer1.php');?>

    <script src="assets/js/jquery-1.11.1.min.js"></script>

    <script src="assets/js/bootstrap.min.js"></script>

    <script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>

    <script src="assets/js/echo.min.js"></script>
    <script src="assets/js/jquery.easing-1.3.min.js"></script>
    <script src="assets/js/bootstrap-slider.min.js"></script>
    <script src="assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="assets/js/lightbox.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="switchstylesheet/switchstylesheet.js"></script>
    <script>
    $(document).ready(function() {
        $(".changecolor").switchstylesheet({
            seperator: "color"
        });
        $('.show-theme-options').click(function() {
            $(this).parent().toggleClass('open');
            return false;
        });
    });

    $(window).bind("load", function() {
        $('.show-theme-options').delay(2000).trigger('click');
    });
    </script>
</body>

</html>
<?php } ?>