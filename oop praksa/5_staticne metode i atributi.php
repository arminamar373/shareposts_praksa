<?php
class korisnik {
    public $ime;
    public $prezime;
    public static $duzinaSifre = 6 ;

    public static function provjera ($sifra){
        if(strlen($sifra) >= self::$duzinaSifre){
            return true;
        } else {
            return false;
        }
    }
}
$sifra1 = 'pozdrav';
if(korisnik::provjera($sifra1)){
    echo 'Vasa sifra je prihvacena';
} else {
    echo 'Vasa sifra je odbijena';
}
?>