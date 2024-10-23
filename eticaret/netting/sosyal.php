<?php
include("../netting/baglan.php");

if (isset($_POST["sosyal_güncelle"])) {

    $güncelle = $db->prepare("UPDATE ayar set ayar_facebook = :ayar_facebook, 
            ayar_google = :ayar_google, 
            ayar_facebook = :ayar_facebook, 
            ayar_twitter = :ayar_twitter
        WHERE ayar_id = :ayar_id");

    $güncelle->execute([
        'ayar_facebook' => $_POST["ayar_facebook"],
        'ayar_google' => $_POST["ayar_google"],
        'ayar_youtube' => $_POST["ayar_youtube"],
        'ayar_twitter' => $_POST["ayar_twitter"],
        'ayar_id' => 0 
    ]);

    if ($güncelle->rowCount() > 0) {
        header("Location: http://localhost/eticaret/nedmin/production/sosyal-ayar.php?durum=ok");
    } else {
        header("Location: http://localhost/eticaret/nedmin/production/sosyal-ayar.php?durum=no");
    }
    exit; 
}
?>