<?php include 'headerSite.php'; ?>

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

$durum_mesajlari = [
    'farklisifre' => 'Girdiğiniz şifreler eşleşmiyor.',
    'eksiksifre' => 'Şifreniz minimum 6 karakter uzunluğunda olmalıdır.',
    'mukerrerkayit' => 'Bu kullanıcı daha önce kayıt edilmiş.',
    'basarisiz' => 'Kayıt Yapılamadı Sistem Yöneticisine Danışınız.'
];

// if (isset($_GET['durum']) && array_key_exists($_GET['durum'], $durum_mesajlari)) {
//     echo '<div class="alert alert-danger">
//             <strong>Hata!</strong> ' . $durum_mesajlari[$_GET['durum']] . '
//           </div>';
// }
?>
    <?php
$durum = filter_input(INPUT_GET, 'durum', FILTER_SANITIZE_STRING);

if ($durum && array_key_exists($durum, $durum_mesajlari)) {
    echo '<div class="alert alert-danger">
            <strong>Hata!</strong> ' . $durum_mesajlari[$durum] . '
          </div>';
}

?>
    <form action="netting/işlem.php" method="POST" class="form-horizontal checkout" role="form">
        <div class="row">
            <div class="col-md-6">
                <div class="title-bg">
                    <div class="title">Kayıt Bilgileri</div>
                </div>






                <div class="form-group dob">
                    <div class="col-sm-12">

                        <input type="text" class="form-control" required="" name="kullanici_adsoyad"
                            placeholder="Ad ve Soyadınızı Giriniz...">
                    </div>

                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="email" class="form-control" required="" name="kullanici_mail"
                            placeholder="Dikkat! Mail adresiniz kullanıcı adınız olacaktır.">
                    </div>
                </div>
                <div class="form-group dob">
                    <div class="col-sm-6">
                        <input type="password" class="form-control" name="kullanici_passwordone"
                            placeholder="Şifrenizi Giriniz...">
                    </div>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" name="kullanici_passwordtwo"
                            placeholder="Şifrenizi Tekrar Giriniz...">
                    </div>
                </div>



                <button type="submit" name="kullanicikaydet" class="btn btn-default btn-red">Kayıt İşlemini Yap</button>
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