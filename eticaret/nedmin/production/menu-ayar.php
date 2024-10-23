<?php
include "../header.php";


$menus=$db->prepare('SELECT * FROM menu WHERE menu_id= :menu_id ');
$menus->execute([
    'menu_id'=> $_GET['id']
]);
$menu_getir=$menus->fetch(pdo::FETCH_ASSOC);


?>

<div class="right_col" role="main">
    <div class="">
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
                        <h2>genel ayarlar <small>
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

                        <div class="x_content">
                            <br />
                            <form action="/eticaret/netting/işlem.php" method="post" id="demo-form2"
                                data-parsley-validate class="form-horizontal form-label-left">

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">menu ad
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input value="<?php echo $menu_getir['menu_ad'] ; ?>" type="text"
                                            id="first-name" name="menu_ad" required="required"
                                            class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <input type="number" hidden name="menu_id" value="<?php echo $menu_getir['menu_id'] ?>">

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">menu detay
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">


                                        <input value="<?php echo $menu_getir['menu_detay']; ?>" required="required"
                                            id="first-name" name="menu_detay" type="text"
                                            class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">menu url
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input value="<?php echo $menu_getir['menu_url'];  ?>" type="text"
                                            id="first-name" name="menu_url" required="required"
                                            class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">menu sıra
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input value="<?php echo $menu_getir['menu_sira']; ?>" type="text"
                                            id="first-name" name="menu_sira" required="required"
                                            class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">menu durum
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <!-- <input value="<?php ; ?>" type="text" id="first-name" name="menu_durum"
                                        required="required" class="form-control col-md-7 col-xs-12"> -->
                                        <section>
                                            <select name="menu_durum" class="form-control col-md-7 col-xs-12"
                                                id="first-name">
                                                <option value="1"
                                                    <?php echo $menu_getir['menu_durum'] ? 'selected' : ''; ?>>Aktif
                                                </option>
                                                <option value="0"
                                                    <?php echo !$menu_getir['menu_durum'] ? 'selected' : ''; ?>>Pasif
                                                </option>
                                            </select>
                                        </section>

                                    </div>
                                </div>



                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button type="submit" name="menu_güncelle"
                                            class="btn btn-primary">güncelle</button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>







            <!-- footer content -->
            <?php
  include "../footer.php";
   
   ?>