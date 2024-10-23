<?php
include "baglan.php";
if ($_GET['action']=="delete") {
    $urun_sil=$db->prepare("DELETE FROM urun WHERE urun_id= :urun_id");
$urun_sil->execute([
    'urun_id'=>$_GET['id']
]);
if ($urun_sil->rowCount()>0) {
header("location:http://localhost/eticaret/nedmin/production/urun-ayar.php?durum=ok");
}
else{
    header("location:http://localhost/eticaret/nedmin/production/urun-ayar.php?durum=ok");
}

exit;

}

?>


?>