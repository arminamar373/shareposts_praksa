<?php
/* 
App Core klasa
Kreira URL i ucitava core controler
URL FORMAT - /controller/method/params
*/

class Core {
    protected $currentController = 'Pages' ;
    protected $currentMethod = 'Index' ;
    protected $params = [] ;

    public function __construct(){
         // print_r($this->getUrl());

         $url = $this->getUrl();
         error_reporting(E_ERROR | E_PARSE); // mice warning

         // trazi u controllers prvu vrijednost
         // navigaciju vrsimo stalno od index.php fajla bez obzira u kojem smo fajlu
         if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')){    // ucwords postavlja prvo slovo veliko u stringu
            
            // ako fajl postoji, postavicemo ga kao kontroler
            $this->currentController = ucwords($url[0]);
            
            // onemogucimo 0 index
            unset($url[0]);
         }

         // controller da bude obavezan
         require_once '../app/controllers/' . $this->currentController . '.php' ;

         // prikazujemo controller klasu
         $this->currentController = new $this->currentController;

         // provjerava da li ima drugog dijela niza
         if(isset($url[1])){

             // provjeravamo da vidimo da li metoda postoji u kontroleru
             if(method_exists($this->currentController , $url[1])){
                 $this->currentMethod = $url[1];

                 // onemogucujemo 1 index
                 unset($url[1]);
             }

         }

         // prikupljamo parametre
         $this->params = $url ? array_values($url) : []; // : znaci ili
        
         // pozivamo niz parametara
         call_user_func_array([$this->currentController,$this->currentMethod],$this->params);


    }

    public function getUrl(){
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'],'/') ; // mice / iz url
            $url = filter_var( $url , FILTER_SANITIZE_URL);
            $url = explode('/' , $url) ; // razdvaja stringove sa /
            return $url;
        }
    }
}
?>