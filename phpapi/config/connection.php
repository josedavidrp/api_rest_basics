<?php

class Connect{
    protected $dbh;

    protected function Connection(){
        try{

            $connection=$this->dbh=new PDO("mysql:local=localhost;dbname=php-api","root","");
            return $connection;

        }catch(Exception $e){

            print "Error DB: ".$e->getMessage()."<br/>";
            die();
        }
    }

    public function set_name(){
        return $this->dbh->query("SET NAMES 'utf8'");

        
    }
}