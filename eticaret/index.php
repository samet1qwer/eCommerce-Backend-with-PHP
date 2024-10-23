<?php
session_start();

include("headerSite.php");
?>

<div class="container">
    <?php

if (isset($_SESSION['kullanicimail'])) {  ?>
    <ul class="small-menu">
        <!--small-nav -->
        <li><a href="myaccount.php" class="myacc">hesabım</a></li>
        <li><a href="sepetim.php" class="myshop">alışveriş sepeti</a></li>
        <li><a href="logout.php" class="mycheck">güvenli çıkış</a></li>
    </ul>
    <?php
} else {
  
}
include "netting/baglan.php";

if (!isset($_GET['sef'])) {
  
    
    $ürün = $db->prepare("SELECT * FROM urun ORDER BY rand() LIMIT 6");
    $ürün->execute();

}else {
    $kategori = $db->prepare("SELECT * FROM kategori WHERE kategori_seourl = :sef");
    $kategori->execute(['sef' => $_GET['sef']]);

    $kategoriData = $kategori->fetch(PDO::FETCH_ASSOC);
    
    if ($kategoriData) {
        $kategori_id_get = $kategoriData['kategori_id'];

        $ürün = $db->prepare("SELECT * FROM urun WHERE kategori_id = :kategori_id ORDER BY rand() LIMIT 6 ");
        $ürün->execute([
            'kategori_id' => $kategori_id_get
        ]);
    } else {
        echo "Kategori bulunamadı.";
    }
}
$kategori = $db->prepare("SELECT * FROM kategori");
$kategori->execute();
?>

    <!--small-nav -->
    <div class="clearfix"></div>
    <div class="lines"></div>
    <div class="main-slide">
        <div id="sync1" class="owl-carousel">
            <div class="item">
                <div class="slide-desc">
                    <div class="inner">
                        <h1>Stylish Jacket, be your best deal</h1>
                        <p>
                            Nunc non fermentum nunc. Sed ut ante eget leo tempor consequat sit amet eu orci. Donec
                            dignissim dolor eget..
                        </p>
                        <button class="btn btn-default btn-red btn-lg">Add to cart</button>
                    </div>
                    <div class="inner">
                        <div class="pro-pricetag big-deal">
                            <div class="inner">
                                <span class="oldprice">$314</span>
                                <span>$199</span>
                                <span class="ondeal">Best Deal</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slide-type-1">
                    <img src="images\slide-1.jpg" alt="" class="img-responsive">
                </div>
            </div>
            <div class="item">
                <div class="slide-desc">
                    <div class="inner">
                        <h1>Stylish Jacket, be your best deal</h1>
                        <p>
                            Nunc non fermentum nunc. Sed ut ante eget leo tempor consequat sit amet eu orci. Donec
                            dignissim dolor eget..
                        </p>
                        <button class="btn btn-default btn-red btn-lg">Add to cart</button>
                    </div>
                    <div class="inner">
                        <div class="pro-pricetag big-deal">
                            <div class="inner">
                                <span class="oldprice">$314</span>
                                <span>$199</span>
                                <span class="ondeal">Best Deal</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slide-type-1">
                    <img src="images\slide-2.jpg" alt="" class="img-responsive">
                </div>
            </div>
            <div class="item">
                <div class="slide-desc">
                    <div class="inner">
                        <h1>Nike Airmax</h1>
                        <p>
                            Nunc non fermentum nunc. Sed ut ante eget leo tempor consequat sit amet eu orci. Donec
                            dignissim dolor eget..
                        </p>
                        <button class="btn btn-default btn-red btn-lg">Add to cart</button>
                    </div>
                    <div class="inner">
                        <div class="pro-pricetag big-deal">
                            <div class="inner">
                                <span class="oldprice">$314</span>
                                <span>$199</span>
                                <span class="ondeal">Best Deal</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slide-type-1">
                    <img src="images\slide-3.jpg" alt="" class="img-responsive">
                </div>
            </div>
            <div class="item">
                <div class="slide-desc">
                    <div class="inner">
                        <h1>Unique smaragd ring</h1>
                        <p>
                            Nunc non fermentum nunc. Sed ut ante eget leo tempor consequat sit amet eu orci. Donec
                            dignissim dolor eget..
                        </p>
                        <button class="btn btn-default btn-red btn-lg">Add to cart</button>
                    </div>
                    <div class="inner">
                        <div class="pro-pricetag big-deal">
                            <div class="inner">
                                <span class="oldprice">$314</span>
                                <span>$199</span>
                                <span class="ondeal">Best Deal</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slide-type-1">
                    <img src="images\slide-4.jpg" alt="" class="img-responsive">
                </div>
            </div>
            <div class="item">
                <div class="slide-desc">
                    <div class="inner">
                        <h1>Stylish Jacket, be your best deal</h1>
                        <p>
                            Nunc non fermentum nunc. Sed ut ante eget leo tempor consequat sit amet eu orci. Donec
                            dignissim dolor eget..
                        </p>
                        <button class="btn btn-default btn-red btn-lg">Add to cart</button>
                    </div>
                    <div class="inner">
                        <div class="pro-pricetag big-deal">
                            <div class="inner">
                                <span class="oldprice">$314</span>
                                <span>$199</span>
                                <span class="ondeal">Best Deal</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slide-type-1">
                    <img src="images\slide-2.jpg" alt="" class="img-responsive">
                </div>
            </div>
            <div class="item">
                <div class="slide-desc">
                    <div class="inner">
                        <h1>Nike Airmax</h1>
                        <p>
                            Nunc non fermentum nunc. Sed ut ante eget leo tempor consequat sit amet eu orci. Donec
                            dignissim dolor eget..
                        </p>
                        <button class="btn btn-default btn-red btn-lg">Add to cart</button>
                    </div>
                    <div class="inner">
                        <div class="pro-pricetag big-deal">
                            <div class="inner">
                                <span class="oldprice">$314</span>
                                <span>$199</span>
                                <span class="ondeal">Best Deal</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slide-type-1">
                    <img src="images\slide-3.jpg" alt="" class="img-responsive">
                </div>
            </div>

        </div>
    </div>
    <div class="bar"></div>
    <!-- <div id="sync2" class="owl-carousel">
        <div class="item">
            <div class="slide-type-1-sync">
                <h3>Stylish Jacket</h3>
                <p>Description here here here</p>
            </div>
        </div>
        <div class="item">
            <div class="slide-type-1-sync">
                <h3>Stylish Jacket</h3>
                <p>Description here here here</p>
            </div>
        </div>
        <div class="item">
            <div class="slide-type-1-sync">
                <h3>Nike Airmax</h3>
                <p>Description here here here</p>
            </div>
        </div>
        <div class="item">
            <div class="slide-type-1-sync">
                <h3>Unique smaragd ring</h3>
                <p>Description here here here</p>
            </div>
        </div>
        <div class="item">
            <div class="slide-type-1-sync">
                <h3>Stylish Jacket</h3>
                <p>Description here here here</p>
            </div>
        </div>
        <div class="item">
            <div class="slide-type-1-sync">
                <h3>Nike Airmax</h3>
                <p>Description here here here</p>
            </div>
        </div>
    </div> -->
