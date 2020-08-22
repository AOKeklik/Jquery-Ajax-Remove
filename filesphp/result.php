<?php
// VERITABANI BAGLANTISI
    try{
        $baglanti = new PDO("mysql:host=localhost; dbname=ogrenci; charset=UTF8;", 'root', '');
        $baglanti -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $err){
        die($err -> getMessage());
    }
    
// AJAX I POST ILE AL
    $json = [];

    $paketac = json_decode($_POST['verilerpaket']);

    $sil = $baglanti -> prepare("DELETE FROM bilgiler WHERE id=?");
    $sil -> execute([$paketac -> id]);

    if($sil):
        $json['cevap'] = true;
    else:
        $json['cevap'] = false;
    endif;

    echo json_encode($json);
?>