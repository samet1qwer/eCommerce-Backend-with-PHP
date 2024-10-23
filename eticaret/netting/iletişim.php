<?php
include("../netting/baglan.php");

if (isset($_POST["iletişim_güncelle"])) {

    $güncelle = $db->prepare("UPDATE ayar SET 
            ayar_gsm = :ayar_gsm, 
            ayar_tel = :ayar_tel, 
            ayar_faks = :ayar_faks, 
            ayar_mail = :ayar_mail,
            ayar_il = :ayar_il,
            ayar_ilce = :ayar_ilce, 
            ayar_adres = :ayar_adres,
            ayar_mesai = :ayar_mesai
        WHERE ayar_id = :ayar_id");

    $güncelle->execute([
        'ayar_gsm' => $_POST["ayar_gsm"],
        'ayar_tel' => $_POST["ayar_tel"],
        'ayar_faks' => $_POST["ayar_faks"],
        'ayar_mail' => $_POST["ayar_mail"],
        'ayar_il' => $_POST["ayar_il"],
        'ayar_ilce' => $_POST["ayar_ilce"],  
        'ayar_adres' => $_POST["ayar_adres"],
        'ayar_mesai' => $_POST["ayar_mesai"],
        'ayar_id' => 0 
    ]);

    if ($güncelle->rowCount() > 0) {
        header("Location: http://localhost/eticaret/nedmin/production/iletişim-ayar.php?durum=ok");
    } else {
        header("Location: http://localhost/eticaret/nedmin/production/iletişim-ayar.php?durum=no");
    }
    exit; 
}
?>