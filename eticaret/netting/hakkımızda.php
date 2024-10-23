<?php
include("baglan.php");

if (isset($_POST["hakkimizda_güncelle"])) {

    $güncelle_hakkimizda = $db->prepare('UPDATE hakkimizda SET 
    hakkimizda_baslik = :hakkimizda_baslik, 
    hakkimizda_icerik = :hakkimizda_icerik, 
    hakkimizda_video = :hakkimizda_video,
    hakkimizda_vizyon = :hakkimizda_vizyon,
    hakkimizda_misyon = :hakkimizda_misyon
    WHERE hakkimizda_id = :hakkimizda_id ');

    $güncelle_hakkimizda->execute([
        ':hakkimizda_baslik' => $_POST["hakkimizda_baslik"],
        ':hakkimizda_icerik' => $_POST["hakkimizda_icerik"],
        ':hakkimizda_video' => $_POST["hakkimizda_video"], 
        ':hakkimizda_vizyon' => $_POST["hakkimizda_vizyon"], 
        ':hakkimizda_misyon' => $_POST["hakkimizda_misyon"],
        ':hakkimizda_id' => 0
    ]);

    if ($güncelle_hakkimizda->rowCount() > 0) {
        header("Location: http://localhost/eticaret/nedmin/production/hakkımızda-ayar.php?durum=ok");
    } else {
        header("Location: http://localhost/eticaret/nedmin/production/hakkımızda-ayar.php?durum=no");
    }
    exit; 
}
?>