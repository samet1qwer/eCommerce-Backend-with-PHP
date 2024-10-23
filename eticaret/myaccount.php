<?php 
session_start();
include 'headerSite.php';
$kullanici=$db->prepare("SELECT * FROM kullanici WHERE kullanici_mail= :kullanici_mail and kullanici_yetki= :kullanici_yetki");
$kullanici->execute([
  'kullanici_mail'=>$_SESSION['kullanicimail'],
  'kullanici_yetki'=>1
]);
$kullanicicek=$kullanici->fetch(pdo::FETCH_ASSOC);
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-title-wrap">
                <div class="page-title-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="bigtitle">Kullanıcı Kaydı</div>
                            <p>Kullanıcı kayıt işlemlerini aşağıda ki form aracılığı ile gerçekleştirebilirsiniz.</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php

// $durum_mesajlari = [
//     'farklisifre' => 'Girdiğiniz şifreler eşleşmiyor.',
//     'eksiksifre' => 'Şifreniz minimum 6 karakter uzunluğunda olmalıdır.',
//     'mukerrerkayit' => 'Bu kullanıcı daha önce kayıt edilmiş.',
//     'basarisiz' => 'Kayıt Yapılamadı Sistem Yöneticisine Danışınız.'
// ];

// if (isset($_GET['durum']) && array_key_exists($_GET['durum'], $durum_mesajlari)) {
//     echo '<div class="alert alert-danger">
//             <strong>Hata!</strong> ' . $durum_mesajlari[$_GET['durum']] . '
//           </div>';
// }
?>
    <?php
// $durum = filter_input(INPUT_GET, 'durum', FILTER_SANITIZE_STRING);

// if ($durum && array_key_exists($durum, $durum_mesajlari)) {
//     echo '<div class="alert alert-danger">
//             <strong>Hata!</strong> ' . $durum_mesajlari[$durum] . '
//           </div>';
// }

?>
    <form action="netting/işlem.php" method="POST" class="form-horizontal checkout" role="form">
        <div class="row">
            <div class="col-md-6">
                <div class="title-bg">
                    <div class="title">Kullanıcı Bilgileri</div>
                </div>






                <div class="form-group dob">
                    <div class="col-sm-12">

                        <input type="text" class="form-control" required=""
                            value="<?php echo $kullanicicek['kullanici_adsoyad']; ?>" name="kullanici_adsoyad"
                            placeholder="Ad ve Soyadınızı Giriniz...">
                    </div>

                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="email" class="form-control" required=""
                            value="<?php echo $kullanicicek['kullanici_mail']; ?>"
                            placeholder="Dikkat! Mail adresiniz kullanıcı adınız olacaktır." disabled>
                    </div>
                </div>
                <div class="form-group dob">
                    <div class="col-sm-6">
                        <input type="password" class="form-control" name="kullanici_passwordone"
                            placeholder="Yeni Şifrenizi Giriniz...">
                    </div>
                    <!-- <div class="col-sm-6">
                        <input type="password" class="form-control" name="kullanici_passwordtwo"
                            placeholder="Şifrenizi Tekrar Giriniz...">
                    </div> -->
                </div>



                <button type="submit" name="kullanici_bgüncelle" class="btn btn-default btn-red">Kullanıcı bilgilerimi
                    güncelle</button>
            </div>
            <div class="col-md-6">
                <div class="title-bg">
                    <div class="title">Şifrenizi mi Unuttunuz?</div>
                </div>


                <center><img width="400" src="nedmin/production/logo/15298355768636_reactgörsel.jpg"></center>
            </div>
        </div>
</div>
</form>
<div class="spacer"></div>
</div>

<?php include 'footerSite.php'; ?>