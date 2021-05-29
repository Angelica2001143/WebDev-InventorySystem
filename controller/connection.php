<?php
    function connect(){
        // $dbHost= "localhost";
        // here mysql port is 8081
        $dbHost = "localhost";
        $user= "root";
        $pass= "";
        $dbname="inventory_project";

        $conn= new mysqli($dbHost, $user, $pass, $dbname);
        //echo "connected";
        return $conn;
    }

    function closeConnect($cn){
        $cn->close();
    }
?>