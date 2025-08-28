<?php
class Conectar{
    protected $dbh;
    protected function conexion(){
        try{
            $conectar = $this->dbh = new PDO('mysql:host=localhost;port=3307;dbname=andercode_soap', 'root', '');
            return $conectar;
        }catch(Exception $e){
            print "¡Error!" . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function set_names(){
        return $this->dbh->query("SET NAMES 'utf8'");
    }
}
?>