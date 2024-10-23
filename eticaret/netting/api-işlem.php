<?php
include("../netting/baglan.php");

if (isset($_POST["api_güncelle"])) {

    $güncelle = $db->prepare("UPDATE ayar SET 
            ayar_maps = :ayar_maps, 
            ayar_zopim = :ayar_zopim, 
            ayar_analystic = :ayar_analystic
        WHERE ayar_id = :ayar_id");

    $güncelle->execute([
        'ayar_maps' => $_POST["ayar_maps"],
        'ayar_zopim' => $_POST["ayar_zopim"],
        'ayar_analystic' => $_POST["ayar_analystic"], 
        'ayar_id' => 0 
    ]);

    if ($güncelle->rowCount() > 0) {
        header("Location: http://localhost/eticaret/nedmin/production/api-ayar.php?durum=ok");
    } else {
        header("Location: http://localhost/eticaret/nedmin/production/api-ayar.php?durum=no");
    }
    exit; 
}
?>