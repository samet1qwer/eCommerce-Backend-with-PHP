<?php

include("../header.php");

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
                            <a href="kategori-ekle.php" class="btn btn-success">
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
                                <th>kategori Adı</th>
                                <th>kategori Sırası</th>
                                <th>kategori Durumu</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php while ($kategori_islem = $kategori_get->fetch(PDO::FETCH_ASSOC)) { ?>
                            <tr>
                                <td><?php echo htmlspecialchars($kategori_islem["kategori_ad"]); ?></td>
                                <td><?php echo htmlspecialchars($kategori_islem["kategori_sira"]); ?></td>
                                <td>
                                    <center>
                                        <button
                                            class="btn btn-success"><?php echo $kategori_islem["kategori_durum"] ? 'Aktif' : 'Pasif'; ?></button>
                                    </center>
                                </td>

                                <td>
                                    <center>
                                        <a class="btn btn-danger"
                                            href="/eticaret/netting/kategori-sil?id=<?php echo $kategori_islem['kategori_id']; ?>&action=delete">
                                            Sil
                                        </a>
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        <a href="kategori-düzenle.php?id=<?php echo $kategori_islem['kategori_id']; ?>"
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