<?php 
    require_once("Database.php");
    $Obj = new Database();
    $Obj->Insert("students", ["Name" => "Roran", "Age" => "10", "City" => "Rajkot"]);
?>