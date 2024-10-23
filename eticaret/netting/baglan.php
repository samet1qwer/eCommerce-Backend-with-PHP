<?php

try {
    $db = new PDO("mysql:host=localhost;dbname=e_ticaret;charset=utf8mb4","root","");
    
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>