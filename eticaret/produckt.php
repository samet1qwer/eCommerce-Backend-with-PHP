<?php 
include "headerSite.php";
include "netting/baglan.php";
$kategori = $db->prepare("SELECT * FROM kategori");
$kategori->execute();

$sef = isset($_GET['sef']) ? $_GET['sef'] : null;
$urun_id = isset($_GET['urun_id']) ? $_GET['urun_id'] : null;

$ürün = $db->prepare("SELECT * FROM urun WHERE urun_id = :urun_id");
$ürün->execute(['urun_id' => $urun_id]);
$ürün_getir = $ürün->fetch(PDO::FETCH_ASSOC);
?>


<div class="container">
    <!-- <div class="row">
        <div class="col-md-12">
            <div class="page-title-wrap">
                <div class="page-title-inner">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="bread"><a href="#">Home</a> &rsaquo; Product Detail</div>
                            <div class="bigtitle">Product Detail</div>
                        </div>
                        <div class="col-md-3 col-md-offset-5">
                            <button class="btn btn-default btn-red btn-lg">Purchase Theme</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <div class="row">
        <div class="col-md-9">
            <!--Main content-->
            <div class="title-bg">
                <div class="title"><?php
                echo $ürün_getir['urun_ad'];
                ?></div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="dt-img">
                        <div class="detpricetag">
                            <div class="inner">$199</div>
                        </div>
                        <a class="fancybox" href="images\sample-1.jpg" data-fancybox-group="gallery"
                            title="Cras neque mi, semper leon"><img
                                src="nedmin/production/logo/15298355768636_reactgörsel.jpg" alt=""
                                class="img-responsive"></a>
                    </div>
                    <div class="thumb-img">
                        <a class="fancybox" href="images\sample-4.jpg" data-fancybox-group="gallery"
                            title="Cras neque mi, semper leon"><img
                                src="nedmin/production/logo/15298355768636_reactgörsel.jpg" alt=""
                                class="img-responsive"></a>
                    </div>
                    <div class="thumb-img">
                        <a class="fancybox" href="images\sample-5.jpg" data-fancybox-group="gallery"
                            title="Cras neque mi, semper leon"><img
                                src="nedmin/production/logo/15298355768636_reactgörsel.jpg" alt=""
                                class="img-responsive"></a>
                    </div>
                    <div class="thumb-img">
                        <a class="fancybox" href="images\sample-1.jpg" data-fancybox-group="gallery"
                            title="Cras neque mi, semper leon"><img
                                src="nedmin/production/logo/15298355768636_reactgörsel.jpg" alt=""
                                class="img-responsive"></a>
                    </div>
                </div>
                <div class="col-md-6 det-desc">
                    <div class="productdata">
                        <div class="infospan">Model <span><?php echo $ürün_getir['urun_ad'];  ?></span></div>
                        <div class="infospan">stok adedi <span><?php echo $ürün_getir['urun_stok']; ?></span></div>
                        <div class="infospan">ürün fiyatı <span><?php echo $ürün_getir['urun_fiyat']; ?></span></div>
                        <div class="average">
                            <form role="form">
                                <!-- <div class="form-group">
                                    <div class="rate"><span class="lbl">Average Rating</span>
                                    </div>
                                    <div class="starwrap">
                                        <div id="score"></div>
                                    </div>
                                    <div class="clearfix"></div> -->
                        </div>
                        </form>
                    </div>

                    <form class="form-horizontal ava" role="form">
                        <div class="form-group">

                            <div class="clearfix"></div>
                            <div class="dash"></div>
                        </div>
                        <div class="form-group">

                            <div class="clearfix"></div>
                            <div class="dash"></div>
                        </div>
                        <div class="form-group">

                            <!-- <div class="col-sm-4">
                                    <button class="btn btn-default btn-red btn-sm"><span class="addchart">Add To
                                            Chart</span></button>
                                </div> -->
                            <div class="clearfix"></div>
                        </div>
                    </form>

                    <div class="sharing">
                        <div class="share-bt">
                            <div class="addthis_toolbox addthis_default_style ">
                                <a class="addthis_counter addthis_pill_style"></a>
                            </div>
                            <script type="text/javascript" src="nedmin/production/logo/15298355768636_reactgörsel.jpg">
                            </script>
                            <div class="clearfix"></div>
                        </div>
                        <div class="avatock"><span>In stock</span>
                            <span><?php echo $ürün_getir['urun_stok']; ?></span>
                        </div>
                    </div>

                </div>
            </div>
        </div>



        <div id="title-bg">
            <div class="title">Benzer Ürünler</div>
        </div>
        <div class="row prdct">
            <!--Products-->
            <?php
    $ürünget = $db->prepare("SELECT * FROM urun ORDER BY rand() LIMIT 3");
    $ürünget->execute();

    while ($ürüngetir = $ürünget->fetch(PDO::FETCH_ASSOC)) {
    ?>
            <div class="col-md-4">
                <div class="productwrap">
                    <div class="pr-img">
                        <a href="product.htm">
                            <!-- Dinamik ürün resmi -->
                            <img src="nedmin/production/logo/15298355768636_reactgörsel.jpg" alt=""
                                class="img-responsive">
                        </a>
                        <div class="pricetag">
                            <div class="inner">$<?php echo $ürüngetir['urun_fiyat']; ?></div>
                        </div>
                    </div>
                    <span class="smalltitle">
                        <!-- Dinamik ürün adı -->
                        <a href="product.htm"><?php echo $ürüngetir['urun_ad']; ?></a>
                    </span>
                    <!-- Dinamik ürün numarası -->
                    <span class="smalldesc">Ürün No: <?php echo $ürüngetir['urun_id']; ?></span>
                </div>
            </div>
            <?php
    }
    ?>
        </div>
        <!--Main content-->
        <div class="spacer"></div>
    </div>
</div>
<?php
include "footerSite.php";
?>