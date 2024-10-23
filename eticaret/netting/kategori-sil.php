<?php
include "baglan.php";
if ($_GET['action']=="delete") {
    $kategori_sil=$db->prepare("DELETE FROM kategori WHERE kategori_id= :kategori_id");
$kategori_sil->execute([
    'kategori_id'=>$_GET['id']
]);
if ($kategori_sil->rowCount()>0) {
header("location:http://localhost/eticaret/nedmin/production/kategori-ayar.php?durum=ok");
}
else{
    header("location:http://localhost/eticaret/nedmin/production/kategori-ayar.php?durum=ok");
}

exit;

}

?>