</div>
<?php
if (!isset($_GET['sef'])) {
  
    
    $urun = $db->prepare("SELECT * FROM urun ORDER BY rand() LIMIT 6");
    $urun->execute();

}else {
    $kategori = $db->prepare("SELECT * FROM kategori WHERE kategori_seourl = :sef");
    $kategori->execute(['sef' => $_GET['sef']]);

    $kategoriData = $kategori->fetch(PDO::FETCH_ASSOC);
    
    if ($kategoriData) {
        $kategori_id_get = $kategoriData['kategori_id'];

        $urun = $db->prepare("SELECT * FROM urun WHERE kategori_id = :kategori_id ORDER BY rand() LIMIT 6 ");
        $urun->execute([
            'kategori_id' => $kategori_id_get
        ]);
    } else {
        echo "Kategori bulunamadı.";
    }
}
?>
<div class="f-widget featpro">
    <div class="container">
        <div class="title-widget-bg">
            <div class="title-widget">Featured Products</div>
            <div class="carousel-nav">
                <a class="prev"></a>
                <a class="next"></a>
            </div>
        </div>
        <div id="product-carousel" class="owl-carousel owl-theme">
            <?php
    while ($urun_get = $urun->fetch(PDO::FETCH_ASSOC)) {
    ?>
            <div class="item">
                <div class="productwrap">
                    <div class="pr-img">
                        <div class="hot"></div>
                        <a
                            href="<?php echo "produckt-" . seourl($urun_get['urun_ad']) . "-" . $urun_get['urun_id']; ?>"><img
                                src="nedmin/production/logo/15298355768636_reactgörsel.jpg" alt=""
                                class="img-responsive"></a>
                        <div class="pricetag blue">
                            <div class="inner"><span><?php echo $urun_get['urun_fiyat'] ?></span></div>
                        </div>
                    </div>
                    <span class="smalltitle"><a
                            href="<?php echo "produckt-" . seourl($urun_get['urun_ad']) . "-" . $urun_get['urun_id']; ?>"><?php echo $urun_get['urun_ad'] ?></a></span>
                    <span class="smalldesc"><?php echo $urun_get['urun_stok'] ?></span>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>



<div class="container">
    <div class="row">
        <div class="col-md-9">
            <!--Main content-->
            <?php
            $hakkimizdasor=$db->prepare("SELECT * FROM hakkimizda where hakkimizda_id=:id");
            $hakkimizdasor->execute(array(
                'id' => 0
                ));
            $hakkimizdacek=$hakkimizdasor->fetch(PDO::FETCH_ASSOC);
            ?>
            <div class="title-bg">
                <div class="title">Hakkımızda</div>
            </div>
            <p class="ct">
                <?php echo substr($hakkimizdacek['hakkimizda_icerik'],0,1000) ?>
            </p>

            <a href="about" class="btn btn-default btn-red btn-sm">devamını oku</a>

            <div class="title-bg">
                <div class="title">en yeni ürünler</div>
            </div>
            <div class="row prdct">
                <!--Products-->



                <?php
    while ($ürüngetir = $ürün->fetch(PDO::FETCH_ASSOC)) {
    ?>
                <div class="col-md-4">
                    <div class="productwrap">
                        <div class="pr-img">
                            <a
                                href="<?php echo "produckt-" . seourl($ürüngetir['urun_ad']) . "-" . $ürüngetir['urun_id']; ?>"><img
                                    src="nedmin/production/logo/15298355768636_reactgörsel.jpg" alt=""
                                    class="img-responsive"></a>
                            <div class="pricetag">
                                <div class="inner"><?php echo $ürüngetir['urun_fiyat'] ?></div>
                            </div>
                        </div>
                        <span class="smalltitle"><a
                                href="<?php echo "produckt-" . seourl($ürüngetir['urun_ad']) . "-" . $ürüngetir['urun_id']; ?>"><?php echo $ürüngetir['urun_ad'] ?></a></span>
                        <span class="smalldesc"><?php echo $ürüngetir['urun_stok'] ?></span>
                    </div>
                </div>
                <?php } ?>
            </div>
            <!--Products-->
            <div class="spacer"></div>
        </div>
        <!--Main content-->
        <?php include "kategori.php"; ?>
        <!--sidebar-->
    </div>
</div>
<?php
include("footerSite.php");
?>