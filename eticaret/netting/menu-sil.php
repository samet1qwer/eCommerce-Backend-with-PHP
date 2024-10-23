<?php
include "baglan.php";
if ($_GET['action']=='delete') {
    $menu_sil=$db->prepare("DELETE FROM menu WHERE menu_id= :id ") ;
    $menu_sil->execute([
      'id'=> $_GET['id']
    ]);
   
    if ($menu_sil) {
      header("location:http://localhost/eticaret/nedmin/production/menu.php?durum=ok");
      exit;
    }else {
      header("location:http://localhost/eticaret/nedmin/production/menu.php?durum=no");
    exit;
    }
  }
?>