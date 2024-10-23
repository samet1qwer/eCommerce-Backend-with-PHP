<?php 
include "headerSite.php";
include "netting/baglan.php";

$sayfada = 6; // sayfada gösterilecek içerik miktarını belirtiyoruz.
                     $sorgu=$db->prepare("select * from kategori");
                     $sorgu->execute();
                     $toplam_icerik=$sorgu->rowCount();
                     $toplam_sayfa = ceil($toplam_icerik / $sayfada);
                  	// eğer sayfa girilmemişse 1 varsayalım.
                     $sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;
          			// eğer 1'den küçük bir sayfa sayısı girildiyse 1 yapalım.
                     if($sayfa < 1) $sayfa = 1; 
        				// toplam sayfa sayımızdan fazla yazılırsa en son sayfayı varsayalım.
                     if($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa; 
                     $limit = ($sayfa - 1) * $sayfada;



if (!isset($_GET['sef'])) {
  
    
    $ürün = $db->prepare("SELECT * FROM urun LIMIT $limit,$sayfada");
    $ürün->execute();

}else {
    $kategori = $db->prepare("SELECT * FROM kategori WHERE kategori_seourl = :sef  ");
    $kategori->execute(['sef' => $_GET['sef']]);

    $kategoriData = $kategori->fetch(PDO::FETCH_ASSOC);
    
    if ($kategoriData) {
        $kategori_id_get = $kategoriData['kategori_id'];

        $ürün = $db->prepare("SELECT * FROM urun WHERE kategori_id = :kategori_id LIMIT $limit,$sayfada");
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


<!--end main-nav -->


<div class="container">

    <div class="row">
        <div class="col-md-9">
            <!--Main content-->
            <div class="title-bg">
                <div class="title">ürünler</div>

            </div>
            <div class="row prdct">
                <!--Products-->


                <div class="row prdct">
                    <?php
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

            <!--pagination-->

        </div>
        <div class="col-md-3">
            <!--sidebar-->
            <div class="title-bg">
                <div class="title">kategoriler</div>
            </div>

            <div class="categorybox">
                <ul>
                    <?php
          while($kategori_get=$kategori->fetch(PDO::FETCH_ASSOC)){
?>

                    <li>
                        <a
                            href="<?php echo "kategoriler-".seourl($kategori_get['kategori_ad']) ?>"><?php echo $kategori_get['kategori_ad']; ?></a>
                    </li>
                    <?php
          }
          ?>
                </ul>
            </div>

            <div class="ads">
                <a href="product.htm"><img src="images\ads.png" class="img-responsive" alt=""></a>
            </div>

            <div class="title-bg">
                <div class="title">Best Seller</div>
            </div>


        </div>

        <div align="left" class="col-md-12">
            <ul class="pagination">

                <?php

                     			$s=0;

                     			while ($s < $toplam_sayfa) {

                     				$s++; ?>

                <?php 

                     				if ($s==$sayfa) {?>

                <li class="active">

                    <a href="kategoriler?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a>

                </li>

                <?php } else {?>


                <li>

                    <a href="kategoriler?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a>

                </li>

                <?php   }

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