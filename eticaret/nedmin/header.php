<?php
set_include_path(get_include_path() . PATH_SEPARATOR . 'C:/xampp/htdocs/eticaret/netting');
include('baglan.php');
$kategori_get = $db->prepare("SELECT * FROM kategori ORDER BY kategori_sira ASC");
$kategori_get->execute();

$ayarsor = $db->prepare("SELECT * from ayar WHERE ayar_id =:id");
$ayarsor->execute([
    'id' => 0
]);
$ayarcek = $ayarsor->fetch(PDO::FETCH_ASSOC);

$urun_get = $db->prepare("SELECT * FROM urun ORDER BY urun_id ASC");
$urun_get->execute();


?>
<?php  

$hakkımızda=$db->prepare("SELECT * from hakkimizda");
$hakkımızda->execute();

$hakkımızda_cek = $hakkımızda->fetch(PDO::FETCH_ASSOC);

session_abort();
session_start();

$kullanici_mail=$_SESSION["kullanici_mail"];
$kullanici=$db->prepare("SELECT * from kullanici WHERE kullanici_mail= :kullanici_mail and kullanici_yetki= :kullanici_yetki ");
$kullanici->execute([
 'kullanici_mail'=> $kullanici_mail,
 'kullanici_yetki'=>5
]);
$say = $kullanici->rowCount();
$getir=$kullanici->fetch(PDO::FETCH_ASSOC);

// yetkisiz giriş
// if (!$_SESSION['kullanici_mail']) {
    
// }
if ($say==0) {
    header("location:login.php");
    exit;
}

$kullanici_düzenle = $db->prepare("SELECT * FROM kullanici");
$kullanici_düzenle->execute();


$menu_get=$db->prepare('SELECT * FROM menu ');
$menu_get->execute();


$banka_get = $db->prepare("SELECT * FROM banka ORDER BY banka_id ASC");
$banka_get->execute();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>e-ticaret </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">

    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <!-- <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella
                                Alela!</span></a>
                    </div> -->

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="images/img.jpg" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2><?php
                            echo $getir['kullanici_adsoyad'];
                            ?></h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                <li><a href="index.php"><i class="fa fa-home"></i> ana sayfa </a></li>
                                <li><a><i class="fa fa-cogs"></i> genel ayar <span
                                            class="fa fa-chevron-down"></span></a>

                                    <ul class="nav child_menu">
                                        <li><a href="genel-ayar.php">genel ayarlar</a></li>
                                        <li><a href="iletişim-ayar.php">iletişim ayarlar</a></li>
                                        <li><a href="api-ayar.php">api ayarlar</a></li>
                                        <li><a href="sosyal-ayar.php">sosyal ayarlar</a></li>
                                        <li><a href="mail-ayar.php">mail ayarlar</a></li>



                                    </ul>
                                </li>
                                <li><a href="hakkımızda-ayar.php"><i class="fa fa-info"></i> hakkımızda ayar </a></li>
                                <li><a href="kullanici-ayar.php"><i class="fa fa-user"></i> kullanıcılar </a></li>
                                <li><a href="menu.php"><i class="fa fa-bars"></i> menu ayar </a></li>
                                <li><a href="kategori-ayar.php"><i class="fa fa-folder"></i> Kategori Ayarları </a></li>
                                <li><a href="slider-ayar.php"><i class="fa fa-image"></i> slider ayar </a></li>
                                <li><a href="banka-ayar.php"><i class="fa fa-university"></i>
                                        banka ayar
                                    </a></li>
                                <li><a href="urun-ayar.php"><i class="fa fa-shopping-cart"></i> ürün ayar </a></li>



                            </ul>
                            </li>

                        </div>


                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <nav>
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                                    aria-expanded="false">
                                    <img src="images/img.jpg" alt=""><?php
                            echo $getir['kullanici_adsoyad'];
                            ?>
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li><a href="javascript:;"> Profile</a></li>
                                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                                </ul>
                            </li>

                            <li role="presentation" class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="badge bg-green">6</span>
                                </a>
                                <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                    <li>
                                        <a>
                                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                            <span>
                                                <span>John Smith</span>
                                                <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                                Film festivals used to be do-or-die moments for movie makers. They were
                                                where...
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                            <span>
                                                <span>John Smith</span>
                                                <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                                Film festivals used to be do-or-die moments for movie makers. They were
                                                where...
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                            <span>
                                                <span>John Smith</span>
                                                <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                                Film festivals used to be do-or-die moments for movie makers. They were
                                                where...
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                            <span>
                                                <span>John Smith</span>
                                                <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                                Film festivals used to be do-or-die moments for movie makers. They were
                                                where...
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="text-center">
                                            <a>
                                                <strong>See All Alerts</strong>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->