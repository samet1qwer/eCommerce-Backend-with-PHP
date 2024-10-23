<?php 

include '../header.php'; 
include 'fonksiyon.php';

$urunsor=$db->prepare("SELECT * FROM urun where urun_id=:id");
$urunsor->execute(array(
  'id' => $_GET['id']
  ));

$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);
$kategori=$db->prepare("SELECT * FROM kategori");
$kategori->execute();

?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>urun Düzenleme <small>,

                                <?php 

              if (isset($_GET['durum'])) {?>
                                <?php if ($_GET['durum']=='ok') {
    # code...
?>
                                <b style="color:green;">İşlem Başarılı...</b>

                                <?php } elseif ($_GET['durum']=="no") {?>

                                <b style="color:red;">İşlem Başarısız...</b>
                                <?php } ?>
                                <?php }

              ?>


                            </small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-expanded="false"><i class="fa fa-wrench"></i></a>

                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />

                        <!-- / => en kök dizine çık ... ../ bir üst dizine çık -->
                        <form action="../../netting/işlem.php" method="POST" class="form-horizontal form-label-left">
                            <!-- Ürün Adı -->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="urun_ad">Ürün Adı <span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="urun_ad" name="urun_ad"
                                        value="<?php echo $uruncek['urun_ad'] ?>" required
                                        class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="urun_keyword">Ürün keyword
                                    <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="urun_keyword" name="urun_keyword"
                                        value="<?php echo $uruncek['urun_keyword'] ?>" required
                                        class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="urun_ad">Ürün video
                                    <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="urun_video" name="urun_video"
                                        value="<?php echo $uruncek['urun_video'] ?>" required
                                        class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <!-- Ürün Fiyatı -->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="urun_fiyat">Ürün Fiyatı
                                    <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" id="urun_fiyat" name="urun_fiyat"
                                        value="<?php echo $uruncek['urun_fiyat']; ?>" required
                                        class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <!-- Ürün SEO URL -->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="urun_seourl">Ürün SEO URL
                                    <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="urun_seourl" name="urun_seourl"
                                        value="<?php echo $uruncek['urun_seourl'] ?>"
                                        class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <!-- Kategori ID -->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kategori_id">Kategori ID
                                    <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="kategori_id" class="form-control col-md-7 col-xs-12">
                                        <?php
            while ($kategori_getir = $kategori->fetch(PDO::FETCH_ASSOC)) {
            ?>
                                        <option value="<?php echo $kategori_getir['kategori_id']; ?>"
                                            <?php if ($kategori_getir['kategori_id'] == $uruncek['kategori_id']) { echo "selected"; } ?>>
                                            <?php echo $kategori_getir['kategori_ad']; ?>
                                        </option>
                                        <?php
            }
            ?>
                                    </select>
                                </div>
                            </div>


                            <!-- Ürün Stok -->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="urun_stok">Ürün Stok <span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="urun_stok" name="urun_stok"
                                        value="<?php echo $uruncek['urun_stok'] ?>" required
                                        class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <!-- Ürün Durum -->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="urun_durum">Ürün
                                    Durum<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="urun_durum" class="form-control" name="urun_durum" required>
                                        <option value="1"
                                            <?php echo $uruncek['urun_durum'] == '1' ? 'selected=""' : ''; ?>>Aktif
                                        </option>
                                        <option value="0"
                                            <?php echo $uruncek['urun_durum'] == '0' ? 'selected=""' : ''; ?>>Pasif
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <input type="hidden" name="urun_id" value="<?php echo $uruncek['urun_id'] ?>">

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" name="urunduzenle" class="btn btn-success">Güncelle</button>
                                </div>
                            </div>
                        </form>




                    </div>
                </div>
            </div>
        </div>



        <hr>
        <hr>
        <hr>



    </div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>