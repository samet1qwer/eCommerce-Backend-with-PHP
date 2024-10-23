<?php
include("../header.php");

?>

<div class="right_col" role="main">
    <div>
        <div class="page-title">
            <div class="title_left">
                <h3></h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">

                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>banka ekle <small>
                                <?php
    if (isset($_GET['durum'])) {
        if ($_GET['durum'] == "ok") {
            echo '<b style="color:green;">İşlem başarılı.</b>';
        } elseif ($_GET['durum'] == "no") {
            echo '<b style="color:red;">İşlem başarısız.</b>';
        }
    }
    ?>
                            </small>


                        </h2>
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
                        <form action="../../netting/işlem.php" method="post" id="demo-form2" data-parsley-validate
                            class="form-horizontal form-label-left">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">banka
                                    ad
                                    <span>*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">


                                    <input id="first-name" name="banka_ad" type="text"
                                        class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">banka üst
                                    <span>*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="banka_ust"
                                        class="form-control col-md-7 col-xs-12">
                                </div>
                            </div> -->



                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">banka
                                    iban
                                    <span>*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="banka_iban"
                                        class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">banka
                                    hesap ad soyad
                                    <span>*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="banka_hesapadsoyad"
                                        class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">banka
                                    durum
                                    <span>*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="banka_durum" class="form-control col-md-7 col-xs-12">
                                        <option value="1">aktif</option>
                                        <option value="0">pasif</option>
                                    </select>
                                </div>
                            </div>



                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" name="banka_ekle" class="btn btn-primary">oluştur</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>







        <!-- footer content -->
        <?php
   include("../footer.php");
   
   ?>