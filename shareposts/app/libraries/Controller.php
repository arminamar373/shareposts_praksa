<?php
/*
primarni kontroler
Ucitava models i views
*/

class Controller{
    // ucitava model
    public function model($model){

        // cini model fajl obaveznim
        require_once '../app/models/' . $model . '.php';

        // prikazujemo model
        return new $model();
    }
    //ucitava view
    public function view($view, $data = []){
        // provjerava da li postoji view fajl
        if(file_exists('../app/views/' . $view . '.php')){
            require_once '../app/views/' . $view . '.php';
        } else {
            //view fajl ne postoji
            die('View does not exist');
        }
    }
}
?>