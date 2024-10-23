<?php  
include "netting/baglan.php";
$hakkımızda=$db->prepare("SELECT * from hakkimizda");
$hakkımızda->execute();

$hakkımızda_cek = $hakkımızda->fetch(PDO::FETCH_ASSOC);

?><?php
include("netting/baglan.php");
$ayar_getir=$db->prepare("SELECT * from ayar WHERE ayar_id= :ayar_id");
$ayar_getir->execute(['ayar_id'=>0]);
$ayar_getir=$ayar_getir->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>
        <?php echo $hakkımızda_cek["hakkimizda_baslik"]; ?>
    </title>

    <link rel="shortcut icon" href="images\fav.png" />

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Ubuntu:400,400italic,700" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet" type="text/css" />
    <link href="font-awesome\css\font-awesome.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap -->
    <link href="bootstrap\css\bootstrap.min.css" rel="stylesheet" />
    <!-- Main Style -->
    <link rel="stylesheet" href="style.css" />
    <!-- fancy Style -->
    <link rel="stylesheet" type="text/css" href="js\product\jquery.fancybox.css?v=2.1.5" media="screen" />

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
                                <a href="#" id="reg" class="btn btn-default btn-dark">Login<span>-- Or
                                        --</span>Register</a>
                                <div class="regwrap">
                                    <div class="row">
                                        <div class="col-md-6 regform">
                                            <div class="title-widget-bg">
                                                <div class="title-widget">Login</div>
                                            </div>
                                            <form role="form">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="username"
                                                        placeholder="Username" />
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" class="form-control" id="password"
                                                        placeholder="password" />
                                                </div>
                                                <div class="form-group">
                                                    <button class="btn btn-default btn-red btn-sm">
                                                        Sign In
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="title-widget-bg">
                                                <div class="title-widget">Register</div>
                                            </div>
                                            <p>
                                                New User? By creating an account you be able to shop
                                                faster, be up to date on an order's status...
                                            </p>
                                            <button class="btn btn-default btn-yellow">
                                                Register Now
                                            </button>
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
                                            <form class="form-horizontal" role="form">
                                                <div class="form-group">
                                                    <label for="search" class="col-sm-2 control-label">Search</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="search" />
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