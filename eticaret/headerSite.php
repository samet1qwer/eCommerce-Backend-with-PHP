<?php
include "netting/baglan.php";
include "nedmin/production/fonksiyon.php";
$ayar_getir=$db->prepare("SELECT * from ayar WHERE ayar_id= :ayar_id");
$ayar_getir->execute(['ayar_id'=>0]);
$ayar_getir=$ayar_getir->fetch(PDO::FETCH_ASSOC);

if (isset($_SESSION['kullanicimail'])) {
    $kullanici=$db->prepare("SELECT * FROM kullanici WHERE kullanici_mail= :kullanici_mail and kullanici_yetki= :kullanici_yetki");
$kullanici->execute([
  'kullanici_mail'=>$_SESSION['kullanicimail'],
  'kullanici_yetki'=>1
]);
$kullanicicek=$kullanici->fetch(pdo::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <meta name="description" content="<?php echo $ayar_getir['ayar_description']  ; ?>">
    <meta name="keywords" content="<?php echo $ayar_getir['ayar_keyword']  ; ?>">
    <meta name="author" content="<?php echo $ayar_getir['ayar_author']  ; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $ayar_getir['ayar_tittle']  ; ?></title>

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:400,400italic,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <link href='font-awesome\css\font-awesome.css' rel="stylesheet" type="text/css">
    <!-- Bootstrap -->
    <link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">

    <!-- Main Style -->
    <link rel="stylesheet" href="style.css">

    <!-- owl Style -->
    <link rel="stylesheet" href="css\owl.carousel.css">
    <link rel="stylesheet" href="css\owl.transitions.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div id="wrapper">
        <div class="header">
            <!--Header -->
            <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-md-4 main-logo">
                        <a href="index.php"><img style="height:70px;  "
                                src="<?php echo "nedmin/production/".$ayar_getir['ayar_logo'] ?>" alt="logo"
                                class="logo img-responsive"></a>
                    </div>

                    <div class="col-md-8">
                        <div class="pushright">
                            <div class="top">
                                <?php

if (isset($_SESSION['kullanicimail'])) {

    ?> <a href="#" class="btn btn-default btn-dark">hoşgeldiniz<span>----</span><?php echo $kullanicicek['kullanici_adsoyad'] ; ?></a>
                                <?php
}else{
    ?> <a href="#" id="reg" class="btn btn-default btn-dark">giriş yap<span>-- ya da
                                        --</span>kayıt ol</a>
                                <?php
}
?>

                                <div class="regwrap">
                                    <div class="row">
                                        <div class="col-md-6 regform">
                                            <div class="title-widget-bg">
                                                <div class="title-widget">giriş yap</div>
                                            </div>



                                            <form action="netting/işlem.php" method="POST">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="kullaniciadi"
                                                        id="username" placeholder="kullanıcı adınızı giriniz">
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" class="form-control" id="password"
                                                        name="kullanicipassword" placeholder="şifrenizi giriniz">
                                                </div>
                                                <div class="form-group">
                                                    <button class="btn btn-default btn-red btn-sm"
                                                        name="kullanicigiris">giriş yap</button>
                                                </div>
                                            </form>





                                        </div>
                                        <div class="col-md-6">
                                            <div class="title-widget-bg">
                                                <div class="title-widget">kayıt ol</div>
                                            </div>
                                            <p>
                                                yeni kullanıcı? hemen alışverişe başlamak için kayıt ol!
                                            </p>
                                            <a href="register.php"><button class="btn btn-default btn-yellow">kayıt
                                                    ol</button></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="srch-wrap">
                                    <a href="#" id="srch" class="btn btn-default btn-search"><i
                                            class="fa fa-search"></i></a>
                                </div>
                                <div class="srchwrap">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form class="form-horizontal" action="arama.php" method="post">
                                                <div class="form-group">
                                                    <button class="btn btn-success btn-xs" type="submit"
                                                        name="arama">Ara</button>

                                                    <div class="col-sm-10">
                                                        <input type="text" minlength="3" name="search_input"
                                                            class="form-control" id="search">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dashed"></div>
        </div>
        <!--Header -->
        <div class="main-nav">
            <!--end main-nav -->
            <div class="navbar navbar-default navbar-static-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse"
                                    data-target=".navbar-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="navbar-collapse collapse">
                                <ul class="nav navbar-nav">
                                    <li><a href="index.php" class="active">anasayfa</a>
                                        <div class="curve"></div>
                                    </li>

                                    <?php

$menu_get=$db->prepare('SELECT * FROM menu WHERE menu_durum= :menu_durum order by menu_sira asc limit 5 ');
$menu_get->execute([
    'menu_durum'=>1
]);

while ($getir_menu=$menu_get->fetch(pdo::FETCH_ASSOC)) {
    

?>
                                    <li><a href="<?php if (!empty($getir_menu['menu_url'])) {
                                           echo $getir_menu['menu_url'];
                                            }else{
                                                echo "sayfa-".seourl($getir_menu['menu_ad']);
                                            } ?>">
                                            <?php echo $getir_menu['menu_ad']; ?>
                                        </a>
                                    </li>
                                    <?php
}
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-2 machart">
                            <button id="popcart" class="btn btn-default btn-chart btn-sm "><span
                                    class="mychart">Cart</span>|<span class="allprice">$0.00</span></button>
                            <div class="popcart">
                                <table class="table table-condensed popcart-inner">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <a href="product.htm"><img src="images\dummy-1.png" alt=""
                                                        class="img-responsive"></a>
                                            </td>
                                            <td><a href="product.htm">Casio Exilim Zoom</a><br><span>Color: green</span>
                                            </td>
                                            <td>1X</td>
                                            <td>$138.80</td>
                                            <td><a href=""><i class="fa fa-times-circle fa-2x"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="product.htm"><img src="images\dummy-1.png" alt=""
                                                        class="img-responsive"></a>
                                            </td>
                                            <td><a href="product.htm">Casio Exilim Zoom</a><br><span>Color: green</span>
                                            </td>
                                            <td>1X</td>
                                            <td>$138.80</td>
                                            <td><a href=""><i class="fa fa-times-circle fa-2x"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="product.htm"><img src="images\dummy-1.png" alt=""
                                                        class="img-responsive"></a>
                                            </td>
                                            <td><a href="product.htm">Casio Exilim Zoom</a><br><span>Color: green</span>
                                            </td>
                                            <td>1X</td>
                                            <td>$138.80</td>
                                            <td><a href=""><i class="fa fa-times-circle fa-2x"></i></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <span class="sub-tot">Sub-Total : <span>$277.60</span> | <span>Vat (17.5%)</span> :
                                    $36.00 </span>
                                <br>
                                <div class="btn-popcart">
                                    <a href="checkout.htm" class="btn btn-default btn-red btn-sm">Checkout</a>
                                    <a href="cart.htm" class="btn btn-default btn-red btn-sm">More</a>
                                </div>
                                <div class="popcart-tot">
                                    <p>
                                        Total<br>
                                        <span>$313.60</span>
                                    </p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end main-nav -->