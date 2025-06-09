<?php
    class Database{
        private $Connect = false, $Result = [], $DatabaseName = "oopcrud";
        public function __construct(){
            if(!$this->Connect){
                $this->Connect = new mysqli("localhost", "root", "", $this->DatabaseName);

                if($this->Connect->connect_error){
                    $this->Result[] =  $this->Connect->connect_error;
                }
            }
        }

        public function Insert($TableName, $Args=[]){
            if($this->IsTableExists($TableName)){
                $Columns = implode(", ", array_keys($Args));
                $Values  = implode(", ", $Args);
                $Query   = "INSERT INTO {$TableName} ({$Columns}) VALUES({$Values})";

                print_r($Query);
            }
        }

        public function Update(){
            
        }

        public function Delete(){
            
        }

        public function IsTableExists($TableName){
            $Trigger = $this->Connect->query("SHOW TABLES FROM {$this->DatabaseName} LIKE '{$TableName}'");
            return ($Trigger->num_rows == 1) ? true : false;
        }

        public function __destruct(){
            if($this->Connect){
                $this->Connect->close();
                $this->Connect = false;
            }
        }
    }
?>