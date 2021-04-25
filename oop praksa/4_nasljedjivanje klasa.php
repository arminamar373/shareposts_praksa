<?php
class korisnik {
    protected $ime;
    protected $godine;
     
    public function __construct($ime,$godine){
        $this->ime = $ime;
        $this->godine = $godine;
    }
}

class kupac extends korisnik {
    private $stanje;

    public function __construct($ime,$godine,$stanje){
        parent::__construct($ime,$godine);
        $this->stanje = $stanje;
    }
    public function kupovina($kolicina){
        $ostatak = $this->stanje - $kolicina ;
        return 'Kada ' . $this->ime . ' sa stanjem na racunu od ' . $this->stanje . '$ potrosi ' . $kolicina . '$ ostaje mu ' . $ostatak . '$' ;
    }
}
$kupac1 = new kupac('Armin',17,100) ;
echo $kupac1->kupovina(12);
?>