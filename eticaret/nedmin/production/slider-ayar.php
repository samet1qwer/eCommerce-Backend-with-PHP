<?php
include("../header.php");
// include "../../netting/baglan.php";
$slider_get=$db->prepare(" SELECT * from slider ORDER by slider_sira asc ");
$slider_get->execute();
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
                        <div align="right">
                            <a href="slider-ekle.php" class="btn btn-success">
                                ekle
                            </a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <table id="datatable-keytable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Resim</th>
                                <th>Ad</th>
                                <th>link</th>
                                <th>sıra</th>
                                <th>Slider Durumu</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php while ($slider_islem = $slider_get->fetch(PDO::FETCH_ASSOC)) { ?>
                            <tr>
                                <td>
                                    <div style="display: flex; justify-content: center;">
                                        <img src="<?php echo $slider_islem["slider_resimyol"]; ?>" alt="slider"
                                            height="70px">

                                    </div>
                                </td>
                                <td><?php echo $slider_islem["slider_ad"]; ?></td>
                                <td><?php echo $slider_islem["slider_resimyol"]; ?></td>
                                <td><?php echo $slider_islem["slider_sira"]; ?></td>
                                <td>
                                    <center>
                                        <a
                                            class="btn btn-success"><?php echo $slider_islem["slider_durum"] ? 'Aktif' : 'Pasif'; ?></a>
                                    </center>
                                </td>

                                <td>
                                    <center>
                                        <a class="btn btn-danger"
                                            href="/eticaret/netting/slider-sil?id=<?php echo $slider_islem['slider_id']; ?>&action=delete">
                                            Sil
                                        </a>
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        <a href="slider-düzenle.php?id=<?php echo $slider_islem['slider_id']; ?>"
                                            class="btn btn-primary">Düzenle</a>
                                    </center>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>







    <!-- footer content -->
    <?php
   include("../footer.php");
   
   ?>