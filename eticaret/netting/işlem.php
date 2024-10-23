<?php
session_abort();
session_start();
include "../netting/baglan.php";


if (isset($_POST['kullanicigiris'])) {
  $kullanici_giris_kadi=htmlspecialchars($_POST['kullaniciadi']);
  $kullanici_giris_password=md5(htmlspecialchars($_POST['kullanicipassword']));
  $kullanici=$db->prepare("SELECT * FROM kullanici WHERE kullanici_mail= :kullanici_mail and kullanici_password= :kullanici_password and kullanici_yetki= :kullanici_yetki");
  $kullanici->execute([
    'kullanici_mail'=>$kullanici_giris_kadi,
    'kullanici_password'=>$kullanici_giris_password,
    'kullanici_yetki'=>1
  ]);
  if ($kullanici->rowCount()>0) {
      $_SESSION['kullanicimail']=$kullanici_giris_kadi;
header("location:http://localhost/eticaret/");
      exit;
   
  }else{
header("location:http://localhost/eticaret/");
exit;
  }
  }

  if (isset($_POST['logo_güncelle'])) {

    if ($_FILES['ayar_logo']['size'] > 1048576) {
        header("Location: http://localhost/eticaret/nedmin/production/genel-ayar.php?durum=no&dosyabuyuk");
        exit;
    }
  
    $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
    $file_extension = pathinfo($_FILES['ayar_logo']['name'], PATHINFO_EXTENSION);
  
    if (!in_array($file_extension, $allowed_extensions)) {
        header("Location: http://localhost/eticaret/nedmin/production/genel-ayar.php?durum=no&gecersizdosya");
        exit;
    }
  
    $uploads_dir = "../nedmin/production/logo";
  
    if (!is_dir($uploads_dir)) {
        mkdir($uploads_dir, 0777, true);
    }
  
    
    $tmp_name = $_FILES['ayar_logo']['tmp_name'];
    $name = $_FILES['ayar_logo']['name'];
    $rand = mt_rand(111111111, 99999999999999);  
    $new_name = $rand . "_" . $name;
    $destination = $uploads_dir . "/" . $new_name;
  
    $logo_sorgu = $db->prepare("SELECT ayar_logo FROM ayar WHERE ayar_id = :ayar_id");
    $logo_sorgu->execute(['ayar_id' => 0]);
    $eski_logo = $logo_sorgu->fetch(PDO::FETCH_ASSOC);
  
    if (move_uploaded_file($tmp_name, $destination)) {
        if (!empty($eski_logo['ayar_logo']) && file_exists("../nedmin/production/" . $eski_logo['ayar_logo'])) {
            unlink("../nedmin/production/" . $eski_logo['ayar_logo']);
        }
  
        $logo = $db->prepare("UPDATE ayar SET ayar_logo = :ayar_logo WHERE ayar_id = :ayar_id");
        $logo->execute([
            'ayar_logo' => substr($destination, strlen("../nedmin/production/")), 
            'ayar_id' => 0
        ]);
  
        if ($logo->rowCount() > 0) {
            header("Location: http://localhost/eticaret/nedmin/production/genel-ayar.php?durum=ok");
        } else {
            header("Location: http://localhost/eticaret/nedmin/production/genel-ayar.php?durum=no");
        }
    } else {
        header("Location: http://localhost/eticaret/nedmin/production/genel-ayar.php?durum=no");
    }
  
    exit;
  }
  



if (isset($_GET['action']) && $_GET['action'] == 'delete') {
  $menu_sil = $db->prepare("DELETE FROM menu WHERE menu_id = :id");
  $menu_sil->execute([
      'id' => $_GET['id']
  ]);

  if ($menu_sil) {
      header("Location: /eticaret/netting/menu.php?durum=ok");
      exit;
  } else {
      header("Location: /eticaret/netting/menu.php?durum=no");
      exit;
  }
}




