<?php
class korisnik{
    private $ime;
    private $godine;

    public function __construct($ime,$godine){
        $this->ime = $ime;
        $this->godine = $godine;
    }

    public function getName(){
        return $this->i = $ime;
    }

    public function setName(){
        return $this->i = $ime;
    }
// get magicna metoda
    public function __get($property){
        if(property_exists($this,$property)){
            return $this->$property;
        }
    }
// set magicna metoda
    public function __set($property,$vrijednost){
        if(property_exists($this, $property)){
            $this->$property = $vrijednost;
        }
        return $this;
    } 

}

$korisnik1 = new korisnik("Armin",17);
echo $korisnik1->ime;
echo '<br>';
echo 'Godine prije setovanja: ';
echo $korisnik1->godine;

$korisnik1->godine = 18;
echo'<br>';
echo 'Godine nakon setovanja: ';
echo $korisnik1->godine;

?>