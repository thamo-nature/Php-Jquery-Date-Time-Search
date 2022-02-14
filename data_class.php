<?php

require_once "database_class.php";

class Datas
{

    public function __construct()
    {
        //$this->view_data();
    }
    
    public function view_data()
    {
            
        global $database;

            $query_data = "select * from data order by id DESC limit 20";
            
            $result_query = $database->connection->query($query_data);
            
            while($row = mysqli_fetch_array($result_query))
            {
           
            $name = $row['name'];
             
            $email = $row['email']; 

            $address = $row['address'];

            $time= $row['time_stamp'];

            echo 
            "
            <tr>
            <td>$name</td>            
            <td>$email</td>            
            <td>$address</td>            
            <td>$time</td>            
            </tr>
        ";
            }

    }//end of fun


}// end of class

$data = new Datas();
?>