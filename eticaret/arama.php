<?php 
include "headerSite.php";
include "netting/baglan.php";

// Arama işlemi kontrolü
if (isset($_POST['arama'])) {
    // Arama girdiğini alıyoruz
    $arama = $_POST["search_input"];
    
    // Arama sorgusu
    $ürün = $db->prepare("SELECT * FROM urun WHERE urun_ad LIKE ?");
    $ürün->execute(["%$arama%"]);

    // Eğer arama sonucu yoksa uyarı verelim
    if ($ürün->rowCount() == 0) {
        echo "<div class='alert alert-warning'>Aradığınız kriterlere uygun ürün bulunamadı.</div>";
    }
} else {
    // Eğer arama yapılmadıysa anasayfaya yönlendirelim
    header("Location: http://localhost/eticaret/index.php");
    exit; 
}

// Kategori sorgusu
$kategori = $db->prepare("SELECT * FROM kategori");
$kategori->execute();
?>

<!-- end main-nav -->

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <!--Main content-->
            <div class="title-bg">
                <div class="title">Ürünler</div>
            </div>
            <div class="row prdct">
                <!--Products-->
                <div class="row prdct">
                    <?php
                    // Ürünleri listeleme
                    while ($ürün_get = $ürün->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <div class="col-md-4">
                        <div class="productwrap">
                            <div class="pr-img">
                                <a
                                    href="<?php echo "produckt-" . seourl($ürün_get['urun_ad']) . "-" . $ürün_get['urun_id']; ?>">
                                    <img src="nedmin/production/logo/15298355768636_reactgörsel.jpg"
                                        class="img-responsive">
                                </a>
                                <div class="pricetag on-sale">
                                    <div class="inner on-sale">
                                        <span class="onsale">
                                            <span class="oldprice"><?php echo $ürün_get['urun_fiyat'] * 1.5; ?></span>
                                            <?php echo $ürün_get['urun_fiyat']; ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <span class="smalltitle">
                                <a
                                    href="<?php echo "produckt-" . seourl($ürün_get['urun_ad']) . "-" . $ürün_get['urun_id']; ?>">
                                    <?php echo $ürün_get['urun_ad']; ?>
                                </a>
                            </span>
                            <span class="smalldesc">Stok adedi: <?php echo $ürün_get['urun_stok']; ?></span>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <!--Products-->
        </div>

        <div class="col-md-3">
            <!--sidebar-->
            <div class="title-bg">
                <div class="title">Kategoriler</div>
            </div>
            <div class="categorybox">
                <ul>
                    <?php
                    // Kategorileri listeleme
                    while($kategori_get = $kategori->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <li>
                        <a href="<?php echo "kategoriler-" . seourl($kategori_get['kategori_ad']); ?>">
                            <?php echo $kategori_get['kategori_ad']; ?>
                        </a>
                    </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
        <!--sidebar-->
    </div>
    <div class="spacer"></div>
</div>

<?php
include "footerSite.php";
?>