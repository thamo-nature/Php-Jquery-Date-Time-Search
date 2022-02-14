<?php

require 'config.php';

class Database{

    public $connection;


    public function __construct()
    {
        $this->open_db_connection();

    }

    public function open_db_connection(){
         
        $this->connection = new mysqli("localhost", "root", "", "data");

        if($this->connection->connect_errno){

           die("connection failed".$this->connection->connect_error);
       }

     }

    public function query($sql){

        $result = $this->connection->query($sql);
        
        $this->confirm_query($result);

        return $result;
    }

    private function confirm_query($result){
        if(!$result){
            die("Query failed".$this->connection->error);
        }
    }


}


$database = new Database();
?>