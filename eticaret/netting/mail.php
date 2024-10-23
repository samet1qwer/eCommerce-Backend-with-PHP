<?php
include("../netting/baglan.php");

if (isset($_POST["mail_güncelle"])) {

    $güncelle = $db->prepare("UPDATE ayar SET 
            ayar_smtphost = :ayar_smtphost, 
            ayar_smtppassword = :ayar_smtppassword, 
            ayar_smtpport = :ayar_smtpport, 
            ayar_bakım = :ayar_bakım
        WHERE ayar_id = :ayar_id");

    $güncelle->execute( [
        'ayar_smtphost' => $_POST["ayar_smtphost"],
        'ayar_smtppassword' => $_POST["ayar_smtppassword"],
        'ayar_smtpport' => $_POST["ayar_smtpport"],
        'ayar_bakım' => $_POST["ayar_bakım"],
        'ayar_id' => 0 
    ]);

    if ($güncelle->rowCount() > 0) {
        header("Location: http://localhost/eticaret/nedmin/production/mail-ayar.php?durum=ok");
    } else {
        header("Location: http://localhost/eticaret/nedmin/production/mail-ayar.php?durum=no");
    }
    exit; 
}
?>