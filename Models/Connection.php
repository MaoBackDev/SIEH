<?php

class Connection{

    public static function getConnection(){


        try {
            $db = new PDO("mysql:host=localhost;dbname=sieh","root","");

            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $e) {
            echo "Error--> : " . $e->getMessage();
            return false;
        }
        
        return $db;
    }
}

