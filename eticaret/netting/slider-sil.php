<?php
include "baglan.php";
if ($_GET['action']=="delete") {
    $slider_sil=$db->prepare("DELETE FROM slider WHERE slider_id= :slider_id");
$slider_sil->execute([
    'slider_id'=>$_GET['id']
]);
if ($slider_sil->rowCount()>0) {
header("location:http://localhost/eticaret/nedmin/production/slider-ayar.php?durum=ok");
}
else{
    header("location:http://localhost/eticaret/nedmin/production/slider-ayar.php?durum=ok");
}

exit;

}

?>