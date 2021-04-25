<?php
class korisnik{
    public $ime;
    public $godine;

// pokrece se kada se objekat kreira
    public function __construct($ime,$godine){ 
        $this->i = $ime;
        $this->g = $godine;
    }
// poziva se kada zelimo da se oslobodimo necega, prekinemo konekciju itd
    public function __destruct(){

    }

}
$korisnik1 = new korisnik("Armin",17);
echo $korisnik1->i . " ima " . $korisnik1->g . " godina.";
?>