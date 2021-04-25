<?php
class korisnik{
    public $ime; // atributi

    public function reciZdravo(){ // metode (funkcije)
        echo $this->ime." vas pozdravlja.";
    }
}
$korisnik1 = new korisnik();
$korisnik1->ime="Armin";
$korisnik1->reciZdravo();

echo "<br>";

$korisnik2 = new korisnik();
$korisnik2->ime="Marko";
$korisnik2->reciZdravo();
?>