<?php
/*
PDO klasa baze podataka
Vrsi konekciju na bazu podataka
spaja vrijednosti
Vraca redove i rezultate
*/
class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $dbh;
    private $stmt;
    private $error;

    public function __construct(){
        // odredjujemo dsn
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION

        );
        // kreiramo PDO instancu
        try{
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);

        } catch(PDOException $e){
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }
    // Prepare statement za query
    public function query($sql){
        $this->stmt = $this->dbh->prepare($sql);
    }

    // odredjivanje vrijednosti (tipa podatka)
    public function bind($param, $value, $type = null){
        if(is_null($type)){
            switch(true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                        $type = PDO::PARAM_NULL;
                        break;
                default:
                        $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);

    }

    // izvrsavanje prepare statementa
    public function execute(){
        return $this->stmt->execute();
    }

    // dobijamo rezultat kao niz objekata
    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    //Dobijamo rezultat kao jedan objekat
    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    // dobijamo broj redova
    public function rowCount(){
        return $this->stmt->rowCount();
    }


}
?>