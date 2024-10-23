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
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <table id="datatable-keytable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>kayıt tarihi</th>
                                    <th>ad soyad</th>
                                    <th>mail adresi</th>
                                    <th>telefon</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>


                            <tbody>
                                <?php while ($getir = $kullanici_düzenle->fetch(PDO::FETCH_ASSOC)) : ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($getir["kullanici_zaman"]); ?></td>
                                    <td><?php echo htmlspecialchars($getir["kullanici_adsoyad"]); ?></td>
                                    <td><?php echo htmlspecialchars($getir["kullanici_adres"]); ?></td>
                                    <td><?php echo htmlspecialchars($getir["kullanici_gsm"]); ?></td>

                                    <td>
                                        <center>
                                            <a class="btn btn-danger"
                                                href="/eticaret/netting/işlem.php?id=<?php echo $getir['kullanici_id']; ?>">

                                                sil</a>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <a href="kullanici-düzenle.php?id=<?php echo $getir['kullanici_id'] ?>"
                                                class="btn btn-primary">Düzenle</a>
                                        </center>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
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