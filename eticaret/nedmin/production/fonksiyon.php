<?php

function seourl($string) {
    // Türkçe karakterleri İngilizce karakterlere çevir
    $find = ['Ç', 'Ş', 'İ', 'Ğ', 'Ü', 'Ö', 'ç', 'ş', 'ı', 'ğ', 'ü', 'ö'];
    $replace = ['C', 'S', 'I', 'G', 'U', 'O', 'c', 's', 'i', 'g', 'u', 'o'];
    $string = str_replace($find, $replace, $string);

    // Metni küçük harflere dönüştür
    $string = strtolower($string);

    // Harfler ve rakamlar dışındaki karakterleri tire ile değiştir
    $string = preg_replace('/[^a-z0-9\s]/', '', $string);
    $string = preg_replace('/\s+/', '-', $string);
    
    // Birden fazla ardışık tireyi tek bir tireye düşür
    $string = preg_replace('/-+/', '-', $string);

    // Başa ve sona eklenen gereksiz tireleri kaldır
    $string = trim($string, '-');

    return $string;
}

// Örnek kullanım
// Çıktı: bu-bir-ornek-metindir-ozel-karakterler-ve-turkce-harfler

?>