if (isset($_POST["ayar_güncelle"])) {

    $güncelle = $db->prepare("UPDATE ayar set ayar_tittle = :ayar_tittle, 
            ayar_description = :ayar_description, 
            ayar_keyword = :ayar_keyword, 
            ayar_author = :ayar_author
        WHERE ayar_id = :ayar_id");

    $güncelle->execute([
        'ayar_tittle' => $_POST["ayar_tittle"],
        'ayar_description' => $_POST["ayar_description"],
        'ayar_keyword' => $_POST["ayar_keyword"],
        'ayar_author' => $_POST["ayar_author"],
        'ayar_id' => 0 
    ]);

    if ($güncelle->rowCount() > 0) {
        header("Location: http://localhost/eticaret/nedmin/production/genel-ayar.php?durum=ok");
    } else {
        header("Location: http://localhost/eticaret/nedmin/production/genel-ayar.php?durum=no");
    }
    exit; 
}
?>
<?php
session_abort();
session_start();

if (isset($_POST["panel_login"])) {
   $kullanici_mail =  $_POST["panel_mail"];
  $kullanici_password =  md5($_POST["panel_password"]);
  $dogrulama=$db->prepare("SELECT * from kullanici WHERE kullanici_mail= :kullanici_mail and kullanici_password= :kullanici_password and kullanici_yetki= :kullanici_yetki ");
  $dogrulama->execute(   [
    'kullanici_mail'=> $kullanici_mail,
    'kullanici_password'=> $kullanici_password,
    'kullanici_yetki'=>"5" 
  ]);
  $say= $dogrulama->rowCount();
  if ($say>0) {
    header("location:http://localhost/eticaret/nedmin/production/");
    $_SESSION['kullanici_mail']=$kullanici_mail;
    
    exit ;
  }else{
    echo "kullanıcı adı ve şifre hatalı";
  }


}



?>
<?php

if (isset($_POST['kullanici_güncelle'])) {
    $kullanici_düzenleme = $db->prepare("UPDATE kullanici SET   kullanici_zaman = :kullanici_zaman,
            kullanici_adsoyad = :kullanici_adsoyad,
            kullanici_mail = :kullanici_mail,
            kullanici_gsm = :kullanici_gsm 
            WHERE kullanici_id= :kullanici_id");
    
    $kullanici_düzenleme->execute([
        'kullanici_zaman' => $_POST['kullanici_zaman'],
        'kullanici_adsoyad' => $_POST['kullanici_adsoyad'],
        'kullanici_mail' => $_POST['kullanici_mail'],
        'kullanici_gsm' => $_POST['kullanici_gsm'],
        'kullanici_id' => $_POST['kullanici_id']  
    ]);

  if ($kullanici_düzenleme->rowCount() > 0) {
    header("location:http://localhost/eticaret/nedmin/production/kullanici-ayar.php?durum=ok");
    exit;
  }else{
    header("location:http://localhost/eticaret/nedmin/production/kullanici-ayar.php?durum=no");
    exit;
  }
}

?>
<?php


if (isset($_GET['id'])) {



  $kullanici_sil=$db->prepare("DELETE from kullanici WHERE kullanici_id= :kullanici_id ");
  $kullanici_sil->execute([
    'kullanici_id'=>$_GET['id']
  ]);
  if ($kullanici_sil->rowCount()>0) {
    header("location:http://localhost/eticaret/nedmin/production/kullanici-ayar.php?durum=ok");
    exit;
  }else{
    header("location:http://localhost/eticaret/nedmin/production/kullanici-ayar.php?durum=no");
    exit;
  }
}
?>
<?php 
include "../nedmin/production/fonksiyon.php";
if (isset($_POST['menu_güncelle'])) {
  $seo_url=seourl($_POST['menu_ad']);

$menu_guncelle=$db->prepare('UPDATE menu SET menu_ad= :menu_ad , menu_detay= :menu_detay , menu_url= :menu_url , menu_sira= :menu_sira , menu_durum= :menu_durum , menu_seourl= :menu_seourl WHERE menu_id= :menu_id ');
$menu_guncelle->execute([
'menu_ad'=>$_POST['menu_ad'],
'menu_detay'=>$_POST['menu_detay'],
'menu_url'=>$_POST['menu_url'],
'menu_sira'=>$_POST['menu_sira'],
'menu_durum'=>$_POST['menu_durum'],
'menu_seourl'=>$seo_url ,
'menu_id'=>$_POST['menu_id']
]);

if($menu_guncelle->rowCount()>0){ 
  header("location:http://localhost/eticaret/nedmin/production/menu-ayar.php?id=" . $_POST['menu_id'] . "&durum=ok");
  exit;
  

}else{
  header("location:http://localhost/eticaret/nedmin/production/menu-ayar.php?id=" . $_POST['menu_id'] . "&durum=ok");
  exit;
}


}








if (isset($_POST['slider_olustur'])) {

    echo "doğru sayfa";

    // Slider verilerini ekleme
    $slider_ekle = $db->prepare("INSERT INTO slider (slider_ad, slider_link, slider_durum,slider_sira) VALUES (:slider_ad, :slider_link, :slider_durum, slider_sira= :slider_sira)");
    $slider_ekle->execute([
        'slider_ad' => $_POST['slider_ad'],
        'slider_link' => $_POST['slider_link'],
        'slider_durum' => $_POST['slider_durum'],
        'slider_sira'=>$_POST['slider_sira']
    ]);

    $slider_id = $db->lastInsertId();

    $uploads_dir = "../nedmin/production/sliders";

    if (!is_dir($uploads_dir)) {
        mkdir($uploads_dir, 0777, true);
    }

    $tmp_name = $_FILES['slider_resimyol']['tmp_name'];
    $name = $_FILES['slider_resimyol']['name'];
    $rand = mt_rand(111111111, 99999999999999);
    $new_name = $rand . "_" . $name;
    $destination = $uploads_dir . "/" . $new_name;

    if (move_uploaded_file($tmp_name, $destination)) {
        $resimyol = $db->prepare("UPDATE slider SET slider_resimyol = :slider_resimyol WHERE slider_id = :slider_id");
        $resimyol->execute([
            'slider_resimyol' => substr($destination, 21),
            'slider_id' => $slider_id
        ]);

        if ($resimyol->rowCount() > 0 && $slider_ekle->rowCount() > 0) {
            header("Location: http://localhost/eticaret/nedmin/production/slider-ayar.php?durum=ok");
        } else {
            header("Location: http://localhost/eticaret/nedmin/production/slider-ayar.php?durum=no");
        }
    } else {
        header("Location: http://localhost/eticaret/nedmin/production/slider-ayar.php?durum=no");
    }
    exit;
}

if (isset($_POST['slider_güncelle'])) {
  $slider_güncelle = $db->prepare("
      UPDATE slider 
      SET slider_ad = :slider_ad, 
          slider_link = :slider_link, 
          slider_durum = :slider_durum, 
          slider_sira = :slider_sira 
      WHERE slider_id = :slider_id
  ");
  
  $slider_güncelle->execute([
      'slider_ad' => $_POST['slider_ad'],
      'slider_link' => $_POST['slider_link'],
      'slider_durum' => $_POST['slider_durum'],
      'slider_sira' => $_POST['slider_sira'],
      'slider_id' => $_POST['id']
  ]);

  $slider_id = $_POST['id']; 

  $uploads_dir = "../nedmin/production/sliders";

  if (!is_dir($uploads_dir)) {
      mkdir($uploads_dir, 0777, true);
  }

  if (isset($_FILES['slider_resimyol']) && $_FILES['slider_resimyol']['error'] == 0) {
      $tmp_name = $_FILES['slider_resimyol']['tmp_name'];
      $name = $_FILES['slider_resimyol']['name'];

      $rand = mt_rand(111111111, 99999999999999);
      $new_name = $rand . "_" . $name;
      $destination = $uploads_dir . "/" . $new_name;

      if (move_uploaded_file($tmp_name, $destination)) {
          $resimyol = $db->prepare("
              UPDATE slider 
              SET slider_resimyol = :slider_resimyol 
              WHERE slider_id = :slider_id
          ");
          
          $resimyol->execute([
              'slider_resimyol' => substr($destination, 21), 
              'slider_id' => $slider_id
          ]);

          if ($resimyol->rowCount() > 0 && $slider_güncelle->rowCount() > 0) {
              header("Location: http://localhost/eticaret/nedmin/production/slider-ayar.php?durum=ok");
          } else {
              header("Location: http://localhost/eticaret/nedmin/production/slider-ayar.php?durum=no");
          }
      } else {
          header("Location: http://localhost/eticaret/nedmin/production/slider-ayar.php?durum=no");
      }
  } else {
      if ($slider_güncelle->rowCount() > 0) {
          header("Location: http://localhost/eticaret/nedmin/production/slider-ayar.php?durum=ok");
      } else {
          header("Location: http://localhost/eticaret/nedmin/production/slider-ayar.php?durum=no");
      }
  }
  exit;
}



if (isset($_POST['kullanicikaydet'])) {
echo "dogru yer";
$kullanici_kayit_mail=htmlspecialchars($_POST['kullanici_mail']);
$kullanici_kayit_adsoyad=htmlspecialchars($_POST['kullanici_adsoyad']);
$kullanici_kayit_password1=htmlspecialchars($_POST['kullanici_passwordone']);
$kullanici_kayit_password2=htmlspecialchars($_POST['kullanici_passwordtwo']);

if ($kullanici_kayit_password1==$kullanici_kayit_password2) {
if (strlen($kullanici_kayit_password1)<=6) {
  header("location:http://localhost/eticaret/register.php?durum=eksiksifre");
  exit;
}
$kayit_kontrol=$db->prepare("SELECT * FROM kullanici WHERE kullanici_mail= :kullanici_mail ");
$kayit_kontrol->execute([
  'kullanici_mail'=>$kullanici_kayit_mail
]);
if ($kayit_kontrol->rowCount()>0) {
  header("location:http://localhost/eticaret/register.php?durum=mukerrerkayit");
  exit;
}
$kullanici_kayit=$db->prepare("INSERT into kullanici SET kullanici_adsoyad= :kullanici_adsoyad, kullanici_mail= :kullanici_mail, kullanici_password= :kullanici_password");
$kullanici_kayit->execute([
  'kullanici_adsoyad'=>$kullanici_kayit_adsoyad,
  'kullanici_password'=>md5($kullanici_kayit_password1),
  'kullanici_mail'=>$kullanici_kayit_mail
]);
if ($kullanici_kayit->rowCount()>0) {
  header("location:http://localhost/eticaret");
  exit;
}else{
  header("location:http://localhost/eticaret/register.php?durum=basarisiz");
  exit;
}
  
}else{
  header("location:http://localhost/eticaret/register.php?durum=farklisifre");
  exit;
}


}


if (isset($_POST['kullanici_bgüncelle'])) {
 $kullanici_bgüncelle=$db->prepare("UPDATE kullanici SET kullanici_password= :kullanici_password, kullanici_adsoyad= :kullanici_adsoyad  WHERE kullanici_mail= :kullanici_mail ");
 $kullanici_güncelle_adsoyad=htmlspecialchars($_POST['kullanici_adsoyad']);
 $kullanici_güncelle_password=md5(htmlspecialchars($_POST['kullanici_password']));
$kullanici_bgüncelle->execute([
  'kullanici_adsoyad'=>$kullanici_güncelle_adsoyad,
  'kullanici_password'=>$kullanici_güncelle_password,
  'kullanici_mail'=>$_SESSION['kullanicimail']
]);
if ($kullanici_bgüncelle->rowCount()>0) {
  header("location:http://localhost/eticaret/myaccount.php");
}else{
  header("location:http://localhost/eticaret/myaccount.php");
}
exit;

}

if (isset($_POST['kategoriduzenle'])) {
  if (isset($_POST['kategori_seourl'])) {
    $kategori_surl=seourl($_POST['kategori_ad']);
    $kategori_güncelle=$db->prepare("UPDATE kategori SET kategori_ad= :kategori_ad , kategori_sira= :kategori_sira , kategori_seourl= :kategori_seourl , kategori_ust= :kategori_ust , kategori_durum= :kategori_durum WHERE kategori_id= :kategori_id ");
    $kategori_güncelle->execute([
      'kategori_ad'=>$_POST['kategori_ad'],
      'kategori_sira'=>$_POST['kategori_sira'],
      'kategori_seourl'=>$kategori_surl,
      'kategori_ust'=>$_POST['kategori_ust'],
      'kategori_durum'=>$_POST['kategori_durum'],
      'kategori_id'=>$_POST['kategori_id']
    ]);
    if ($kategori_güncelle->rowCount() > 0) {
      header("Location: http://localhost/eticaret/nedmin/production/kategori-ayar.php?durum=ok");
  } else {
      header("Location: http://localhost/eticaret/nedmin/production/kategori-ayar.php?durum=no");
  }
  exit;
  }
  $kategori_güncelle=$db->prepare("UPDATE kategori SET kategori_ad= :kategori_ad , kategori_sira= :kategori_sira , kategori_seourl= :kategori_seourl , kategori_ust= :kategori_ust , kategori_durum= :kategori_durum WHERE kategori_id= :kategori_id ");
  $kategori_güncelle->execute([
    'kategori_ad'=>$_POST['kategori_ad'],
    'kategori_sira'=>$_POST['kategori_sira'],
    'kategori_seourl'=>$_POST['kategori_seourl'],
    'kategori_ust'=>$_POST['kategori_ust'],
    'kategori_durum'=>$_POST['kategori_durum'],
    'kategori_id'=>$_POST['kategori_id']
  ]);

  if ($kategori_güncelle->rowCount() > 0) {
    header("Location: http://localhost/eticaret/nedmin/production/kategori-ayar.php?durum=ok");
} else {
    header("Location: http://localhost/eticaret/nedmin/production/kategori-ayar.php?durum=no");
}
exit;
}

if (isset($_POST['kategori_ekle'])) {
  if (isset($_POST['kategori_seourl'])) {
    $kategori_seourl=seourl($_POST['kategori_ad']);
    $kategori_ekle=$db->prepare("INSERT into kategori set kategori_ad= :kategori_ad , kategori_durum= :kategori_durum , kategori_ust= :kategori_ust , kategori_seourl= :kategori_seourl,kategori_sira= :kategori_sira ");
    $kategori_ekle->execute([
      'kategori_ad'=>$_POST['kategori_ad'],
      'kategori_durum'=>$_POST['kategori_durum'],
      'kategori_seourl'=>$kategori_seourl,
      'kategori_sira'=>$_POST['kategori_sira'],
      'kategori_ust'=>$_POST['kategori_ust']
    ]);
    if ($kategori_ekle->rowCount()>0)   {
      header("Location: http://localhost/eticaret/nedmin/production/kategori-ayar.php?durum=ok");
   } else {
       header("Location: http://localhost/eticaret/nedmin/production/kategori-ayar.php?durum=no");
   }
   exit;
  }
  $kategori_ekle=$db->prepare("INSERT into kategori set kategori_ad= :kategori_ad , kategori_durum= :kategori_durum , kategori_ust= :kategori_ust , kategori_seourl= :kategori_seourl,kategori_sira= :kategori_sira ");
$kategori_ekle->execute([
  'kategori_ad'=>$_POST['kategori_ad'],
  'kategori_durum'=>$_POST['kategori_durum'],
  'kategori_seourl'=>$_POST['kategori_seourl'],
  'kategori_sira'=>$_POST['kategori_sira'],
  'kategori_ust'=>$_POST['kategori_ust']
]);
if ($kategori_ekle->rowCount()>0)   {
   header("Location: http://localhost/eticaret/nedmin/production/kategori-ayar.php?durum=ok");
} else {
    header("Location: http://localhost/eticaret/nedmin/production/kategori-ayar.php?durum=no");
}
exit;


}

if (isset($_POST['urunduzenle'])) {
    
  if (isset($_POST['urun_seourl']) && empty($_POST['urun_seourl'])) {
      $urun_surl = seourl($_POST['urun_ad']);
  } else {
      $urun_surl = $_POST['urun_seourl'];
  }

  $urun_güncelle = $db->prepare("UPDATE urun 
      SET urun_ad = :urun_ad, 
          urun_seourl = :urun_seourl, 
          kategori_id = :kategori_id, 
          urun_fiyat = :urun_fiyat, 
          urun_stok = :urun_stok, 
          urun_keyword = :urun_keyword, 
          urun_video = :urun_video, 
          urun_durum = :urun_durum 
      WHERE urun_id = :urun_id");

  $urun_güncelle->execute([
      'urun_ad' => $_POST['urun_ad'],
      'urun_seourl' => $urun_surl,
      'kategori_id' => $_POST['kategori_id'],
      'urun_fiyat' => $_POST['urun_fiyat'],
      'urun_stok' => $_POST['urun_stok'],
      'urun_video' => $_POST['urun_video'],
      'urun_durum' => $_POST['urun_durum'],
      'urun_keyword' => $_POST['urun_keyword'],
      'urun_id' => $_POST['urun_id']
  ]);

  if ($urun_güncelle->rowCount() > 0) {
      header("Location: http://localhost/eticaret/nedmin/production/urun-ayar.php?durum=ok");
  } else {
      header("Location: http://localhost/eticaret/nedmin/production/urun-ayar.php?durum=no");
  }
  exit;
}

if (isset($_POST['urunekle'])) {
    
  if (isset($_POST['urun_seourl']) && empty($_POST['urun_seourl'])) {
      $urun_surl = seourl($_POST['urun_ad']);
  } else {
      $urun_surl = $_POST['urun_seourl'];
  }

  $urun_güncelle = $db->prepare("INSERT into urun 
      SET urun_ad = :urun_ad, 
          urun_seourl = :urun_seourl, 
          kategori_id = :kategori_id, 
          urun_fiyat = :urun_fiyat, 
          urun_stok = :urun_stok, 
          urun_keyword = :urun_keyword, 
          urun_video = :urun_video, 
          urun_durum = :urun_durum 
     ");

  $urun_güncelle->execute([
      'urun_ad' => $_POST['urun_ad'],
      'urun_seourl' => $urun_surl,
      'kategori_id' => $_POST['kategori_id'],
      'urun_fiyat' => $_POST['urun_fiyat'],
      'urun_stok' => $_POST['urun_stok'],
      'urun_video' => $_POST['urun_video'],
      'urun_durum' => $_POST['urun_durum'],
      'urun_keyword' => $_POST['urun_keyword']
   
  ]);

  if ($urun_güncelle->rowCount() > 0) {
      header("Location: http://localhost/eticaret/nedmin/production/urun-ayar.php?durum=ok");
  } else {
      header("Location: http://localhost/eticaret/nedmin/production/urun-ayar.php?durum=no");
  }
  exit;
}

if (isset($_POST['banka_ekle'])) {
  $banka=$db->prepare("INSERT INTO banka SET banka_ad = :banka_ad,banka_hesapadsoyad = :banka_hesapadsoyad , banka_durum = :banka_durum , banka_iban = :banka_iban ");
  $banka->execute([
'banka_ad'=>$_POST['banka_ad'],
'banka_hesapadsoyad'=>$_POST['banka_hesapadsoyad'],
'banka_durum'=>$_POST['banka_durum'],
'banka_iban'=>$_POST['banka_iban']
  ]);
if ($banka->rowCount()>0) {
  header("Location: http://localhost/eticaret/nedmin/production/banka-ayar.php?durum=ok");
}else {
  header("Location: http://localhost/eticaret/nedmin/production/banka-ayar.php?durum=no");
}
}
if (isset($_POST['bankaduzenle'])) {
  $banka_güncelle=$db->prepare("UPDATE banka SET banka_ad= :banka_ad , banka_iban= :banka_iban , banka_hesapadsoyad= :banka_hesapadsoyad , banka_durum= :banka_durum WHERE banka_id = :banka_id");
$banka_güncelle->execute([
  'banka_ad'=>$_POST['banka_ad'],
  'banka_iban'=>$_POST['banka_iban'],
  'banka_hesapadsoyad'=>$_POST['banka_hesapadsoyad'],
  'banka_durum'=>$_POST['banka_durum'],
  'banka_id'=>$_POST['banka_id']
]);
if ($banka_güncelle->rowCount()>0) {
  header("Location: http://localhost/eticaret/nedmin/production/banka-ayar.php?durum=ok");
}else {
  header("Location: http://localhost/eticaret/nedmin/production/banka-ayar.php?durum=no");
}
}


?>