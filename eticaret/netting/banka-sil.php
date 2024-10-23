<?php
include "baglan.php";
if ($_GET['action']=="delete") {
    $banka_sil=$db->prepare("DELETE FROM banka WHERE banka_id= :banka_id");
$banka_sil->execute([
    'banka_id'=>$_GET['id']
]);
if ($banka_sil->rowCount()>0) {
header("location:http://localhost/eticaret/nedmin/production/banka-ayar.php?durum=ok");
}
else{
    header("location:http://localhost/eticaret/nedmin/production/banka-ayar.php?durum=ok");
}

exit;

}

?>