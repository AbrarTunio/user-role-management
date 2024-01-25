<?php 

class Database
{

    public $hostname = 'localhost' ;
    public $databaseUser = 'root';
    public $databasePass = '';
    public $databaseName = 'fyp_projects';

    public function connDb() {
        return mysqli_connect( $this->hostname , 
        $this->databaseUser , 
        $this->databasePass , 
        $this->databaseName   );    
    }


}