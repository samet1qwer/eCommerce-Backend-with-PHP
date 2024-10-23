<?php 

include '../header.php'; 
include 'fonksiyon.php';

$bankasor=$db->prepare("SELECT * FROM banka where banka_id=:id");
$bankasor->execute(array(
  'id' => $_GET['id']
  ));

$bankacek=$bankasor->fetch(PDO::FETCH_ASSOC);

?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>banka Düzenleme <small>,

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
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">banka Ad
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="banka_ad"
                                        value="<?php echo $bankacek['banka_ad'] ?>" required="required"
                                        class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">banka iban
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="" id="first-name" name="banka_iban"
                                        value="<?php echo $bankacek['banka_iban']; ?>" required="required"
                                        class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <input type="number" name="banka_id" value="<?php echo $_GET['id']; ?>" hidden>



                            <!-- Ck Editör Başlangıç -->

                            <!-- <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">banka Detay
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <textarea class="ckeditor" id="editor1"
                                        name="banka_detay"><?php ; ?></textarea>
                                </div>
                            </div> -->

                            <!-- <script type="text/javascript">
                            CKEDITOR.replace('editor1',

                                {

                                    filebrowserBrowseUrl: 'ckfinder/ckfinder.html',

                                    filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?type=Images',

                                    filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?type=Flash',

                                    filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

                                    filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

                                    filebrowserFlashUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

                                    forcePasteAsPlainText: true

                                }

                            );
                            </script> -->

                            <!-- Ck Editör Bitiş -->


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">banka
                                    hesap ad soyad
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="banka_hesapadsoyad"
                                        value="<?php echo $bankacek['banka_hesapadsoyad'] ?>"
                                        class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <!-- <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">banka Sıra
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="banka_sira"
                                        value="<?php echo $bankacek['banka_sira'] ?>" required="required"
                                        class="form-control col-md-7 col-xs-12">
                                </div>
                            </div> -->





                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">banka
                                    Durum<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="heard" class="form-control" name="banka_durum" required>
                                        <option value="1"
                                            <?php echo $bankacek['banka_durum'] == '1' ? 'selected=""' : ''; ?>>
                                            Aktif
                                        </option>



                                        <option value="0"
                                            <?php if ($bankacek['banka_durum']==0) { echo 'selected=""'; } ?>>
                                            Pasif
                                        </option>
                                        <?php 

                   if ($bankacek['banka_durum']==0) {?>


                                        <!-- <option value="0">Pasif</option>
                                        <option value="1">Aktif</option> -->


                                        <?php } else {?>
                                        <!-- 
                                        <option value="1">Aktif</option>
                                        <option value="0">Pasif</option> -->

                                        <?php  }

                   ?>


                                    </select>
                                </div>
                            </div>


                            <input type="hidden" name="banka_id" value="<?php echo $bankacek['banka_id'] ?>">


                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" name="bankaduzenle" class="btn btn-success">Güncelle</button>
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