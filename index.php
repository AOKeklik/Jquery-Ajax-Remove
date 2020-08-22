<?php 
try{
    $baglanti = new PDO("mysql:host=localhost; dbname=ogrenci; charset=UTF8;", 'root', '');
    $baglanti -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $err){
    die($err -> getMessage());
}
?>
<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="files/bootstrap.css">
<title>Jquery dinamik silme</title>
<style>
    .arkaplan{background-color: #E0DDDD; border-radius: 5px; border:1px solid #C4C0C0;}
    #veriler{background-color: #F9F8F8; border:1px solid #C4C0C0;}
    input[type=checkbox]{width: 20px; height: 20px;}	
</style>
</head>
<body>
<div class="container" >
    <div class="row text-center ">
        <div class="col-lg-5 mx-auto arkaplan mt-3">
            <div class="row mt-2  text-center text-dark bg-warning m-2">
                <div class="col-lg-12 pt-2"><h4>KAYITLAR</h4></div>
            </div>           
            <div class="row mt-2  text-center text-dark m-2"> 
                <div class="col-lg-4"><input type="button" id="sec" class="btn btn-success btn-sm btn-block" value="Tümünü Seç"></div>
                <div class="col-lg-4"><input type="button" id="kaldir" class="btn btn-success btn-sm btn-block" value="Seçileni Kaldır"></div>
                <div class="col-lg-4"><input type="button" id="sil" class="btn btn-dark btn-sm btn-block" value="sil"></div>
            </div><?php
                $bilgiler = $baglanti -> prepare("SELECT * FROM bilgiler");
                $bilgiler -> execute();

                while($bilgi = $bilgiler -> fetch(PDO::FETCH_ASSOC)):
            ?><div class="row  text-center text-dark m-2 p-2" id="veriler">
                <div class="col-lg-8 pt-2"><?=$bilgi['ad']?></div>
                <div class="col-lg-4">
                    <a data-id="<?=$bilgi['id']?>" href="#" class="btn ml-2 btn-danger sil">Sil</a>
                    <input class="ml-4" type="checkbox">
                </div>	
            </div><?php
                endwhile;
            ?><div id="sonucgor"></div>
        </div>
    </div>
</div>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="files/jquery3.5.1.min.js"></script>
<script>
    $(document).ready(function () {
    // SIL TUSUNA TIKLANDIGINDA
        $('.sil').on('click', function(){
            var id = $(this).data('id')
            var parent = $(this).parents('#veriler')//TIKLANAN ELEMENTIN PARENTINE CIK

            var datapost = {"id": id}
            var datastring = JSON.stringify(datapost)

            $.ajax({
                url: 'filesphp/result.php',
                data: {verilerpaket: datastring},
                type: 'POST',
                success: function(cevap){
                    var json = $.parseJSON(cevap)

                    if(json.cevap == true){
                        parent.fadeOut('slow')//tiklanan elementi sil
                    }else{
                         $('#sonucgor').html('Hata Var..')
                    }
                }
            })
        })
    // HEPSINI CEK TUSU
        $('#sec').on('click', function(){
            $('input[type=checkbox]').prop('checked', true)
        })
    // HEPSINI SIL TUSU
        $('#kaldir').on('click', function(){
            $('input[type=checkbox]').prop('checked', false)
        })
    // COKLU SIL
        $('#sil').on('click', function(){
            $('input[type=checkbox]:checked').each(function(){
                $(this).prev().trigger('click')
            })
        })
    });
</script>
</body>
</html>
<?php

?>