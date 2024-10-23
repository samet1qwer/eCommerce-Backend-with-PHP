<?php 

include '../header.php'; 
$slider_get=$db->prepare(" SELECT * from slider WHERE slider_id= :slider_id ");
$slider_get->execute([
    'slider_id'=>$_GET['id']
]);
$slider_getir=$slider_get->fetch(pdo::FETCH_ASSOC);
?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Slider Ekleme <small>,

                            </small></h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />

                        <form action="../../netting/işlem.php" method="POST" enctype="multipart/form-data"
                            id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim
                                    Seç<span>*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="file" id="first-name" name="slider_resimyol"
                                        class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Ad
                                    <span>*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input value="<?php echo $slider_getir['slider_ad']; ?>" type="text" id="first-name"
                                        name="slider_ad" placeholder="Slider adını giriniz"
                                        class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>





                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Url
                                    <span>*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input value="<?php echo $slider_getir['slider_link']; ?>" type="text"
                                        id="first-name" name="slider_link" placeholder="Slider Link giriniz"
                                        class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Sıra
                                    <span>*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input value="<?php echo $slider_getir['slider_sira']; ?>" type="text"
                                        id="first-name" name="slider_sira" placeholder="Slider sıra giriniz"
                                        class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>





                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider
                                    Durum<span>*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="heard" class="form-control" name="slider_durum">
                                        <option value="1"
                                            <?php echo $slider_getir['slider_durum'] == 1 ? 'selected' : ''; ?>>Aktif
                                        </option>
                                        <option value="0"
                                            <?php echo $slider_getir['slider_durum'] == 0 ? 'selected' : ''; ?>>Pasif
                                        </option>
                                    </select>

                                </div>
                            </div>
                            <input type="number" value="<?php echo $_GET['id']; ?>" hidden name="id">

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" name="slider_güncelle" class="btn btn-success">Kaydet</button>
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