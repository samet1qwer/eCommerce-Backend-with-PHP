<?php
include "baglan.php";
if (isset($_POST['menu_ekle'])) {
    $menu_ekle=$db->prepare("INSERT INTO menu SET
    menu_ust= :menu_ust,
    menu_ad= :menu_ad,
    menu_detay= :menu_detay,
    menu_url= :menu_url,
    menu_sira= :menu_sira,
    menu_durum= :menu_durum
    ");
$menu_ekle->execute([
'menu_ust'=>$_POST['menu_ust'],
'menu_ad'=>$_POST['menu_detay'],
'menu_detay'=>$_POST['menu_detay'],
'menu_url'=>$_POST['menu_url'],
'menu_sira'=>$_POST['menu_sira'],
'menu_durum'=>$_POST['menu_durum']
]);
if ($menu_ekle) {
    header("location:http://localhost/eticaret/nedmin/production/menu.php?durum=ok");
    exit;
  }else {
    header("location:http://localhost/eticaret/nedmin/production/menu.php?durum=no");
    exit;
  }

}

?>